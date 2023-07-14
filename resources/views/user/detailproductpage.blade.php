@extends('layouts.app')

@section('title', 'Detail Product')

@section('content')

    <div class="detail">
        <div class="container my-4">
            <div class="row gx-lg-5">
                <div class="col-lg-6 mb-5">
                    <img src="{{ Storage::url($product->image) }}" alt="" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <div class="detail-product">
                        <h1>{{ $product->name }}</h1>
                        <div class="desc-product-location d-flex align-items-center">
                            <img src="{{ asset('css/icon-location.png') }}" alt="">
                            <h5 class="mx-3">{{ $product->umkm->address }}</h5>
                        </div>
                        <p class="mt-4">{{ $product->description }}</p>
                        <p class="mt-4">Harga : {{ $product->price }}</p>
                        <p class="mt-4">Stock : {{ $product->stock }}</p>
                        <p class="mt-4">Pemilik : {{ $product->umkm->pelaku_umkm->name }}</p>
                    </div>
                </div>
            </div>
            <div class="row option p-3">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="product-name mb-3">
                        <h5>Mutiara Jaya AC</h5>
                        <a href="{{ $product->umkm->link_address }}">Lihat di Peta >>></a>
                    </div>
                    <div class="product-button">
                        <a href="" class="btn btn-lg btn-info">Hubungi Penjual</a>
                        <a href="{{ url('paymentpage') }}" class="btn btn-lg btn-primary">Beli</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
