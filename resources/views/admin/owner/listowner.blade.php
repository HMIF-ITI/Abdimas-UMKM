@extends('admin.app')

@section('title', 'List Owner')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Owner List</h3>
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
                    <input type="text" class="form-control" placeholder="Cari owner disini" name="keyword"
                        style="border-radius: 12px">
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelaku_umkms as $item)
                        <tr class="align-items-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <a href="/detailowner/{{ $item->id }}" class="text-warning">Detail</a>
                                <a href="/adminlistowner/{{ $item->id }}/delete" class="text-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
