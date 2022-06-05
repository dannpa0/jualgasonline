@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form pemesanan</div>

                <div class="card-body">
                <!-- {{ $pelanggan}} -->
                    <form method="POST">
                            @csrf
                                <div id="example2_wrapper" class="dataTables_wrapper">
                                    <div class="row">
                                    
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="no_hp">Nomor Telepon</label>
                                                <input type="text" class="form-control  @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ $pelanggan->no_hp }}">
                                                @error('no_hp')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $pelanggan->nama }}">
                                                @error('nama')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="kecamatan">Kecamatan</label>
                                                <select class="form-control" id="kecamatan" name="kecamatan">
                                                    <option value="Bojong Gede">Bojong Gede</option>
                                                    <!-- <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option> -->
                                                </select>
                                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="kelurahan">Kelurahan</label>
                                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                                                <select class="form-control" id="kelurahan" name="kelurahan">
                                                    <option value="Pabuaran">Pabuaran</option>
                                                    <!-- <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="postalcode">Kode Pos</label>
                                                <input type="text" class="form-control" id="postalcode" name="postalcode" value="16921" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="rw">RW</label>
                                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="16921"> -->
                                                <select class="form-control" id="rw" name="rw">
                                                    <option value="13">13</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="rt">RT</label>
                                                <select class="form-control" id="rt" name="rt" >
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="full_address">Alamat Lengkap</label>
                                                <textarea row="3" class="form-control  @error('full_address') is-invalid @enderror" id="full_address" name="full_address" >{{ $pelanggan->alamat->alamat_lengkap  }}</textarea>
                                                @error('full_address')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="produk">Produk Pilihan</label>
                                                    @include('layouts.product-image-show')
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="kuantitas">Kuantitas</label>
                                                        <div class="input-group flex-nowrap @error('kuantitas') is-invalid @enderror">
                                                            <input type="text" class="form-control " readonly id="qtyField" name="kuantitas" value="0">
                                                            <div class="input-group-append">
                                                                <button type="button" id="qtyDec"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                                                <button type="button" id="qtyInc"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                            </div>
                                                        </div>
                                                        @error('kuantitas')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror

                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <h5><b>Rincian</b></h5>
                                                        <div class="d-flex">
                                                            <div class="row" style="font-style: italic">
                                                                <div class="col-sm-12" id="rincianNamaProduk">{{ $produk->nama}}</div>
                                                                <div class="col-sm-6 " >Jumlah</div>
                                                                <div class="col-sm-6 text-right" id="rincianJumlahProduk">0</div>
                                                                <div class="col-sm-6 " >Harga</div>
                                                                <div class="col-sm-6 text-right" id="rincianHargaProduk">{{ $produk->harga }}</div>
                                                                <div class="col-sm-6 " >Ongkos Kirim</div>
                                                                <div class="col-sm-6 text-right" id="rincianHargaProduk"></div>
                                                                <div class="col-sm-6 " ><b>Total</b></div>
                                                                <div class="col-sm-6 text-right" id="rincianTotalProduk">0</div>
                                                                
                                                                <!-- <div class="col-sm-6"></div>
                                                                <div class="col-sm-6"></div> -->

                                                            </div>
                                                        </div>
                                                        
                                                        <!-- <input type="text" class="form-control  @error('kuantitas') is-invalid @enderror" id="kuantitas" name="kuantitas" >
                                                        @error('kuantitas')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group" style="border: #f02929 solid 1px;padding: 12px;border-radius: 12px; background-color:#fef0f0">
                                                        <label for="is_cod">Pilih pengiriman barang</label> 
                                                        <div class="" style="font-size: 12px">
                                                            *Pengiriman akan di kenakan biaya tambahan bila barang diantarkan pada alamat tujuan
                                                        </div>

                                                        <div class="mt-2">
                                                        <div class="form-check form-check-inline" style="line-height: 14px;">
                                                            <input class="form-check-input" type="radio" name="cod_yes" id="cod_yes" value="1">
                                                            <label class="form-check-label" for="cod_yes">
                                                                Ambil di tempat
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline" style="line-height: 14px;">
                                                            <input class="form-check-input" type="radio" name="cod_no" id="cod_no" value="0" checked>
                                                            <label class="form-check-label" for="cod_no">
                                                                Dikirim
                                                            </label>
                                                        </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        

                                    </div>
                                    <div class="row mt-5">
                                        
                                        
                                    </div>
                                    <!-- <input id="inputProduProduk" name="total_harga" type="hidden" value="0"> -->
                                    <input id="inputTotalProduk" name="total_harga" type="hidden" value="0">
                                    <input id="idProduk" name="id_produk" type="hidden" value="{{ $produk['id'] }}">
                                    <div class="row mt-5">
                                        <div class="col-sm-12 d-flex"><button class="btn btn-primary flex-grow-1 text-center">Pesan</button></div>
                                    </div>
                                </div>
                            </form>
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection