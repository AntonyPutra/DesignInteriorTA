<?php

use App\Http\Controllers\Api\PortfolioApiController;
use App\Http\Controllers\Api\PublicApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| REST API Routes for Front-End (FE)
|--------------------------------------------------------------------------
| Base URL: https://pratamaaa.whaleestudio.my.id/api/...
| Dilengkapi Rate Limiting untuk perlindungan DDoS / Scraping massal.
*/

Route::middleware(['throttle:60,1'])->group(function () {

    // === PORTOFOLIO & KATEGORI ===
    Route::get('/portfolios', [PortfolioApiController::class, 'index']);
    Route::get('/portfolios/{slug}', [PortfolioApiController::class, 'show']);
    Route::get('/categories', [PortfolioApiController::class, 'categories']);

    // === LAYANAN & PROFIL PERUSAHAAN ===
    Route::get('/services', [PublicApiController::class, 'services']);
    Route::get('/company-profile', [PublicApiController::class, 'companyProfile']);
    Route::get('/testimonials', [PublicApiController::class, 'testimonials']);

    // === FORM KONSULTASI (Rate limit lebih ketat: 10 submit / menit) ===
    Route::post('/consultations', [PublicApiController::class, 'storeConsultation'])
        ->middleware('throttle:10,1');
});

// Fallback untuk route API yang tidak ditemukan
Route::fallback(function () {
    return response()->json([
        'status'  => false,
        'message' => 'Endpoint API tidak ditemukan.',
    ], 404);
});
