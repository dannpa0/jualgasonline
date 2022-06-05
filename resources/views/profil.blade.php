@extends('layouts.app')
@section('content')
<div class="container w-75">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Profil Pelanggan</div>
                <div class="card-body">
                    <!-- {{ $pelanggan}} -->
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="container">
                                    <div class="row"><h5><i><b>Rincian Pelanggan</b></i></h5></div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'Nama', 'value'=>$pelanggan->nama])
                                    </div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'Nomer Handphone', 'value'=>$pelanggan->no_hp])
                                    </div>
                                    <div class="row">
                                        @include('layouts.rincian-field', ['title'=>'Tanggal Daftar', 'value'=>$pelanggan->created_at])
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="container">
                                    <div class="row"><h5><i><b>Rincian Alamat</b></i></h5></div>
                                        <div class="row ">
                                            @include('layouts.rincian-field', ['title'=>'Kota', 'value'=>'Bogor'])
                                        </div>
                                        <div class="row">
                                            @include('layouts.rincian-field', ['title'=>'Kecamatan', 'value'=>$pelanggan->alamat['kecamatan']])
                                        </div>
                                        <div class="row">
                                            @include('layouts.rincian-field', ['title'=>'Kelurahan', 'value'=>$pelanggan->alamat['kelurahan']])
                                        </div>
                                        <div class="row">
                                            @include('layouts.rincian-field', ['title'=>'RT', 'value'=>$pelanggan->alamat['rt']])
                                        </div>
                                        <div class="row">
                                            @include('layouts.rincian-field', ['title'=>'RW', 'value'=>$pelanggan->alamat['rw']])
                                        </div>
                                        <div class="row">
                                            <div class="col-12">Alamat Lengkap</div>
                                            <div class="col-12" style="color: #c4c4c4" >{{ $pelanggan->alamat['alamat_lengkap']}}</div>
                                        </div>
                                    </div>
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