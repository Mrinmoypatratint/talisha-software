<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;

// ==========================================
// PUBLIC USER ROUTES
// ==========================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/solutions', [SolutionController::class, 'index'])->name('solutions');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/career', [CareerController::class, 'index'])->name('career');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/get-in-touch', [LeadController::class, 'create'])->name('lead.create');

// Form Submissions
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/get-in-touch', [LeadController::class, 'store'])->name('lead.store');
Route::post('/career/{career}/apply', [CareerController::class, 'apply'])->name('career.apply');

// SEO & Crawlers
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');

// ==========================================
// ADMIN AUTHENTICATION
// ==========================================
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// ==========================================
// PROTECTED ADMIN DASHBOARD & CMS
// ==========================================
Route::prefix('admin')->middleware(['web', 'auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Articles CRUD
    Route::resource('articles', AdminArticleController::class);
    
    // Lead Management
    Route::get('leads', [AdminLeadController::class, 'index'])->name('leads.index');
    Route::get('leads/{lead}', [AdminLeadController::class, 'show'])->name('leads.show');
    Route::patch('leads/{lead}/status', [AdminLeadController::class, 'updateStatus'])->name('leads.status');
    Route::delete('leads/{lead}', [AdminLeadController::class, 'destroy'])->name('leads.destroy');
    
    // Careers & Applications
    Route::resource('careers', AdminCareerController::class);
    Route::get('applications', [AdminCareerController::class, 'applications'])->name('applications');
    Route::patch('applications/{application}/status', [AdminCareerController::class, 'updateApplicationStatus'])->name('applications.status');
    
    // Contact Inquiries
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::patch('contacts/{contact}/read', [AdminContactController::class, 'markRead'])->name('contacts.read');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
    
    // Team Management (Our Team CRUD)
    Route::resource('team', AdminTeamController::class);

    // Site Settings
    Route::get('settings', [AdminSettingController::class, 'index'])->name('settings');
    Route::put('settings', [AdminSettingController::class, 'update'])->name('settings.update');
});
