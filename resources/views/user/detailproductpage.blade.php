@extends('layouts.app')

@section('title', 'Detail Bengkel')

@section('content')

<div class="detail-bengkel p-5">
    <div class="container my-4">
        <div class="row gx-lg-5 d-flex align-items-center">
            <div class="col-lg-6 mb-5">
                <img src="" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <h1>Nama produk</h1>
                <div class="desc-bengkel-lokasi d-flex align-items-center">
                    <img src="{{ asset('css/icon-location.png') }}" alt="">
                    <h5>alamat produk</h5>
                </div>
                <p>deskripsi produk</p>
            </div>
        </div>
        <div class="row my-5 informasi-tambahan">
            <div class="detail-bengkel-informasi-tambahan d-flex align-items-center">
                <img src="{{ asset('css/icon-informasi.png') }}" alt="">
                <h5>Informasi Tambahan</h5>
            </div>

        </div>
        <div class="row option p-3">
            <div class="col d-flex justify-content-between align-items-center">
                <div class="nama-bengkel">
                    <h5>nama produk</h5>
                    <a href="">Lihat di Peta >>></a>
                </div>
                <div class="hubungi">
                    <a href="" class="btn btn-lg btn-primary pesan-bengkel">Pesan
                        Bengkel</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection