<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Pesanan;
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

        $hargaCod = $request->is_cod == 1? 3000: 0;
        $produk = Produk::findOrFail($request->id_produk);
        $totalHarga = $produk->harga * $request->kuantitas + $hargaCod;
        $pelanggan = Pelanggan::where('user_id', '=', Auth::id())->get()->first();

        \Session::put('kuantitas',$request->kuantitas);
        \Session::put('is_cod',$request->is_cod);
        \Session::put('id_pelanggan',$pelanggan->id);
        \Session::put('id_produk', $produk->id);
        \Session::put('totalHarga',$totalHarga);

        return view('rincian-pesanan',[
            'rincianPesanan' => $request,
            'rincianProduk' => $produk,
            'rincianPelanggan' => $pelanggan,
            'totalHarga' => $totalHarga 
        ]);
    }

    public function rincianPesanan($produkId)
    {

        DB::transaction(function() {
            $kuantitas = \Session::get('kuantitas');
            $is_cod = \Session::get('is_cod');
            $id_pelanggan = \Session::get('id_pelanggan');
            $id_produk = \Session::get('id_produk');
            $totalHarga = \Session::get('totalHarga');
            // dd($is_cod);
            
            Pesanan::create([
                'id_pelanggan' => $id_pelanggan,
                'id_produk' => $id_produk,
                'total_harga' => $totalHarga,
                'jumlah_produk' => $kuantitas,
                'status' => 'ON_PROCESS',
                'is_cod' => $is_cod
            ]);
            
        });
     
        return view('thankyou-page');
    }
}
