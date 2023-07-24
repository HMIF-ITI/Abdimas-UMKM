@extends('admin.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product List</h3>
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
                    <input type="text" class="form-control" placeholder="Cari Product disini" name="keyword"
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
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Nama UMKM</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="align-items-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category_product->name }}</td>
                            <td>
                                <img src="{{ Storage::url($product->image) }}" class="img-fluid" style="width: 4em">
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->umkm->name }}</td>
                            <td class="d-flex align-items-center">
                                <a href="/detailproduct/{{ $product->id }}" class="btn btn-warning mr-1 text-white">
                                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i></a>
                                <a href="/adminlistproduct/{{ $product->id }}/delete" class="btn btn-danger"><i
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
