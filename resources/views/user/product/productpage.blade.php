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
            <div class="row">
                <div class="col">
                    <div class=" text-center">
                        <h3 class="title">Mau Belanja Apa Hari Ini?</h3>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-lg-8">
                    <form action="" method="GET">
                        @csrf
                        <input type="text" class="form-control" placeholder="Cari produk disini" name="keyword"
                            style="height: 60px; border-radius: 12px">
                    </form>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
                @foreach ($products as $product)
                    <div class="col d-flex justify-content-center">
                        <a href="/detailproductpage/{{ $product->id }}">
                            <div class="card w-100"
                                style="box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px; border-radius: 12px">
                                <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="text-secondary" style="margin: 0">
                                        Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="my-5">
                <div class="mb-1">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    @endsection
