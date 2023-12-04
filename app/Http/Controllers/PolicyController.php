<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function terms()
    {
        return view('website.terms.terms');
    }

    public function privacy()
    {
        return view('website.terms.privacy');
    }

    public function return()
    {
        return view('website.terms.return');
    }
}
