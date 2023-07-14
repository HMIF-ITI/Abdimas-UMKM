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
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-lg-8">
                    <form action="" method="GET">
                        @csrf
                        <input type="text" class="form-control" placeholder="Cari produk disini" name="keyword">
                    </form>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($umkms as $umkm)
                    <div class="col">
                        <a href="/detailumkmpage/{{ $umkm->id }}">
                            <div class="card">
                                <img src="{{ Storage::url($umkm->image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $umkm->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
