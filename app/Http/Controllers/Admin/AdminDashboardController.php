<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalServices       = Service::count();
        $totalPortfolios     = Portfolio::count();
        $totalConsultations  = Consultation::count();
        $pendingConsultations = Consultation::where('status', 'pending')->count();

        $recentConsultations = Consultation::latest()->take(5)->get();
        $recentPortfolios    = Portfolio::with('category')->latest()->take(4)->get();

        return view('admin.dashboard', compact(
            'totalServices',
            'totalPortfolios',
            'totalConsultations',
            'pendingConsultations',
            'recentConsultations',
            'recentPortfolios'
        ));
    }
}
