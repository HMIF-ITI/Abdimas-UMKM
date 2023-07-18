@extends('admin.app')

@section('title', 'Detail Product')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Product</h3>

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
            <h1>Data {{ $product->name }}</h1>
            <div class="my-5">
                <div class="header">
                    <h3>Data Product</h3>
                    <p class="text-secondary">Data lengkap product {{ $product->name }}</p>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="align-items-center">
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category_product->name }}</td>
                            <td>
                                <img src="{{ Storage::url($product->image) }}" class="img-fluid" style="width: 4em">
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="my-5">
                <div class="header">
                    <h3>Data UMKM</h3>
                    <p class="text-secondary">Data UMKM yang memiliki product {{ $product->name }}</p>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama UMKM</th>
                            <th scope="col">Pemilik UMKM</th>
                            <th scope="col">Category UMKM</th>
                            <th scope="col">Image</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Rekening</th>
                            <th scope="col">Pemilik Rekening</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="align-items-center">
                            <td>{{ $product->umkm->id }}</td>
                            <td>{{ $product->umkm->name }}</td>
                            <td>{{ $product->umkm->pelaku_umkm->name }}</td>
                            <td>{{ $product->umkm->category_umkm->name }}</td>
                            <td>
                                <img src="{{ Storage::url($product->umkm->image) }}" class="img-fluid" style="width: 4em">
                            </td>
                            <td>{{ $product->umkm->description }}</td>
                            <td>
                                <a href="{{ $product->umkm->link_address }}">{{ $product->umkm->address }}</a>
                            </td>
                            <td>{{ $product->umkm->bank }}</td>
                            <td>{{ $product->umkm->norek }}</td>
                            <td>{{ $product->umkm->atas_nama }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
