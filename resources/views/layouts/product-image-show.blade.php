<div class="card" style="width: 18rem;">
    @php
    if($produk['path_gambar'] !== NULL)
    {
        $link = asset("storage/uploads/")."/".explode('/', $produk['path_gambar'])[2];
    }

    @endphp
    @if( $produk['path_gambar'] != NULL ) 
        <img class="card-img-top" src="{{ $link }}"  >
    @else
        <img class="card-img-top" src="https://via.placeholder.com/90"  >
    @endif
    <div class="card-body">
        <h5 class="card-title">{{ $produk->nama }}</h5>
        <p class="card-text"><b>@ x @currency($produk->harga)</b></p>
    </div>
</div>
