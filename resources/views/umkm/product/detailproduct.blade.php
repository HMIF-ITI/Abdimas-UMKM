@extends('umkm.layouts.app')

@section('title', 'Detail Product')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col">
                <h1 class="text-center">Detail Product {{ $products->name }}</h1>
            </div>
        </div>
        <div class="row gx-lg-5 d-flex align-items-center my-5">
            <div class="col-lg-6 mb-5">
                <img src="{{ Storage::url($products->image) }}" class="img-fluid rounded">
            </div>
            <div class="col-lg-6">
                <h2>{{ $products->name }}</h2>
                @foreach ($umkms as $umkm)
                    @if ($products->id_umkm == $umkm->id)
                        <p>{{ $umkm->name }}</p>
                    @endif
                @endforeach
                <p>Harga : {{ $products->price }}</p>
                <p>Stock : {{ $products->stock }}</p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col col-lg-4">
                <h4>Action</h4>
                <div class="mt-3 d-flex justify-content-between">
                    <a href="/umkm/product/{{ $products->id }}/edit" class="btn btn-md btn-warning">Edit Product</a>
                    <a href="/umkm/product/{{ $products->id }}/delete" class="btn btn-md btn-danger">Hapus Product</a>
                </div>
            </div>
        </div>
    </div>
@endsection
