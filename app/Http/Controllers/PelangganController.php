<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    //
    public function index()
    {
        $listPelanggan = Pelanggan::all()->sortBy('createdDate');
        return view('pelanggan', [
            'listPelanggan' => $listPelanggan
        ]);
        // return view('pelanggan');
    }

    /**
     *  Menampilkan pelanggan based on id 
     */
    public function show($id){
        // return view('detail-pelanggan', [
        //     'pelanggan' =>  Pelanggan::findOrFail($id)
        // ]);

        $pelanggan = Pelanggan::findOrFail($id)->first();
        return view('detail-pelanggan', [
            'pelanggan' => $pelanggan
        ]);
    }

    public function saveById($id, Request $request)
    {
        // dd($id);

        $validated = $request->validate([
            'no_hp' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string'],
            'full_address' => ['required', 'string']
        ]);


        $pelanggan = Pelanggan::find($id);
        DB::transaction(function() use ($request, $pelanggan) {
            
            $pelanggan->nama = $request->nama;
            $pelanggan->no_hp = $request->no_hp;
            $pelanggan->save();
            
            $alamat = $pelanggan->alamat;
            $alamat->kecamatan = $request->kecamatan;
            $alamat->kelurahan = $request->kelurahan;
            $alamat->rt = $request->rt;
            $alamat->rw = $request->rw;
            $alamat->alamat_lengkap = $request->full_address;
            $alamat->save();
        });

        $message = 'Pembaruan pelanggan berhasil';

        return view('detail-pelanggan', [
            'pelanggan' => $pelanggan,
            // 'pelanggan.alamat' =>$pelanggan->alamat
        ])->with('toastmsg', $message);
  
    }
}
