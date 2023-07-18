@extends('admin.app')

@section('title', 'Detail Owner')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Owner</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-5">
            <h1>Data {{ $pelaku_umkm->name }}</h1>
            <div class="my-5">
                <div class="header">
                    <h3>Data Profile</h3>
                    <p class="text-secondary">Data lengkap owner {{ $pelaku_umkm->name }}</p>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="align-items-center">
                            <td>{{ $pelaku_umkm->name }}</td>
                            <td>{{ $pelaku_umkm->email }}</td>
                            <td>{{ $pelaku_umkm->phone_number }}</td>
                            <td>{{ $pelaku_umkm->nik }}</td>
                            <td>{{ $pelaku_umkm->address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="my-5">
                <div class="header">
                    <h3>Data UMKM</h3>
                    <p class="text-secondary">Data UMKM yang dimiliki {{ $pelaku_umkm->name }}</p>
                </div>
                @php
                    $total_price = 0;
                @endphp
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama UMKM</th>
                            <th scope="col">Image</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Rekening</th>
                            <th scope="col">Pemilik Rekening</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelaku_umkm->umkms as $umkm)
                            <tr class="align-items-center">
                                <td>{{ $umkm->id }}</td>
                                <td>{{ $umkm->name }}</td>
                                <td>
                                    <img src="{{ Storage::url($umkm->image) }}" class="img-fluid" style="width: 4em">
                                </td>
                                <td>{{ $umkm->description }}</td>
                                <td>
                                    <a href="{{ $umkm->link_address }}">{{ $umkm->address }}</a>
                                </td>
                                <td>{{ $umkm->bank }}</td>
                                <td>{{ $umkm->norek }}</td>
                                <td>{{ $umkm->atas_nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
