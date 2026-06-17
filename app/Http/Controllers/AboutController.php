<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;

class AboutController extends Controller
{
    public function index()
    {
        $company = CompanyProfile::getInstance();

        return view('public.about', compact('company'));
    }
}
