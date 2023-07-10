@extends('umkm.layouts.app')

@section('title', 'Edit UMKM')

@section('content')
    <div class="container">
        {{-- @foreach ($umkms as $umkm) --}}
        <div class="row">
            <div class="col">
                <h1 class="text-center">Edit {{ $umkm->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="/detailumkm/{{ $umkm->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama UMKM</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ $umkm->name }}">
                        <div id="emailHelp" class="form-text">Nama tidak boleh lebih dari 255 karakter</div>
                        @error('name')
                            <div class="invalid-feedback">
                                Nama tidak boleh kosong
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="exampleInputPassword1"
                            name="description" placeholder="{{ $umkm->description }}"></textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                Deskripsi tidak boleh kosong
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                            id="exampleInputPassword1" name="address" value="{{ $umkm->address }}">
                        @error('address')
                            <div class="invalid-feedback">
                                Alamat tidak boleh kosong
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Link Google Maps Alamat</label>
                        <input type="text" class="form-control @error('link_address') is-invalid @enderror"
                            id="exampleInputPassword1" name="link_address" value="{{ $umkm->link_address }}">
                        @error('link_address')
                            <div class="invalid-feedback">
                                Link alamat tidak boleh kosong
                            </div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <div class="input-group">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    @foreach ($owners as $owner)
                        <input type="hidden" name="id_pelaku_umkm" id="id_pelaku_umkm" value="{{ $owner->id }}">
                    @endforeach
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>
@endsection
