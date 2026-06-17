<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;

class ContactController extends Controller
{
    public function index()
    {
        $company = CompanyProfile::getInstance();

        return view('public.contact', compact('company'));
    }
}
