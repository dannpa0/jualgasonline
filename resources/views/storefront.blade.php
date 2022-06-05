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
        @foreach ($listProduk as $produk)
        <div class="col-3">
            @include('layouts.product-image')
        </div>
        @endforeach
        

    <div class="row">
        <div class="col">
            
        </div>
    </div>
</div>
@endsection