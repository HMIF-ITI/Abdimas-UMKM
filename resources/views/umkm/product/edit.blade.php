@extends('umkm.layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text-center my-5">
                    <h3>Edit Product {{ $product->name }}</h3>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <!-- Create Post Form -->
                <form action="/umkm/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="umkm_id" class="form-label">Pilih UMKM</label>
                        <select class="form-select  @error('umkm_id') is-invalid @enderror"
                            aria-label="Default select example" name="umkm_id" id="umkm_id">
                            <option>Pilih UMKM</option>
                            @foreach ($umkms as $umkm)
                                <option value="{{ $umkm->id }}">{{ $umkm->name }}</option>
                            @endforeach
                        </select>
                        <div id="emailHelp" class="form-text">UMKM tidak boleh kosong</div>
                        @error('umkm_id')
                            <div class="invalid-feedback">
                                UMKM tidak boleh kosong
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="name"
                            value="{{ $product->name }}">
                        <div id="emailHelp" class="form-text">Nama produk tidak boleh lebih dari 255 karakter</div>
                        @error('name')
                            <div class="invalid-feedback">
                                Nama tidak boleh kosong
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_product_id" class="form-label">Pilih Kategori Produk</label>
                        <select class="form-select  @error('category_product_id') is-invalid @enderror"
                            aria-label="Default select example" name="category_product_id" id="category_product_id">
                            <option>{{ $product->category_product->name }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_product_id')
                            <div class="invalid-feedback">
                                Category UMKM tidak boleh kosong
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror"
                            id="exampleInputPassword1" name="description" value="{{ $product->description }}">
                        @error('description')
                            <div class="invalid-feedback">
                                Deskripsi tidak boleh kosong
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Harga</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                            id="exampleInputPassword1" name="price" value="{{ $product->price }}">
                        @error('price')
                            <div class="invalid-feedback">
                                Harga tidak boleh kosong
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Stock</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror"
                            id="exampleInputPassword1" name="stock" value="{{ $product->stock }}">
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
            </div>
        </div>
    </div>
@endsection
