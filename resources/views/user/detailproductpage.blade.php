@extends('layouts.app')

@section('title', 'Detail Bengkel')

@section('content')

<div class="detail">
    <div class="container my-4">
        <div class="row gx-lg-5">
            <div class="col-lg-6 mb-5">
                <img src="{{ asset('css/work.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <div class="detail-product">
                    <h1>Mutiara Jaya AC</h1>
                    <div class="desc-product-location d-flex align-items-center">
                        <img src="{{ asset('css/icon-location.png') }}" alt="">
                        <h5>Tangerang</h5>
                    </div>
                    <p class="mt-4">MUTIARA JAYA AC (NEW PAM) adalah bengkel Umum Daihatsu, Datsun, Honda, Lainnya, Mazda, Mercedes Benz, Mitsubishi, Nissan, Suzuki, Toyota, dan Wuling yang berada di Tangerang, yang bisa anda hubungi atau datangi untuk melakukan service kendaraan Daihatsu, Datsun, Honda, Lainnya, Mazda, Mercedes Benz, Mitsubishi, Nissan, Suzuki, Toyota, dan Wuling. Andapun dapat melakukan "booking service" secara gratis di bengkel MUTIARA JAYA AC (NEW PAM) dengan cara mengklik button hubungi sekarang, lalu hubungi no kontak tersebut untuk menjadwalkan kedatangan Anda agar Anda terbebas dari antrian di bengkel.</p>
                </div>
            </div>
        </div>
        <div class="row my-5 new-information">
            <div class="col-12">
                <div class="detail-product-new-information d-flex align-items-center">
                    <img src="{{ asset('css/icon-informasi.png') }}" alt="">
                    <h5 class="ml-2">Informasi Tambahan</h5>
                </div>
            </div>
        </div>
        <div class="row option p-3">
            <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                <div class="product-name mb-3">
                    <h5>Mutiara Jaya AC</h5>
                    <a href="">Lihat di Peta >>></a>
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