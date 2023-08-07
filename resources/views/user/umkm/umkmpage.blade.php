@extends('layouts.app')

@section('title', 'Product')

@section('content')
    {{-- hero --}}
    <div class="hero d-flex align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-white fw-bold mb-4">UMKM</h1>
                    <p class="text-white mb-5 text-opacity-75">
                        Berikut adalah UMKM-UMKM yang ada di Tangerang Selatan
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
                        <h3 class="title">Yuk Kepoin UMKM
                            <br>
                            Yang Ada Disini!
                        </h3>
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
                @foreach ($umkms as $umkm)
                    <div class="col d-flex justify-content-center">
                        <a href="/detailumkmpage/{{ $umkm->id }}">
                            <div class="card w-100"
                                style="box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px; border-radius: 12px">
                                <img src="{{ Storage::url($umkm->image) }}" class="card-img-top" style="height: 18em; width: 26em; background-size: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $umkm->name }}</h5>
                                    <p class="text-secondary" style="margin: 0">{{ $umkm->category_umkm->name }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="my-5">
                <div class="mb-1">
                    {{ $umkms->links() }}
                </div>
            </div>
        </div>
    @endsection
