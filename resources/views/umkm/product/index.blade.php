@extends('umkm.layouts.app')

@section('title', 'Product')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col">
                <h1 class="text-center">Daftar Product di UMKM</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ '/umkm/product/add' }}" class="btn btn-primary my-4" type="button">+ Tambah Product</a>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @if ($products->isEmpty())
                <p><i class="text-warning">Anda belum menambahkan product pada UMKM Anda, silahkan tekan tombol di atas
                        untuk menambahkan product pada
                        UMKM Anda</i></p>
            @else
                @foreach ($products as $product)
                    <div class="col">
                        <a href="/umkm/product/detailproduct/{{ $product->id }}" style="text-decoration: none">
                            <div class="card">
                                <img src="{{ Storage::url($product->image) }}" class="img-fluid card-img-top">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $product->name }}</h6>
                                    <span style="color:black">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
