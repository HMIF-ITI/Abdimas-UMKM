@extends('admin.app')

@section('title', 'Detail User')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail User</h3>
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
            <h1>Data {{ $user->name }}</h1>
            <div class="my-5">
                <div class="header">
                    <h3>Data Profile</h3>
                    <p class="text-secondary">Data lengkap user {{ $user->name }}</p>
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
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->nik }}</td>
                            <td>{{ $user->address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="my-5">
                <div class="header">
                    <h3>Data Transaksi</h3>
                    <p class="text-secondary">Data transaksi yang telah dilakukan {{ $user->name }}</p>
                </div>
                @php
                    $total_price = 0;
                @endphp
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Total Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->transactions as $item)
                            <tr class="align-items-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at }}</td>
                                @if ($item->is_paid == 0)
                                    <td class="text-warning">Belum dibayar</td>
                                @else
                                    <td class="text-success">Lunas</td>
                                @endif
                                <td>
                                    @foreach ($item->detail_transactions as $detail)
                                        - {{ $detail->qty }}. {{ $detail->product->name }} <br>
                                        @php
                                            $total_price += $detail->product->price * $detail->qty;
                                        @endphp
                                    @endforeach
                                </td>
                                <td>Rp{{ number_format($total_price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
