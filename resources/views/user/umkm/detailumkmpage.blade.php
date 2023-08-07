@extends('layouts.app')

@section('title', 'Detail UMKM')

@section('content')

    <div class="detail">
        <div class="container my-4">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5">
                    <img src="{{ Storage::url($umkm->image) }}" alt="" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <div class="detail-product">
                        <h1>{{ $umkm->name }}</h1>
                        <div class="desc-product-location d-flex align-items-center">
                            <img src="{{ asset('css/icon-location.png') }}" alt="">
                            <h6 class="mx-3" style="margin-bottom: 0">{{ $umkm->address }}</h6>
                        </div>
                        <p class="mt-4">{{ $umkm->description }}</p>
                    </div>
                </div>
            </div>
            <div class="row my-5 informasi-tambahan">
                <div class="col-lg-3 my-3">
                    <h5>Informasi Lainnya</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Kategori UMKM</th>
                                <th scope="col">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $umkm->category_umkm->name }}</td>
                                <td>{{ $umkm->address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-9 my-3">
                    <h5>Informasi UMKM</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama Pemilik</th>
                                <th scope="col">Telepon Pemilik</th>
                                <th scope="col">Alamat Pemilik</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $umkm->pelaku_umkm->name }}</td>
                                <td>{{ $umkm->pelaku_umkm->phone_number }}</td>
                                <td>{{ $umkm->pelaku_umkm->address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <h5>Produk UMKM {{ $umkm->name }}</h5>
            <div class="products row row row-cols-lg-4 row-cols-2">
                @foreach ($umkm->products as $item)
                <a href="/detailproductpage/{{ $item->id }}">
                    <div class="col">
                        <div class="card">
                            <img src="{{ Storage::url($item->image) }}" alt="ice-cream" >
                            <p class="nama-produk">{{ $item->name }}</p>
                            <p class="price">{{ $item->price }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
                
            </div>
            <div class="row option p-3" style="box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="product-name mb-3">
                        <h5>{{ $umkm->name }}</h5>
                        <a href="{{ $umkm->link_address }}">Lihat di Peta >>></a>
                    </div>
                    {{-- <div class="product-button">
                        <a href="{{ url('productpage') }}" class="btn btn-lg btn-primary">Belanja Sekarang</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
