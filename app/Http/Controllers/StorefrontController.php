<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class StorefrontController extends Controller
{

    //
    public function index()
    {
        return view('storefront', [
            'listProduk' => Produk::all()->sortBy('createdDate')
        ]);
        // return view('storefront');
    }

    
}
