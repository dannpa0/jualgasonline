<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Pelanggan;
use Auth;

class CheckoutController extends Controller
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
    
    //
    public function formPesanan($produkId)
    {



            $pelanggan = Pelanggan::where('user_id', '=',Auth::id())->get()->first();
            $produk = Produk::findOrFail($produkId);
            $example= "example";

            

            return view('form-pesanan', [
                'pelanggan' => $pelanggan, 
                'produk' => $produk
            ]);


        
        // $this->middleware('auth');
        // return view('form-pemesanan');
    }

    public function submitPesanan(Request $request)
    {
        $request->validate([
            'no_hp' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string'],
            'full_address' => ['required', 'string'],
            'kuantitas' => ['required', 'numeric','min:0', 'not_in:0'],
            'id_produk' => ['required', 'numeric'],
        ]);

        $produk = Produk::findOrFail($request->id_produk);
        $totalHarga = $produk->harga * $request->kuantitas;
        $pelanggan = Pelanggan::where('user_id', '=', Auth::id())->get()->first();

        return view('rincian-pesanan',[
            'rincianPesanan' => $request,
            'rincianProduk' => $produk,
            'rincianPelanggan' => $pelanggan,
            'totalHarga' => $totalHarga 
        ]);
    }

    public function rincianPesanan(Request $request)
    {
        $produk = Produk::findOrFail($request->id_produk);
        $totalHarga = $produk->harga * $request->kuantitas;
        $pelanggan = Pelanggan::where('user_id', '=', Auth::id())->get()->first();

        DB::transaction(function(){
            $produk = Produk::findOrFail($request->id_produk);
            $totalHarga = $produk->harga * $request->kuantitas;
    
            $pelanggan = Pelanggan::where('user_id', '=', Auth::id())->get()->first();
    
            // Pesanan::create([
            //     'id_pelanggan' => $pelanggan->id,
            //     'id_produk' => $request->id_produk,
            //     'total_harga' => $totalHarga,
            //     'jumlah_produk' => $request->kuantitas,
            //     'status' => 'ON_PROCESS'
            // ]);
            
        });
     
        return view('thankyou-page');
    }
}
