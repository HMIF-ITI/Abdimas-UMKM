@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="px-5">
    {{-- hero --}}
<div class="banner">
    <div class="container">
        <div class="row a align-items-center">
            <div class="col mx-5">
                <h1 class="fw-bold mb-4">Selamat Datang di UMKM <br>
                     di Kelurahan Setu</h1>
                <p class="mb-5 ">
                    Website UMKM untuk menampung usaha-usaha milik masyarakat, dengan <br>
                    transaksi direct ke penjual namun, penjual diawasi oleh pihak admin untuk <br>
                    diperiksa keaslian usahanya.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- category --}}
<div class="category">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="mb-3">Trend Categories</h3>
            </div>
        </div>
        <div class="row row-cols-lg-4 row-cols-2 gx-4">
            <div class="col d-flex justify-content-center my-3">
                <img src="{{ asset('css/icon-fd.jpg') }}" alt="">
            </div>
            <div class="col d-flex justify-content-center my-3">
                <img src="{{ asset('css/icon-fashion.jpg') }}" alt="">
            </div>
            <div class="col d-flex justify-content-center my-3">
                <img src="{{ asset('css/icon-elektronik.jpg') }}" alt="">
            </div>
            <div class="col d-flex justify-content-center my-3">
                <img src="{{ asset('css/icon-jasa.jpg') }}" alt="">
            </div>
        </div>
    </div>
</div>

{{-- products --}}
<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="mb-3">Products</h3>
            </div>
        </div>
        <div class="row row-cols-lg-4 row-cols-2 gx-4">
            @foreach ($products as $product)
            <a href="/detailproductpage/{{ $product->id }}">
                <div class="col">
                    <div class="card">
                        <img src="{{ Storage::url($product->image) }}" alt="ice-cream" >
                        <p class="nama-produk">{{ $product->name }}</p>
                        <p class="price">{{ $product->price }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <a href="/productpage" class="btn semua" style="border-radius: 20px">Semua Produk</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- UMKMs --}}
<div class="umkms">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="mb-3">UMKM</h3>
            </div>
        </div>
        <div class="row row-cols-lg-3 row-cols-1 gx-4">
            @foreach ($umkms as $umkm)
            <a href="/detailumkmpage/{{ $umkm->id }}">
                <div class="col">
                    <div class="card">
                        <img src="{{ Storage::url($umkm->image) }}" alt="cafe" style="height: 18em; width: 26em; background-size: cover;">
                        <p class="nama-umkm">{{ $umkm->name }}</p>
                        <div class="lokasi-umkm d-flex align-items-center mb-5">
                            <img src="{{ asset('css/icon-location.png') }}">
                            <p class="alamat-umkm" style="white-space: nowrap; overflow:hidden;">{{ $umkm->address }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach    
        </div>
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <a href="/umkmpage" class="btn semua">Semua UMKM</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection