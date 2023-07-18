@extends('layouts.app')

@section('title', 'Detail Product')

@section('content')

    <div class="detail">
        <div class="container my-4">
            <div class="row gx-lg-5 d-flex align-items-center">
                <div class="col-lg-6 mb-5">
                    <img src="{{ Storage::url($product->image) }}" alt="" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <div class="detail-product">
                        <h1>{{ $product->name }}</h1>
                        <h5>Rp{{ number_format($product->price, 0, ',', '.') }}</h5>
                        <p class="mt-4">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
            <div class="row my-5 informasi-tambahan">
                <div class="col-lg-4 my-3">
                    <h5>Informasi Lainnya</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Stock</th>
                                <th scope="col">Kategori Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->category_product->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-8 my-3">
                    <h5>Informasi UMKM</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama UMKM</th>
                                <th scope="col">Nama Pemilik UMKM</th>
                                <th scope="col">Telepon Pemilik UMKM</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $product->umkm->name }}</td>
                                <td>{{ $product->umkm->pelaku_umkm->name }}</td>
                                <td>{{ $product->umkm->pelaku_umkm->phone_number }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row option p-3" style="box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="product-name mb-3">
                        <h3>{{ $product->umkm->name }}</h3>
                        <a href="{{ $product->umkm->link_address }}">Lihat di Peta >>></a>
                    </div>
                    <div class="product-button d-flex align-items-center">
                        <form action="{{ route('add_toCart', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="qty" value="1">
                            <button class="btn btn-lg btn-primary text-white">Masukkan ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
