<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    //
    public function index()
    {
        return view('storefront');
    }
}
