<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile()
    {
        return view('profil', [
            'pelanggan' => Pelanggan::where('user_id', '=',Auth::id())->get()->first()
        ]);
    }

    public function riwayat()
    {
        $pelanggan =  Pelanggan::where('user_id', '=',Auth::id())->get()->first();
        return view('profil-riwayat', [
            'listPesanan' => Pesanan::where('id_pelanggan', '=',$pelanggan->id)->get()
        ]);
    }
}
