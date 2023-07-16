@extends('umkm.layouts.app')

@section('title', 'UMKM')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col">
                <h1 class="text-center">Daftar UMKM</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ 'umkm/add' }}" class="btn btn-primary my-4" type="button">+ Tambah UMKM</a>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @if ($umkms->isEmpty())
                <p><i class="text-warning">Anda belum mendaftarkan UMKM Anda, silahkan tekan tombol di atas
                        untuk menambahkan
                        UMKM Anda</i></p>
            @else
                @foreach ($umkms as $umkm)
                    <div class="col">
                        <a href="/umkm/detailumkm/{{ $umkm->id }}" style="text-decoration: none">
                            <div class="card">
                                <img src="{{ Storage::url($umkm->image) }}" class="img-fluid card-img-top">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $umkm->name }}</h6>
                                    <span style="color:black">{{ $umkm->category_umkm->name }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
