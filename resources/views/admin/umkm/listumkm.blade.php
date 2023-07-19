@extends('admin.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">UMKM List</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mt-5">
                <form action="" method="GET">
                    @csrf
                    <input type="text" class="form-control" placeholder="Cari UMKM disini" name="keyword"
                        style="border-radius: 12px">
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama UMKM</th>
                        <th scope="col">Pemilik</th>
                        <th scope="col">Kategori UMKM</th>
                        <th scope="col">Image</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($umkms as $umkm)
                        <tr class="align-items-center">
                            <td>{{ $umkm->id }}</td>
                            <td>{{ $umkm->name }}</td>
                            <td>{{ $umkm->pelaku_umkm->name }}</td>
                            <td>{{ $umkm->category_umkm->name }}</td>
                            <td>
                                <img src="{{ Storage::url($umkm->image) }}" class="img-fluid" style="width: 4em">
                            </td>
                            <td>
                                <a href="{{ $umkm->link_address }}">{{ $umkm->address }}</a>
                            </td>
                            <td class="d-flex justify-content-between align-items-center">
                                <a href="/detailumkm/{{ $umkm->id }}" class="btn btn-warning mr-1 text-white">
                                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i></a>
                                <a href="/adminlistumkm/{{ $umkm->id }}/delete" class="btn btn-danger"><i
                                        class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
