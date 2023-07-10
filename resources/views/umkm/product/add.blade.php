@extends('umkm.layouts.app')

@section('title', 'Add Product')

@section('content')
    <div class="text-center my-5">
        <h3>Tambah Product</h3>
    </div>
    <!-- Create Post Form -->
    <form action="{{ url('/product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                aria-describedby="emailHelp" name="name">
            <div id="emailHelp" class="form-text">Nama roduk tidak boleh lebih dari 255 karakter</div>
            @error('name')
                <div class="invalid-feedback">
                    Nama tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="exampleInputPassword1"
                name="description">
            @error('description')
                <div class="invalid-feedback">
                    Deskripsi tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Harga</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="exampleInputPassword1"
                name="price">
            @error('price')
                <div class="invalid-feedback">
                    Harga tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Stock</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="exampleInputPassword1"
                name="stock">
            @error('stock')
                <div class="invalid-feedback">
                    Stock tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="my-3">
            <div class="input-group">
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

@endsection
