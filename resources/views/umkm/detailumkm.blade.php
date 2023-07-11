@extends('umkm.layouts.app')

@section('title', 'Detail UMKM')

@section('content')
    <div class="container">
        @foreach ($umkms as $umkm)
            <div class="row my-5">
                <div class="col">
                    <h1 class="text-center">Detail {{ $umkm->name }}</h1>
                </div>
            </div>
            <div class="row gx-lg-5 d-flex align-items-center my-5">
                <div class="col-lg-6 mb-5">
                    <img src="{{ Storage::url($umkm->image) }}" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <h2>{{ $umkm->name }}</h2>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('css/icon-location.png') }}" alt="">
                        <h6 class="mx-4 alamat">{{ $umkm->address }}</h6>
                    </div>
                    <p>{{ $umkm->description }}</p>
                </div>
            </div>
            <div class="row my-5">
                <div class="col col-lg-4">
                    <h4>Action</h4>
                    <div class="mt-3 d-flex justify-content-between">
                        <a href="/umkm/detailumkm/{{ $umkm->id }}/edit" class="btn btn-md btn-warning">Edit UMKM</a>
                        <a href="/umkm/detailumkm/{{ $umkm->id }}/delete" class="btn btn-md btn-danger">Hapus UMKM</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
