@extends('layouts.admin-lte')

@section('content-admin')
<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail pelanggan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail pelanggan</li>
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

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pelanggan #{{$pelanggan['id']}}</h3>
                        </div>

                        <div class="card-body">
                            <!-- {{ $pelanggan }} -->
                            
                            <form method="POST">
                            @csrf
                                <div id="example2_wrapper" class="dataTables_wrapper">
                                    <div class="row">
                                    
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="no_hp">Nomor Telepon</label>
                                                <input type="text" class="form-control  @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{$pelanggan['no_hp']}}">
                                                @error('no_hp')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$pelanggan['nama']}}">
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
                                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="16921"> -->
                                                <select class="form-control" id="rt" name="rt">
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
                                                    <!-- <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="full_address">Alamat Lengkap</label>
                                                <textarea row="3" class="form-control  @error('full_address') is-invalid @enderror" id="full_address" name="full_address" >{{ $pelanggan->alamat['alamat_lengkap'] }}</textarea>
                                                @error('full_address')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12"><button class="btn btn-primary">Simpan</button></div>
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
