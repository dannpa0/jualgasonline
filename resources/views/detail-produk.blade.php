@extends('layouts.admin-lte')

@section('content-admin')
<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail produk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">produk #{{$produk['no_produk']}}</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <div id="example2_wrapper" class="dataTables_wrapper">
                                    <div class="row">
                                    
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="no_produk">Nomer Produk</label>
                                                <input type="text" class="form-control @error('no_produk') is-invalid @enderror" id="no_produk" name="no_produk"  value="{{$produk['no_produk']}}" placeholder="P001">
                                                @error('no_produk')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$produk['nama']}}" placeholder="Gas Elpiji 3 Kg">
                                                @error('nama')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi Produk</label>
                                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"  value="{{$produk['deskripsi']}}" placeholder="Tabung gas seberat 3 Kg">
                                                @error('deskripsi')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="jenis">Jenis Produk</label>
                                                <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis"  value="{{$produk['jenis']}}" placeholder="GAS">
                                                @error('jenis')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{$produk['harga']}}" placeholder="22000">
                                                @error('harga')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="kuantitas">Kuantitas / Stok barang</label>
                                                <input type="text" class="form-control @error('kuantitas') is-invalid @enderror" id="kuantitas" name="kuantitas" value="{{$produk['kuantitas']}}" placeholder="12">
                                                @error('kuantitas')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <!-- <label for="image">Gambar Produk</label> -->
                                                <!-- <input type="file" class="form-control" id="image" name="image" > -->
                                                <input type="file" name="gambar_produk" class="file" accept="image/*" style="visibility: hidden;position: absolute;" >
                                                <div class="input-group my-3">
                                                    <input type="text" class="form-control @error('gambar_produk') is-invalid @enderror" disabled placeholder="Upload File" id="file">
                                                    <div class="input-group-append">
                                                        <button type="button" class="browse btn btn-primary">Browse...</button>
                                                    </div>
                                                    @error('gambar_produk')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="ml-2 col-sm-6">
                                            {{ $produk['path_gambar'] }}
                                            @if( $produk['path_gambar'] != NULL ) 
                                                <img src="{{ $link }}" id="preview" class="img-thumbnail">
                                            @else
                                                <img src="https://via.placeholder.com/80" id="preview" class="img-thumbnail">
                                            @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12"><button class="btn btn-primary">Simpan</button></div>
                                    </div>
                                    
                                    
                                    <!-- table footer --> 
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                        
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
