@extends('umkm.layouts.app')

@section('title', 'Tambah UMKM')

@section('content')
    <div class="text-center my-5">
        <h3>Tambah UMKM</h3>
    </div>
    <!-- Create Post Form -->
    <form action="{{ url('/umkm') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama UMKM</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                aria-describedby="emailHelp" name="name">
            @error('name')
                <div class="invalid-feedback">
                    Nama tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_umkm_id" class="form-label">Pilih Kategori UMKM</label>
            <select class="form-select  @error('category_umkm_id') is-invalid @enderror" aria-label="Default select example"
                name="category_umkm_id" id="category_umkm_id">
                <option>Pilih UMKM</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_umkm_id')
                <div class="invalid-feedback">
                    Category UMKM tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="exampleInputPassword1"
                name="description"></textarea>
            <div id="emailHelp" class="form-text">Nama tidak boleh lebih dari 500 karakter</div>
            @error('description')
                <div class="invalid-feedback">
                    Deskripsi tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Alamat UMKM</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputPassword1"
                name="address">
            @error('address')
                <div class="invalid-feedback">
                    Alamat tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Link Google Maps Alamat</label>
            <input type="text" class="form-control @error('link_address') is-invalid @enderror"
                id="exampleInputPassword1" name="link_address">
            @error('link_address')
                <div class="invalid-feedback">
                    Link alamat tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Bank</label>
            <input type="text" class="form-control @error('bank') is-invalid @enderror" id="exampleInputEmail1"
                aria-describedby="emailHelp" name="bank">
            <div id="emailHelp" class="form-text">Contoh penulisan : BRI, BNI</div>
            @error('bank')
                <div class="invalid-feedback">
                    Nama Bank tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nomor Rekening</label>
            <input type="text" class="form-control @error('norek') is-invalid @enderror" id="exampleInputPassword1"
                name="norek">
            @error('norek')
                <div class="invalid-feedback">
                    Nomor Rekening tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama Pemilik Rekening</label>
            <input type="text" class="form-control @error('atas_nama') is-invalid @enderror" id="exampleInputPassword1"
                name="atas_nama">
            @error('atas_nama')
                <div class="invalid-feedback">
                    Nama pemilik rekening tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="my-3">
            <div class="input-group">
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>
        @foreach ($owners as $owner)
            <input type="hidden" name="pelaku_umkm_id" id="pelaku_umkm_id" value="{{ $owner->id }}">
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
