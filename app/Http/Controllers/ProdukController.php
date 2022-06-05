<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    //
    public function index()
    {
        return view('produk', [
            'listProduk' => Produk::all()->sortBy('createdDate')
        ]);
        // return view('produk');
    }

    public function deleteProduk($idProduk)
    {
        // dd($idProduk);
        DB::transaction(function() use($idProduk){
            Produk::destroy($idProduk);
        });
        
        $message = "Produk berhasil dihapus";
        return view('produk', [
            'listProduk' => Produk::all()->sortBy('created_at')
        ])->with('toastmsg', $message);
    }

    // id int
    // no_produk int
    // nama varchar
    // deskripsi varchar
    // jenis varchar
    // harga double
    // kuantitas int

    public function show($id)
    {
        return view('detail-produk', [
            'produk' => Produk::findOrFail($id)
        ]);
    }

    public function storeEdit($id, Request $request)
    {
        $validated = $request->validate([
            'no_produk' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'jenis' => ['required', 'string'],
            'harga' => ['required', 'numeric'],
            'kuantitas' => ['required', 'numeric'],
            'gambar_produk' => ['image', 'mimes:jpg,png,jpeg,svg','max:2048' ]
        ]);

        

        DB::transaction(function() use ($id,$request) {
            
            $produk = Produk::findOrFail($id);
            $produk->no_produk = $request->no_produk;
            $produk->nama = $request->nama;
            $produk->deskripsi = $request->deskripsi;
            $produk->jenis = $request->jenis;
            $produk->harga = $request->harga;
            $produk->kuantitas = $request->kuantitas;

            if($request->file('gambar_produk') !== NULL){
                $nama_gambar = $request->file('gambar_produk')->getClientOriginalName();
                $path = $request->file('gambar_produk')->store('public/uploads');
                $produk->nama_gambar = $nama_gambar;
                $produk->path_gambar = $path;
            }
            
            $produk->save();
            // Produk::update([
            //     'id' => $request->id,
            //     'no_produk' => $request->no_produk,
            //     'nama'=> $request->nama,
            //     'deskripsi' => $request->deskripsi,
            //     'jenis' => $request->jenis,
            //     'harga' => $request->harga,
            //     'kuantitas' => $request->kuantitas,
            // ]);
        
        });

        $message = "Produk telah diperbarui";

        return view('produk', [
            'listProduk' => Produk::all()->sortBy('created_at')
        ])->with('toastmsg', $message);
    }

    /**
     * buat produk baru
     */
    public function create()
    {
        return view('detail-produk', [
            'produk' => [
                'id' => '',
                'no_produk' => '',
                'nama' => '',
                'deskripsi' => '',
                'jenis' => '',
                'harga' => '',
                'kuantitas' => '',
                'nama_gambar' => '',
                'path_gambar' => ''
                ]
        ]);
    }

    public function store(Request $request)
    {

        // $path = $request->file('gambar_produk')->store('public/uploads');
        // dd($request->file('gambar_produk'));
        
        $validated = $request->validate([
            'no_produk' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'jenis' => ['required', 'string'],
            'harga' => ['required', 'numeric'],
            'kuantitas' => ['required', 'numeric'],
            'gambar_produk' => ['required', 'image', 'mimes:jpg,png,jpeg,svg','max:2048' ]
        ]);
        

        DB::transaction(function() use ($request) {

            $nama_gambar = $request->file('gambar_produk')->getClientOriginalName();
            $path = $request->file('gambar_produk')->store('public/uploads');
            
            Produk::create([
                'no_produk' => $request->no_produk,
                'nama'=> $request->nama,
                'deskripsi' => $request->deskripsi,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
                'kuantitas' => $request->kuantitas,
                'nama_gambar' => $nama_gambar,
                'path_gambar' => $path
            ]);
        
        });

        $message = "Produk berhasil dibuat";

        return view('produk', [
            'listProduk' => Produk::all()->sortBy('created_at')
        ])->with('toastmsg', $message);
    }
}
