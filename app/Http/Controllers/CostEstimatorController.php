<?php

namespace App\Http\Controllers;

class CostEstimatorController extends Controller
{
    public function index()
    {
        return view('public.estimator.index');
    }
}
