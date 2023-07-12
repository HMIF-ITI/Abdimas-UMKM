@extends('layouts.app')

@section('title', 'Service')

@section('content')
{{-- hero --}}
<div class="hero d-flex align-items-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <h1 class="text-white fw-bold mb-4">UMKM Kami</h1>
                <p class="text-white mb-5 text-opacity-75">
                    Berikut adalah layanan yang bisa kami berikan untuk Anda
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
                <div class="umkm-button">
                    <div class="col d-flex justify-content-center align-items-center">                        
                        <button type="button" class="btn btn-primary mx-3">Makanan</button>
                        <button type="button" class="btn btn-secondary mx-3">Fashion</button>
                        <button type="button" class="btn btn-secondary mx-3">Elektronik</button>
                        <button type="button" class="btn btn-secondary mx-3">Jasa</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="umkm-card d-flex flex-row justify-content-center align-items-center">
            <div class="card mx-3">
                <img src="/public/css/work.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mutiara Jaya AC</h5>
                    <p class="card-text">Tangerang</p>
                </div>
            </div>
            <div class="card mx-3">
                <img src="/public/css/work.png"" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mutiara Jaya AC</h5>
                    <p class="card-text">Tangerang</p>
                </div>
            </div>
            <div class="card mx-3">
                <img src="/public/css/work.png"" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mutiara Jaya AC</h5>
                    <p class="card-text">Tangerang</p>
                </div>
            </div>
        </div>
        <div class="umkm-card d-flex flex-row justify-content-center align-items-center">
            <div class="card mx-3">
                <img src="/public/css/work.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mutiara Jaya AC</h5>
                    <p class="card-text">Tangerang</p>
                </div>
            </div>
            <div class="card mx-3">
                <img src="/public/css/work.png"" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mutiara Jaya AC</h5>
                    <p class="card-text">Tangerang</p>
                </div>
            </div>
            <div class="card mx-3">
                <img src="/public/css/work.png"" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mutiara Jaya AC</h5>
                    <p class="card-text">Tangerang</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection