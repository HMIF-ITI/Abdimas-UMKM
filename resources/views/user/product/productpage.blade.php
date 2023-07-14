@extends('layouts.app')

@section('title', 'Product')

@section('content')
    {{-- hero --}}
    <div class="hero d-flex align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-white fw-bold mb-4">Product UMKM</h1>
                    <p class="text-white mb-5 text-opacity-75">
                        Berikut adalah produk-produk yang ada dimiliki UMKM di Tangerang Selatan
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- umkm --}}
    <div class="umkm">
        <div class="container">
            {{-- <div class="row">
                <div class="col">
                    <div class="umkm-button">
                        <div class="col d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-primary mx-3">Makanan</button>
                            <button type="button" class="btn btn-secondary mx-3">Fashion</button>
                            <button type="button" class="btn btn-secondary mx-3">Elektronik</button>
                            <button type="button" class="btn btn-secondary mx-3">Jasa</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-lg-8">
                    <form action="" method="GET">
                        @csrf
                        <input type="text" class="form-control" placeholder="Cari produk disini" name="keyword">
                    </form>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($products as $product)
                    <div class="col">
                        <a href="/detailproductpage/{{ $product->id }}">
                            <div class="card">
                                <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="text-secondary">{{ $product->price }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
