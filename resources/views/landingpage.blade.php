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

{{-- keunggulan --}}
<div class="keunggulan">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class=" text-center">
                    <h3 class="title">Keunggulan Aplikasi Kami</h3>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col col-lg-4 col-md-6 col-sm-12 ">
                <div class="keunggulan-list text-center">
                    <img src="{{ asset('css/icon-connected.png') }}" alt="">
                    <h3>Connected</h3>
                    <p>Bengkelin membantu kamu untuk terhubung dengan bengkel sehingga akan lebih mudah jika terjadi
                        kerusakan pada Kendaraan yang kamu miliki</p>
                </div>
            </div>
            <div class="col col-lg-4 col-md-6 col-sm-12 ">
                <div class="keunggulan-list text-center">
                    <img src="{{ asset('css/icon-transparan.png') }}" alt="">
                    <h3>Harga Transparan</h3>
                    <p>Tidak perlu takut dengan harga perbaikan kendaraan kamu, karena kamu bisa melihat harga dari
                        setiap perbaikan di halaman detail bengkel</p>
                </div>
            </div>
            <div class="col col-lg-4 col-md-6 col-sm-12 ">
                <div class="keunggulan-list text-center">
                    <img src="{{ asset('css/icon-terpercaya.png') }}" alt="">
                    <h3>Mitra Terpercaya</h3>
                    <p>Selain tidak perlu takut akan harga, kamu juga tidak perlu takut dengan mitra Kami, karena mitra
                        yang telah terdaftar di Bengkelin sudah pasti terpercaya</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="layanan">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class=" text-center">
                    <h3 class="title">Layanan yang Kami Tawarkan</h3>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center motor">
            <div class="col col-lg-5 col-md-6 col-sm-12">
                <img src="{{ asset('css/service-motor.jpg') }}" alt="" class="img-fluid">
            </div>
            <div class="col col-lg-5 col-md-6 col-sm-12 my-3">
                <h3>Booking Bengkel Online</h3>
                <p>Booking bengkel secara online akan memperhemat waktumu untuk memperbaiki kendaraan yang kamu miliki,
                    <br> jadi tunggu apa lagi?
                </p>
                <a href="/servicepage" class="btn btn-lg">Lihat Layanan</a>
            </div>
        </div>
    </div>
</div>
@endsection