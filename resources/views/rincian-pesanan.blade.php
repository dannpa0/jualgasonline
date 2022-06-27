@extends('layouts.app')
@section('content')
<div class="container w-75">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Rincian Pemesanan</div>
                <div class="card-body">
                    <!-- {{ $rincianPesanan}} -->
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="container">
                                    <div class="row"><h5><i><b>Rincian Pelanggan</b></i></h5></div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'Nama', 'value'=>$rincianPesanan->nama])
                                    </div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'Nomer Handphone', 'value'=>$rincianPesanan->no_hp])
                                    </div>
                                    <div class="row  mt-4"><h5><i><b>Rincian Alamat</b></i></h5></div>
                                    <div class="row ">
                                        @include('layouts.rincian-field', ['title'=>'Kota', 'value'=>'Bogor'])
                                    </div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'Kecamatan', 'value'=>$rincianPesanan->kecamatan])
                                    </div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'Kelurahan', 'value'=>$rincianPesanan->kelurahan])
                                    </div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'RT', 'value'=>$rincianPesanan->rt])
                                    </div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'RW', 'value'=>$rincianPesanan->rw])
                                    </div>
                                    <div class="row">
                                        <div class="col-12">Alamat Lengkap</div>
                                        <div class="col-12" style="color: #c4c4c4" >{{ $rincianPesanan->full_address}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="container">
                                    <div class="row"><h5><i><b>Rincian Pesanan</b></i></h5></div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'Nama Produk', 'value'=>$rincianProduk->nama])
                                    </div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'Harga Satuan', 'value'=>$rincianProduk->harga, 'idr'=>TRUE])
                                    </div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'Jumlah Pembelian', 'value'=>$rincianPesanan->kuantitas])
                                    </div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'Ongkos kirim', 'value'=>$rincianPesanan->is_cod?3000:0, 'idr'=>TRUE])
                                    </div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'Total Harga', 'value'=>$totalHarga, 'idr'=>TRUE])
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <div class="container d-flex">
                                    <button type="button" class="btn btn-primary w-100" onclick="window.location.href='{{ url('/form-pesanan/').'/'.$rincianProduk->id.'/done' }}'">Pesan Sekarang</button>
                                </div>
                                
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection