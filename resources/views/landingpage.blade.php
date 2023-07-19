@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
{{-- hero --}}
<div class="hero d-flex align-items-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <!-- <h3 class="text-white fw-semibold mb-2">Holaaa</h3> -->
                <h1 class="text-white fw-bold mb-4">Selamat Datang di UMKM</h1>
                <h1 class="text-white fw-bold mb-4">Tangerang Selatan</h1>
                <p class="text-white mb-5 text-opacity-75">
                    Website UMKM untuk menampung usaha-usaha milik masyarakat,
                    dengan transaksi direct ke penjual namun,
                    penjual diawasi oleh pihak admin untuk diperiksa keaslian usahanya.
                </p>
                <a href="#" class="btn btn-primary btn-lg rounded-1 mt-3">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</div>

{{-- unggulan --}}
<div class="unggulan">
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{ asset('css/dance.png') }}" alt="" class="unggulan-img">
            </div>
            <div class="col">
                <div class="detail-unggulan">
                    <h1>UMKM</h1>
                    <p class="unggulan-p">Maksimalkan Potensi 
                        Usaha Mikro, Kecil, dan 
                        Menengah (UMKM) 
                        Anda dengan Solusi 
                        Unggulan!</p>
                    <a href="" class="btn btn-lg btn-info">Lihat UMKM</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="unggulan">
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{ asset('css/dance.png') }}" alt="" class="unggulan-img">
            </div>
            <div class="col">
                <div class="detail-unggulan">
                    <h1>PRODUK</h1>
                    <p class="unggulan-p">Dukung Produk Lokal
                        dan Berikan Dampak
                        Positif untuk Usaha 
                        Mikro, Kecil dan 
                        Menengah (UMKM)
                        Indonesia!</p>
                    <a href="" class="btn btn-lg btn-info">Lihat Produk</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection