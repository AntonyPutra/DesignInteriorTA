<?php

use App\Http\Controllers\Admin\AdminCompanyProfileController;
use App\Http\Controllers\Admin\AdminConsultationController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPortfolioCategoryController;
use App\Http\Controllers\Admin\AdminPortfolioController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CostEstimatorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// ============================================================
// PUBLIC ROUTES
// ============================================================

// Redirect /dashboard -> /admin/dashboard (untuk Breeze login redirect)
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Portfolio
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

// Consultation
Route::get('/consultation', [ConsultationController::class, 'create'])->name('consultation.create');
Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store');

// Cost Estimator
Route::get('/cost-estimator', [CostEstimatorController::class, 'index'])->name('estimator.index');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// ============================================================
// AUTH ROUTES (Breeze)
// ============================================================

require __DIR__ . '/auth.php';

// ============================================================
// ADMIN ROUTES
// ============================================================

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Services CRUD
    Route::resource('services', AdminServiceController::class)->except(['show']);

    // Portfolio Categories CRUD
    Route::resource('portfolio-categories', AdminPortfolioCategoryController::class)
        ->except(['show'])
        ->names([
            'index'   => 'portfolio-categories.index',
            'create'  => 'portfolio-categories.create',
            'store'   => 'portfolio-categories.store',
            'edit'    => 'portfolio-categories.edit',
            'update'  => 'portfolio-categories.update',
            'destroy' => 'portfolio-categories.destroy',
        ]);

    // Portfolios CRUD
    Route::resource('portfolio', AdminPortfolioController::class)->except(['show']);
    Route::get('portfolio/{portfolio}/gallery', [AdminPortfolioController::class, 'gallery'])->name('portfolio.gallery');
    Route::post('portfolio/{portfolio}/gallery', [AdminPortfolioController::class, 'storeGallery'])->name('portfolio.gallery.store');
    Route::delete('portfolio/{portfolio}/images/{image}', [AdminPortfolioController::class, 'destroyImage'])
        ->name('portfolio.gallery.destroy');

    // Consultations
    Route::get('/consultations', [AdminConsultationController::class, 'index'])->name('consultations.index');
    Route::get('/consultations/{consultation}', [AdminConsultationController::class, 'show'])->name('consultations.show');
    Route::patch('/consultations/{consultation}/status', [AdminConsultationController::class, 'updateStatus'])->name('consultations.update-status');
    Route::delete('/consultations/{consultation}', [AdminConsultationController::class, 'destroy'])->name('consultations.destroy');

    // Testimonials CRUD
    Route::resource('testimonials', AdminTestimonialController::class)->except(['show']);

    // Company Profile
    Route::get('/company-profile', [AdminCompanyProfileController::class, 'edit'])->name('company-profile.edit');
    Route::put('/company-profile', [AdminCompanyProfileController::class, 'update'])->name('company-profile.update');
});
