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
        $stats = [
            'services'      => Service::count(),
            'portfolios'    => Portfolio::count(),
            'consultations' => Consultation::count(),
            'testimonials'  => Testimonial::count(),
        ];

        $recentConsultations = Consultation::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentConsultations'));
    }
}
