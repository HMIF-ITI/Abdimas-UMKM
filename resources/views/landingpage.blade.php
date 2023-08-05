@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
{{-- hero --}}
<div class="hero d-flex align-items-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col mx-3">
                <h1 class="fw-bold mb-4">Selamat Datang di UMKM</h1>
                <h1 class="fw-bold mb-4">Kelurahan Setu</h1>
                <p class="mb-5 text-opacity-75">
                    Website UMKM untuk menampung usaha-usaha milik masyarakat,
                    dengan transaksi direct ke penjual namun,
                    <br> penjual diawasi oleh pihak admin untuk diperiksa keaslian usahanya.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- trend --}}
<div class="trend">
    <div class="row">
        <div class="col">
            <h3 class="mx-3">Trend Categories</h3>
            <div class="trend-categories justify-content-center">
                <img src="{{ asset('css/trend-fashion.png') }}" alt="trend-fashion" class="mx-3">
                <img src="{{ asset('css/trend-electronic.png') }}" alt="trend-electronic" class="mx-3">
                <img src="{{ asset('css/trend-food.png') }}" alt="trend-food" class="mx-3">
            </div>
        </div>
    </div>
</div>

{{-- products --}}
<div class="products">
    <div class="row">
        <div class="col">
            <h3 class="mx-3">Products</h3>
            <div class="products-best mx-3 d-flex justify-content-between">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/ice-cream.png') }}" alt="ice-cream" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Ice Cream</p>
                        <p class="card-text-price">Rp10.000</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/ice-cream.png') }}" alt="ice-cream" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Ice Cream</p>
                        <p class="card-text-price">Rp10.000</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/ice-cream.png') }}" alt="ice-cream" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Ice Cream</p>
                        <p class="card-text-price">Rp10.000</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/ice-cream.png') }}" alt="ice-cream" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Ice Cream</p>
                        <p class="card-text-price">Rp10.000</p>
                    </div>
                </div>
            </div>
            <div class="products-best mx-3 d-flex justify-content-between">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/ice-cream.png') }}" alt="ice-cream" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Ice Cream</p>
                        <p class="card-text-price">Rp10.000</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/ice-cream.png') }}" alt="ice-cream" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Ice Cream</p>
                        <p class="card-text-price">Rp10.000</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/ice-cream.png') }}" alt="ice-cream" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Ice Cream</p>
                        <p class="card-text-price">Rp10.000</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/ice-cream.png') }}" alt="ice-cream" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Ice Cream</p>
                        <p class="card-text-price">Rp10.000</p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="" class="btn btn-md btn-primary align-items-center" style="border-radius: 20px">Semua Produk</a>
            </div>
        </div>
    </div>
</div>

{{-- UMKMs --}}
<div class="umkms">
    <div class="row">
        <div class="col">
            <h3 class="mx-3">UMKMs</h3>
            <div class="umkms-best mx-3 d-flex justify-content-between">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/cafe.png') }}" alt="cafe" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Cafe-cafean</p>
                        <p class="card-text">Tangerang</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/cafe.png') }}" alt="cafe" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Cafe-cafean</p>
                        <p class="card-text">Tangerang</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/cafe.png') }}" alt="cafe" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Cafe-cafean</p>
                        <p class="card-text">Tangerang</p>
                    </div>
                </div>
            </div>
            <div class="umkms-best mx-3 d-flex justify-content-between">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/cafe.png') }}" alt="cafe" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Cafe-cafean</p>
                        <p class="card-text">Tangerang</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/cafe.png') }}" alt="cafe" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Cafe-cafean</p>
                        <p class="card-text">Tangerang</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('css/cafe.png') }}" alt="cafe" class="mx-3">
                    <div class="card-body">
                        <p class="card-text">Cafe-cafean</p>
                        <p class="card-text">Tangerang</p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="" class="btn btn-md btn-primary align-items-center" style="border-radius: 20px">Semua UMKM</a>
            </div>
        </div>
    </div>
</div>


@endsection