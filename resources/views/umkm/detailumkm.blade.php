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
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Kategori UMKM</th>
                                        <th scope="col">Bank</th>
                                        <th scope="col">Nomor Rekening</th>
                                        <th scope="col">Pemilik Rekening</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $umkm->category_umkm->name }}</td>
                                        <td>{{ $umkm->bank }}</td>
                                        <td>{{ $umkm->norek }}</td>
                                        <td>{{ $umkm->atas_nama }}</td>
                                        <td>
                                            <a href="/umkm/detailumkm/{{ $umkm->id }}/edit"
                                                class="btn btn-md btn-warning">Edit UMKM</a>
                                            <a href="/umkm/detailumkm/{{ $umkm->id }}/delete"
                                                class="btn btn-md btn-danger">Hapus UMKM</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
