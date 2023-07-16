@extends('umkm.layouts.app')

@section('title', 'Detail UMKM')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col">
                <h1 class="text-center">Detail {{ $products->name }}</h1>
            </div>
        </div>
        <div class="row gx-lg-5 d-flex align-items-center my-5">
            <div class="col-lg-6 mb-5">
                <img src="{{ Storage::url($products->image) }}" class="img-fluid rounded">
            </div>
            <div class="col-lg-6">
                <h2>{{ $products->name }}</h2>
                <p>{{ $products->description }}</p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama UMKM</th>
                                    <th scope="col">Kategori Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Persediaan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $products->umkm->name }}</td>
                                    <td>{{ $products->category_product->name }}</td>
                                    <td>Rp{{ number_format($products->price, 0, ',', '.') }}</td>
                                    <td>{{ $products->stock }}</td>
                                    <td>
                                        <a href="/umkm/product/{{ $products->id }}/edit" class="btn btn-md btn-warning">Edit
                                            Product</a>
                                        <a href="/umkm/product/{{ $products->id }}/delete"
                                            class="btn btn-md btn-danger">Hapus Product</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
