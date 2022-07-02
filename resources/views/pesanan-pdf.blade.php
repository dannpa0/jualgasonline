<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link href="{{ public_path('css/report.css') }}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ asset('css/report.css') }}" rel="stylesheet"  /> -->
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ public_path('img/mitramadina/mmlogo.png') }}">
        <!-- <img src="{{ asset('img/mitramadina/mmlogo.png') }}"> -->
      </div>
      <h1>Laporan Penjualan</h1>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Produk</th>
            <th class="desc">Pemesan</th>
            <th class="unit">Harga</th>
            <th class="qty">qty</th>
            <th class="total">Total Harga</th>
          </tr>
        </thead>
        <tbody>
            @if(count($show) > 0)
                @foreach($show as $idx => $pesanan)
                    <tr>
                        <td class="service">{{ $pesanan->produk->nama }}</td>
                        <td class="desc">{{ $pesanan->pelanggan->nama }}</td>
                        <td class="unit">@currency( $pesanan->produk->harga ) </td>
                        <td class="qty">{{ $pesanan->jumlah_produk }}</td>
                        <td class="total">@currency( $pesanan->total_harga )</td>
                    </tr>
                @endforeach
           @else
            <tr>
                <td colspan="5" style="text-align: center">
                Tidak ada penjualan 
                </td>
                
            </tr>

            @endif
          
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">@currency( $totalAllSell )</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Laporan Penjualan tanggal {{ $start }} sampai tanggal {{ $end }}.</div>
      </div>
    </main>
    
  </body>
</html>