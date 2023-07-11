<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        // Artisan::call('optimize');
        // Artisan::call('config:cache');
        // Artisan::call('cache:clear');
        // dd('cache has cleared');
        
        return redirect()->route('login');
    }

}
