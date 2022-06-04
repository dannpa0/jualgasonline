@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Selamat Datang</h1>
    <p class="lead">Menjual gas Elipiji secara online, Silahkan untuk memilih produk untuk di pesan.</p>
  </div>
</div>
<div class="container">
    <div class="row">
        @for ($i = 0; $i < 4; $i++)
        <div class="col-3">
            <div class="card" >
                <img class="card-img-top h-50" src="https://via.placeholder.com/90" alt="Card image cap" style="max-height: 11rem">
                <div class="card-body">
                    <h5 class="card-title">Gas Elpiji 3 kg</h5>
                    <p class="card-text">Antar jemput gas elpiji 3kg.</p>
                    <a href="#" class="btn btn-primary">Beli</a>
                </div>
            </div>
        </div>
        @endfor
        

    <div class="row">
        <div class="col">
            
        </div>
    </div>
</div>
@endsection