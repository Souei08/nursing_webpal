<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ User };

class LandingController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    public function termsOfUse(Request $request)
    {
        return view('terms-of-use');
    }
}