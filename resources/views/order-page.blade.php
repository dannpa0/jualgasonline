@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Test input pesanan</div>

                <div class="card-body">
                <form method="POST">
                            @csrf
                                <div id="example2_wrapper" class="dataTables_wrapper">
                                    <div class="row">
                                    
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="no_hp">Nomor Telepon</label>
                                                <input type="text" class="form-control  @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                                                @error('no_hp')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
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
                                                <textarea row="3" class="form-control  @error('full_address') is-invalid @enderror" id="full_address" name="full_address" >{{ old('full_address') }}</textarea>
                                                @error('full_address')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="produk">Pilih Produk</label>
                                                <select class="form-control" id="selectProduk" name="produk">
                                                    @foreach( $listProduk as $produk)
                                                        <option value="{{ $produk->no_produk }}" 
                                                            data-nama="{{ $produk->nama }}"
                                                            data-harga="{{ $produk->harga }}">{{ $produk->no_produk }}, {{ $produk->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="kuantitas">Kuantitas</label>
                                                <!-- <input type="file" class="form-control" id="image" name="image" > -->
                                                <div class="input-group flex-nowrap">
                                                    <input type="text" class="form-control @error('kuantitas') is-invalid @enderror" readonly id="qtyField" name="kuantitas" value="0">
                                                    <div class="input-group-append">
                                                        <button type="button" id="qtyInc"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                        <button type="button" id="qtyDec"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                                        <!-- <div class="row h-50 flex-grow-1">
                                                            <div class="col-12 h-50 d-flex align-items-center">
                                                                <button type="button" class="h-100 browse btn btn-primary  "></button>
                                                            </div>
                                                            <div class="col-12 h-50 d-flex align-items-center">
                                                                <button type="button" class="h-100 browse btn btn-primary"></button>
                                                            </div>
                                                        </div> -->
                                                        
                                                    </div>
                                                    @error('kuantitas')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                                </div>

                                            </div>
                                        </div>
                                        

                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <h5><b>Rincian</b></h5>
                                                <div class="d-flex">
                                                    <div class="row" style="font-style: italic">
                                                        <div class="col-sm-12" id="rincianNamaProduk">xxx</div>
                                                        <div class="col-sm-6 " >Jumlah</div>
                                                        <div class="col-sm-6 text-right" id="rincianJumlahProduk">xxx</div>
                                                        <div class="col-sm-6 " >Harga</div>
                                                        <div class="col-sm-6 text-right" id="rincianHargaProduk">xxx</div>
                                                        <div class="col-sm-6 " ><b>Total</b></div>
                                                        <div class="col-sm-6 text-right" id="rincianTotalProduk">xxx</div>
                                                        <!-- <div class="col-sm-6"></div>
                                                        <div class="col-sm-6"></div> -->

                                                    </div>
                                                </div>
                                                
                                                <!-- <input type="text" class="form-control  @error('kuantitas') is-invalid @enderror" id="kuantitas" name="kuantitas" >
                                                @error('kuantitas')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror -->
                                            </div>
                                        </div>
                                        <!-- {{ $listProduk }} -->
                                    </div>
                                    <!-- <input id="inputProduProduk" name="total_harga" type="hidden" value="0"> -->
                                    <input id="inputTotalProduk" name="total_harga" type="hidden" value="0">
                                    <div class="row mt-5">
                                        <div class="col-sm-12"><button class="btn btn-primary">Simpan</button></div>
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