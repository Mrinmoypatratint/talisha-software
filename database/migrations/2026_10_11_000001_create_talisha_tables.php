<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Article Categories
        Schema::create('article_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('color')->nullable()->default('#f5a623');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 2. Articles
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('body');
            $table->text('excerpt')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('article_categories')->nullOnDelete();
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('featured_image')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->string('status')->default('published');
            $table->timestamp('published_at')->nullable();
            $table->integer('reading_time')->default(5);
            $table->integer('view_count')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // 3. Tags
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // 4. Article Tag Pivot
        Schema::create('article_tag', function (Blueprint $table) {
            $table->foreignId('article_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $table->primary(['article_id', 'tag_id']);
        });

        // 5. Leads
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('service_interest')->default('General Inquiry');
            $table->string('budget_range')->nullable();
            $table->string('timeline')->nullable();
            $table->text('message');
            $table->string('status')->default('new'); // new, contacted, qualified, proposal_sent, closed_won, closed_lost
            $table->string('source')->nullable()->default('website');
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });

        // 6. Contact Submissions
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('subject')->default('General Inquiry');
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });

        // 7. Careers
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('department');
            $table->string('location')->default('Remote / Hybrid');
            $table->string('employment_type')->default('full_time'); // full_time, part_time, contract, internship, remote
            $table->text('short_description');
            $table->longText('full_description');
            $table->longText('requirements');
            $table->longText('benefits')->nullable();
            $table->string('salary_range')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamp('expires_at')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // 8. Career Applications
        Schema::create('career_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('resume_path')->nullable();
            $table->text('cover_letter')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('status')->default('received'); // received, under_review, shortlisted, rejected, hired
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });

        // 9. Partners
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_path')->nullable();
            $table->string('website_url')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 10. Testimonials
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('company')->nullable();
            $table->string('designation')->nullable();
            $table->text('quote');
            $table->string('avatar_path')->nullable();
            $table->integer('rating')->default(5);
            $table->boolean('is_featured')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 11. Media
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('original_filename');
            $table->string('path');
            $table->string('disk')->default('public');
            $table->string('mime_type')->nullable();
            $table->bigInteger('size')->default(0);
            $table->string('alt_text')->nullable();
            $table->string('caption')->nullable();
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('collection')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });

        // 12. SEO Metas
        Schema::create('seo_metas', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('robots')->default('index, follow');
            $table->json('structured_data')->nullable();
            $table->timestamps();
        });

        // 13. Settings
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->string('type')->default('text');
            $table->timestamps();
        });

        // 14. Domain Configs
        Schema::create('domain_configs', function (Blueprint $table) {
            $table->id();
            $table->string('domain')->unique();
            $table->string('heading')->nullable();
            $table->json('stats')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 15. Domain Partners
        Schema::create('domain_partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('domain_config_id')->constrained()->cascadeOnDelete();
            $table->string('logo_path');
            $table->string('name')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 16. Activity Logs
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('action');
            $table->string('model_type')->nullable();
            $table->bigInteger('model_id')->nullable();
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });

        // 17. Newsletter Subscribers
        Schema::create('newsletter_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletter_subscribers');
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('domain_partners');
        Schema::dropIfExists('domain_configs');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('seo_metas');
        Schema::dropIfExists('media');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('career_applications');
        Schema::dropIfExists('careers');
        Schema::dropIfExists('contact_submissions');
        Schema::dropIfExists('leads');
        Schema::dropIfExists('article_tag');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_categories');
    }
};
