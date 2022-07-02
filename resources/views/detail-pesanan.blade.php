@extends('layouts.admin-lte')

@section('content-admin')
<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Pesanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Pesanan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
    <div class="content">
        <div class="container-fluid">
            <!-- <div class="container w-75"> -->
                <div class="row justify-content-left">
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
                                                    @include('layouts.rincian-field', ['title'=>'Nama', 'value'=>$rincianPesanan->pelanggan->nama])
                                                </div>
                                                <div class="row">
                                                    @include('layouts.rincian-field', ['title'=>'Nomer Handphone', 'value'=>$rincianPesanan->pelanggan->no_hp])
                                                </div>
                                                <div class="row  mt-4"><h5><i><b>Rincian Alamat</b></i></h5></div>
                                                <div class="row ">
                                                    @include('layouts.rincian-field', ['title'=>'Kota', 'value'=>'Bogor'])
                                                </div>
                                                <div class="row">
                                                    @include('layouts.rincian-field', ['title'=>'Kecamatan', 'value'=>$rincianPesanan->pelanggan->alamat->kecamatan])
                                                </div>
                                                <div class="row">
                                                    @include('layouts.rincian-field', ['title'=>'Kelurahan', 'value'=>$rincianPesanan->pelanggan->alamat->kelurahan])
                                                </div>
                                                <div class="row">
                                                    @include('layouts.rincian-field', ['title'=>'RT', 'value'=>$rincianPesanan->pelanggan->alamat->rt])
                                                </div>
                                                <div class="row">
                                                    @include('layouts.rincian-field', ['title'=>'RW', 'value'=>$rincianPesanan->pelanggan->alamat->rw])
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">Alamat Lengkap</div>
                                                    <div class="col-12" style="color: #c4c4c4" >{{ $rincianPesanan->pelanggan->alamat->alamat_lengkap}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="container">
                                                <div class="row"><h5><i><b>Rincian Pesanan</b></i></h5></div>
                                                <div class="row">
                                                    @include('layouts.rincian-field', ['title'=>'Nama Produk', 'value'=>$rincianPesanan->produk->nama])
                                                </div>
                                                <div class="row">
                                                    @include('layouts.rincian-field', ['title'=>'Harga Satuan', 'value'=>$rincianPesanan->produk->harga, 'idr'=>TRUE])
                                                </div>
                                                <div class="row">
                                                    @include('layouts.rincian-field', ['title'=>'Jumlah Pembelian', 'value'=>$rincianPesanan->jumlah_produk])
                                                </div>
                                                <div class="row">
                                                    @include('layouts.rincian-field', ['title'=>'Ongkos kirim', 'value'=>$rincianPesanan->is_cod?3000:0, 'idr'=>TRUE])
                                                </div>
                                                <div class="row">
                                                    @include('layouts.rincian-field', ['title'=>'Total Harga', 'value'=>$rincianPesanan->total_harga, 'idr'=>TRUE])
                                                </div>
                                                <div class="row">
                                                    @include('layouts.rincian-field', ['title'=>'STATUS', 'value'=>$rincianPesanan->status])
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
