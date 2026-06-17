<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $company      = CompanyProfile::getInstance();
        $services     = Service::active()->take(6)->get();
        $portfolios   = Portfolio::published()->with('category')->latest()->take(6)->get();
        $testimonials = Testimonial::active()->latest()->take(6)->get();

        return view('public.home', compact('company', 'services', 'portfolios', 'testimonials'));
    }
}
