@extends('admin.app')

@section('title', 'Detail User')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail UMKM</h3>
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
            <h1>Data {{ $umkm->name }}</h1>
            <div class="my-5">
                <div class="header">
                    <h3>Data UMKM</h3>
                    <p class="text-secondary">Data lengkap UMKM {{ $umkm->name }}</p>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Owner</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category UMKM</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Address</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Rekening</th>
                            <th scope="col">Pemilik Rekening</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="align-items-center">
                            <td>{{ $umkm->pelaku_umkm->name }}</td>
                            <td>{{ $umkm->name }}</td>
                            <td>{{ $umkm->category_umkm->name }}</td>
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
                    </tbody>
                </table>
            </div>

            <div class="my-5">
                <div class="header">
                    <h3>Data Product</h3>
                    <p class="text-secondary">Data product yang dimiliki {{ $umkm->name }}</p>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($umkm->products as $product)
                            <tr class="align-items-center">
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category_product->name }}</td>
                                <td>
                                    <img src="{{ Storage::url($product->image) }}" class="img-fluid" style="width: 4em">
                                </td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
