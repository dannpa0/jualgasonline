<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use PDF;
use Carbon\Carbon;

class PesananController extends Controller
{
    /**
     * halaman untuk menampilkan tabel pesanan
     */
    public function index()
    {

        return view('pesanan', [
            'listPesanan' => Pesanan::all()->sortBy('created_at')

        ]);
        // return view('pesanan');
    }

    /**
     * Tes Halaman pemesanan user
     */
    public function orderPage()
    {
        return view('order-page', [
            'listProduk' => Produk::all()->sortBy('no_produk')
        ]);
    }

    /**
     * Tes Halaman untuk menyimpan pesanan pelanggan
     */
    public function storeOrder(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'produk' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string'],
            'no_hp' => ['required', 'regex:/^[08][0-9]+/', 'min:8'],
            // 'kecamatan' => $data['kecamatan'],
            // 'kelurahan' => $data['kelurahan'],
            // 'rt' => $data['rt'],
            // 'rw' => $data['rw'],
            // 'kota' => 'Bogor',
            'full_address' => ['required', 'string'],
            'kuantitas' => ['required', 'numeric'],
            'total_harga' => ['required', 'numeric']
        ]);

        Pesanan::create([
            
        ]);
        return view('order-page');
    }

    /**
     * Halaman untuk menampilkan detail pesanan
     */
    public function show($id)
    {

        $rincianPesanan = Pesanan::find($id);
        return view('detail-pesanan', [
            'rincianPesanan' => $rincianPesanan
        ]);
    }

    /**
     * Update status pesanan 
     */
    public function updateStatus($id, $status)
    {
        \DB::transaction(function() use($id, $status) {
            $pesanan = Pesanan::findOrFail($id);
            $pesanan->status = $status;
            $pesanan->save();
        });
        
        return view('pesanan', [
            'listPesanan' => Pesanan::all()->sortBy('created_at')
        ]);
    }

    /**
     * Downlad Report PDF
     */
    public function downloadReportPesananPDF(Request $request) {
        // dd($request->startDate);
        $start = date($request->startDate);
        $end = date($request->endDate);
        $show = Pesanan::whereBetween('created_at', [$start, $end])->get();

        
        
        $totalAllSell = 0;
        foreach($show as $pesanan) {
            $totalAllSell = $totalAllSell + $pesanan->total_harga;
        }

        $pdf = PDF::loadView('pesanan-pdf', compact('show', 'totalAllSell', 'start', 'end'));
        
        
        $current_timestamp = Carbon::now()->timestamp;
        return $pdf->download('laporan-penjualan-'.$current_timestamp.'.pdf');
    }

    /**
     * view pdf
     */
    public function viewReportPesananPDF(Request $request) {
        $start = date($request->startDate);
        $end = date($request->endDate);
        $show = Pesanan::whereBetween('created_at', [$start, $end])->get();
        $totalAllSell = 0;
        foreach($show as $pesanan) {
            $totalAllSell = $totalAllSell + $pesanan->total_harga;
        }
        // $pdf = PDF::loadView('pesanan-pdf', compact('show'));
        
        
        $current_timestamp = Carbon::now()->timestamp;
        return view('pesanan-pdf', compact('show', 'totalAllSell', 'start', 'end'));
    }
}
