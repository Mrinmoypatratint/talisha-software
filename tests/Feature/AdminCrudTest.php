<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Career;
use App\Models\CareerApplication;
use App\Models\ContactSubmission;
use App\Models\Lead;
use App\Models\Setting;
use App\Models\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdminCrudTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;
    protected User $regularUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::firstOrCreate(
            ['email' => 'admin@talishasoftware.tech'],
            [
                'name' => 'Talisha Administrator',
                'password' => bcrypt('Talisha@2026!'),
                'role' => 'admin',
            ]
        );

        $this->regularUser = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular User',
                'password' => bcrypt('password123'),
                'role' => 'user',
            ]
        );
    }

    public function test_guest_cannot_access_admin_routes(): void
    {
        $routes = [
            route('admin.dashboard'),
            route('admin.articles.index'),
            route('admin.careers.index'),
            route('admin.leads.index'),
            route('admin.contacts.index'),
            route('admin.team.index'),
            route('admin.settings'),
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertRedirect(route('admin.login'));
        }
    }

    public function test_non_admin_user_cannot_access_admin_routes(): void
    {
        $response = $this->actingAs($this->regularUser)->get(route('admin.dashboard'));
        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_access_dashboard(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.dashboard'));
        $response->assertStatus(200);
        $response->assertSee('Executive Dashboard');
    }

    public function test_admin_articles_full_crud(): void
    {
        $category = ArticleCategory::firstOrCreate(
            ['slug' => 'test-category'],
            ['name' => 'Test Category', 'sort_order' => 1]
        );

        // 1. Index
        $response = $this->actingAs($this->admin)->get(route('admin.articles.index'));
        $response->assertStatus(200);

        // 2. Create form
        $response = $this->actingAs($this->admin)->get(route('admin.articles.create'));
        $response->assertStatus(200);

        // 3. Store
        $articleData = [
            'title' => 'Automated Test Article Title',
            'category_id' => $category->id,
            'excerpt' => 'This is an automated test excerpt.',
            'body' => 'This is the detailed body content for testing CRUD operations.',
            'reading_time' => 4,
            'status' => 'published',
            'seo_title' => 'Automated Test Article SEO',
            'seo_description' => 'Automated test SEO description',
        ];

        $storeResponse = $this->actingAs($this->admin)->post(route('admin.articles.store'), $articleData);
        $storeResponse->assertRedirect(route('admin.articles.index'));
        $this->assertDatabaseHas('articles', ['title' => 'Automated Test Article Title']);

        $article = Article::where('title', 'Automated Test Article Title')->first();
        $this->assertNotNull($article);

        // 4. Edit form
        $editResponse = $this->actingAs($this->admin)->get(route('admin.articles.edit', $article));
        $editResponse->assertStatus(200);

        // 5. Update
        $updateData = array_merge($articleData, [
            'title' => 'Updated Automated Test Article Title',
            'status' => 'draft',
        ]);

        $updateResponse = $this->actingAs($this->admin)->put(route('admin.articles.update', $article), $updateData);
        $updateResponse->assertRedirect(route('admin.articles.index'));
        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'title' => 'Updated Automated Test Article Title',
            'status' => 'draft',
        ]);

        // 6. Destroy
        $destroyResponse = $this->actingAs($this->admin)->delete(route('admin.articles.destroy', $article));
        $destroyResponse->assertRedirect(route('admin.articles.index'));
        $this->assertSoftDeleted('articles', ['id' => $article->id]);
    }

    public function test_admin_careers_and_applications_crud(): void
    {
        // 1. Index
        $response = $this->actingAs($this->admin)->get(route('admin.careers.index'));
        $response->assertStatus(200);

        // 2. Create form
        $response = $this->actingAs($this->admin)->get(route('admin.careers.create'));
        $response->assertStatus(200);

        // 3. Store
        $careerData = [
            'title' => 'Autonomous QA Engineer',
            'department' => 'Quality & Infrastructure',
            'location' => 'Remote / Bangalore',
            'employment_type' => 'full_time',
            'short_description' => 'Testing autonomous multi-agent pipelines.',
            'full_description' => 'Detailed job description for autonomous QA engineer.',
            'requirements' => 'Proficiency in PHP, Python, and Playwright.',
            'benefits' => 'Competitive compensation, equity, healthcare.',
            'salary_range' => '₹18L - ₹28L',
            'is_active' => true,
            'is_featured' => true,
        ];

        $storeResponse = $this->actingAs($this->admin)->post(route('admin.careers.store'), $careerData);
        $storeResponse->assertRedirect(route('admin.careers.index'));
        $this->assertDatabaseHas('careers', ['title' => 'Autonomous QA Engineer']);

        $career = Career::where('title', 'Autonomous QA Engineer')->first();
        $this->assertNotNull($career);

        // 4. Edit form
        $editResponse = $this->actingAs($this->admin)->get(route('admin.careers.edit', $career));
        $editResponse->assertStatus(200);

        // 5. Update
        $updateData = array_merge($careerData, [
            'title' => 'Senior Autonomous QA Engineer',
            'salary_range' => '₹24L - ₹36L',
        ]);

        $updateResponse = $this->actingAs($this->admin)->put(route('admin.careers.update', $career), $updateData);
        $updateResponse->assertRedirect(route('admin.careers.index'));
        $this->assertDatabaseHas('careers', [
            'id' => $career->id,
            'title' => 'Senior Autonomous QA Engineer',
            'salary_range' => '₹24L - ₹36L',
        ]);

        // 6. Test application submission & admin status update
        $application = CareerApplication::create([
            'career_id' => $career->id,
            'name' => 'Test Applicant',
            'email' => 'applicant@example.com',
            'phone' => '+91 9999999999',
            'status' => 'received',
            'cover_letter' => 'Test application note',
        ]);

        $appsResponse = $this->actingAs($this->admin)->get(route('admin.applications'));
        $appsResponse->assertStatus(200);

        $statusResponse = $this->actingAs($this->admin)->patch(
            route('admin.applications.status', $application),
            ['status' => 'shortlisted', 'admin_notes' => 'Strong candidate profile.']
        );
        $statusResponse->assertSessionHas('success');
        $this->assertDatabaseHas('career_applications', [
            'id' => $application->id,
            'status' => 'shortlisted',
        ]);

        // 7. Destroy career
        $destroyResponse = $this->actingAs($this->admin)->delete(route('admin.careers.destroy', $career));
        $destroyResponse->assertRedirect(route('admin.careers.index'));
        $this->assertSoftDeleted('careers', ['id' => $career->id]);
    }

    public function test_admin_leads_crud(): void
    {
        // 1. Create a lead (simulating public form submission)
        $lead = Lead::create([
            'name' => 'Enterprise Prospect',
            'email' => 'prospect@acmecorp.com',
            'phone' => '+91 8888888888',
            'company' => 'Acme Corp',
            'service_interest' => 'Agentic AI & LLMs',
            'budget_range' => '₹50L - ₹1Cr ($65K - $125K)',
            'timeline' => '1 - 3 months',
            'message' => 'Interested in multi-agent orchestration for supply chain ERP.',
            'status' => 'new',
        ]);

        // 2. Index
        $response = $this->actingAs($this->admin)->get(route('admin.leads.index'));
        $response->assertStatus(200);
        $response->assertSee('Enterprise Prospect');

        // 3. Show
        $showResponse = $this->actingAs($this->admin)->get(route('admin.leads.show', $lead));
        $showResponse->assertStatus(200);
        $showResponse->assertSee('Acme Corp');

        // 4. Update status
        $statusResponse = $this->actingAs($this->admin)->patch(
            route('admin.leads.status', $lead),
            ['status' => 'qualified', 'admin_notes' => 'Verified enterprise credentials.']
        );
        $statusResponse->assertSessionHas('success');
        $this->assertDatabaseHas('leads', [
            'id' => $lead->id,
            'status' => 'qualified',
            'admin_notes' => 'Verified enterprise credentials.',
        ]);

        // 5. Destroy
        $destroyResponse = $this->actingAs($this->admin)->delete(route('admin.leads.destroy', $lead));
        $destroyResponse->assertRedirect(route('admin.leads.index'));
        $this->assertDatabaseMissing('leads', ['id' => $lead->id]);
    }

    public function test_admin_contacts_crud(): void
    {
        // 1. Create contact submission
        $contact = ContactSubmission::create([
            'name' => 'Inquiry Contact',
            'email' => 'inquiry@example.com',
            'phone' => '+91 7777777777',
            'subject' => 'Consulting Question',
            'message' => 'General inquiry message text.',
            'is_read' => false,
        ]);

        // 2. Index
        $response = $this->actingAs($this->admin)->get(route('admin.contacts.index'));
        $response->assertStatus(200);
        $response->assertSee('Inquiry Contact');

        // 3. Mark Read
        $readResponse = $this->actingAs($this->admin)->patch(route('admin.contacts.read', $contact));
        $readResponse->assertSessionHas('success');
        $this->assertDatabaseHas('contact_submissions', [
            'id' => $contact->id,
            'is_read' => true,
        ]);

        // 4. Destroy
        $destroyResponse = $this->actingAs($this->admin)->delete(route('admin.contacts.destroy', $contact));
        $destroyResponse->assertSessionHas('success');
        $this->assertDatabaseMissing('contact_submissions', ['id' => $contact->id]);
    }

    public function test_admin_team_members_crud(): void
    {
        // 1. Index
        $response = $this->actingAs($this->admin)->get(route('admin.team.index'));
        $response->assertStatus(200);

        // 2. Create form
        $response = $this->actingAs($this->admin)->get(route('admin.team.create'));
        $response->assertStatus(200);

        // 3. Store without photo
        $teamData = [
            'name' => 'Dr. Robert Oppenheim',
            'designation' => 'Principal Neural Architect',
            'description' => 'Pioneering quantum neural reasoning models.',
            'display_order' => 7,
            'is_active' => true,
        ];

        $storeResponse = $this->actingAs($this->admin)->post(route('admin.team.store'), $teamData);
        $storeResponse->assertRedirect(route('admin.team.index'));
        $this->assertDatabaseHas('team_members', ['name' => 'Dr. Robert Oppenheim']);

        $member = TeamMember::where('name', 'Dr. Robert Oppenheim')->first();
        $this->assertNotNull($member);

        // 4. Edit form
        $editResponse = $this->actingAs($this->admin)->get(route('admin.team.edit', $member));
        $editResponse->assertStatus(200);

        // 5. Update with new designation
        $updateData = array_merge($teamData, [
            'designation' => 'Chief Scientific Officer',
            'display_order' => 7,
        ]);

        $updateResponse = $this->actingAs($this->admin)->put(route('admin.team.update', $member), $updateData);
        $updateResponse->assertRedirect(route('admin.team.index'));
        $this->assertDatabaseHas('team_members', [
            'id' => $member->id,
            'designation' => 'Chief Scientific Officer',
        ]);

        // 6. Destroy
        $destroyResponse = $this->actingAs($this->admin)->delete(route('admin.team.destroy', $member));
        $destroyResponse->assertRedirect(route('admin.team.index'));
        $this->assertDatabaseMissing('team_members', ['id' => $member->id]);
    }

    public function test_admin_settings_crud(): void
    {
        Setting::firstOrCreate(
            ['key' => 'company_phone'],
            ['group' => 'contact', 'type' => 'text', 'value' => '+91 8001087752']
        );

        // 1. Index
        $response = $this->actingAs($this->admin)->get(route('admin.settings'));
        $response->assertStatus(200);

        // 2. Update
        $updateResponse = $this->actingAs($this->admin)->put(route('admin.settings.update'), [
            'company_phone' => '+91 8001087752',
        ]);
        $updateResponse->assertSessionHas('success');
        $this->assertDatabaseHas('settings', [
            'key' => 'company_phone',
            'value' => '+91 8001087752',
        ]);
    }

    public function test_public_contact_and_lead_store_operations(): void
    {
        // Public contact form submission
        $contactResponse = $this->post(route('contact.store'), [
            'name' => 'Public Visitor',
            'email' => 'visitor@domain.com',
            'phone' => '+91 9123456789',
            'subject' => 'Web3 inquiry',
            'message' => 'Tell me more about smart contract auditing.',
        ]);
        $contactResponse->assertSessionHas('success');
        $this->assertDatabaseHas('contact_submissions', [
            'email' => 'visitor@domain.com',
            'subject' => 'Web3 inquiry',
        ]);

        // Clean up created record
        ContactSubmission::where('email', 'visitor@domain.com')->delete();

        // Public lead discovery form submission
        $leadResponse = $this->post(route('lead.store'), [
            'name' => 'Lead Client',
            'email' => 'client@enterprise.com',
            'phone' => '+91 9988776655',
            'company' => 'Enterprise Ltd',
            'service_interest' => 'Web3 & Blockchain',
            'budget_range' => '₹25L - ₹50L ($30K - $65K)',
            'timeline' => '1 - 3 months',
            'message' => 'Need decentralized custody architecture.',
        ]);
        $leadResponse->assertSessionHas('success');
        $this->assertDatabaseHas('leads', [
            'email' => 'client@enterprise.com',
            'company' => 'Enterprise Ltd',
        ]);

        // Clean up created record
        Lead::where('email', 'client@enterprise.com')->delete();
    }

    public function test_admin_team_member_with_photo_upload(): void
    {
        $file = UploadedFile::fake()->image('test_member_portrait.png', 400, 500);

        $response = $this->actingAs($this->admin)->post(route('admin.team.store'), [
            'name' => 'Dr. Uploaded Member',
            'designation' => 'Principal Scientist',
            'photo' => $file,
            'description' => 'Test uploaded bio.',
            'display_order' => 10,
            'is_active' => true,
        ]);

        $response->assertRedirect(route('admin.team.index'));
        $member = TeamMember::where('name', 'Dr. Uploaded Member')->first();
        $this->assertNotNull($member);
        $this->assertNotNull($member->photo);
        $this->assertFileExists(public_path($member->photo));

        // Clean up
        $filePath = public_path($member->photo);
        $destroyResponse = $this->actingAs($this->admin)->delete(route('admin.team.destroy', $member));
        $destroyResponse->assertRedirect(route('admin.team.index'));
        $this->assertDatabaseMissing('team_members', ['id' => $member->id]);
        $this->assertFileDoesNotExist($filePath);
    }

    public function test_admin_validation_rejections(): void
    {
        // 1. Article validation fails on missing required body
        $articleResponse = $this->actingAs($this->admin)->post(route('admin.articles.store'), [
            'title' => 'Incomplete Article',
            'category_id' => 9999, // non-existent category
            'body' => '',
            'status' => 'invalid_status',
        ]);
        $articleResponse->assertSessionHasErrors(['category_id', 'body', 'status']);

        // 2. Career validation fails on invalid employment type
        $careerResponse = $this->actingAs($this->admin)->post(route('admin.careers.store'), [
            'title' => 'Incomplete Role',
            'employment_type' => 'space_cadet',
        ]);
        $careerResponse->assertSessionHasErrors(['department', 'location', 'employment_type']);

        // 3. Lead status fails on invalid status enum
        $lead = Lead::create([
            'name' => 'Validation Lead',
            'email' => 'lead@val.com',
            'service_interest' => 'Agentic AI',
            'message' => 'Val test',
            'status' => 'new',
        ]);
        $statusResponse = $this->actingAs($this->admin)->patch(
            route('admin.leads.status', $lead),
            ['status' => 'non_existent_status']
        );
        $statusResponse->assertSessionHasErrors(['status']);
    }

    public function test_admin_search_and_filter_leads(): void
    {
        Lead::create([
            'name' => 'Searchable Quantum Client',
            'email' => 'quantum@lead.com',
            'company' => 'Quantum Solutions',
            'service_interest' => 'Industrial IoT',
            'message' => 'Quantum sensors test',
            'status' => 'proposal_sent',
        ]);

        // Filter by status
        $statusFilterResponse = $this->actingAs($this->admin)->get(route('admin.leads.index', ['status' => 'proposal_sent']));
        $statusFilterResponse->assertStatus(200);
        $statusFilterResponse->assertSee('Searchable Quantum Client');

        // Search by keyword
        $searchResponse = $this->actingAs($this->admin)->get(route('admin.leads.index', ['search' => 'Quantum']));
        $searchResponse->assertStatus(200);
        $searchResponse->assertSee('quantum@lead.com');
    }
}
