@extends('admin.app')

@section('title', 'Detail Transaksi')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Transaksi</h3>

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
            <h1>Data {{ $transaction->id }}</h1>
            <div class="my-5">
                <div class="header">
                    <h3>Data Transaksi</h3>
                    <p class="text-secondary">Data lengkap Transaksi dengan {{ $transaction->id }}</p>
                </div>
                @php
                    $total_price = 0;
                @endphp
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Pembeli</th>
                            <th scope="col">Qty/Product/Price</th>
                            <th scope="col">Total</th>
                            <th scope="col">Nama UMKM</th>
                            <th scope="col">Pemilik UMKM</th>
                            <th scope="col">Bank UMKM</th>
                            <th scope="col">Rekening UMKM</th>
                            <th scope="col">Pemilik Rekening UMKM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="align-items-center">
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->created_at }}</td>
                            @if ($transaction->is_paid == 0)
                                <td class="text-warning">Belum dibayar</td>
                            @else
                                <td class="text-success">Lunas</td>
                            @endif
                            <td>{{ $transaction->user->name }}</td>
                            <td>
                                @foreach ($transaction->detail_transactions as $detail)
                                    {{ $detail->qty }}/{{ $detail->product->name }}/
                                    Rp{{ number_format($detail->product->price, 0, ',', '.') }}
                                    <br>
                                    @php
                                        $total_price += $detail->product->price * $detail->qty;
                                    @endphp
                                @endforeach
                            </td>
                            <td>Rp{{ number_format($total_price, 0, ',', '.') }}</td>
                            <td>
                                @foreach ($transaction->detail_transactions as $detail)
                                    - {{ $detail->umkm->name }} <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($transaction->detail_transactions as $detail)
                                    - {{ $detail->umkm->pelaku_umkm->name }} <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($transaction->detail_transactions as $detail)
                                    - {{ $detail->umkm->bank }} <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($transaction->detail_transactions as $detail)
                                    - {{ $detail->umkm->norek }} <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($transaction->detail_transactions as $detail)
                                    - {{ $detail->umkm->atas_nama }} <br>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- <div class="my-5">
                <div class="header">
                    <h3>Data UMKM</h3>
                    <p class="text-secondary">Data UMKM yang dimiliki {{ $pelaku_umkm->name }}</p>
                </div>
                @php
                    $total_price = 0;
                @endphp
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama UMKM</th>
                            <th scope="col">Image</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Rekening</th>
                            <th scope="col">Pemilik Rekening</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelaku_umkm->umkms as $umkm)
                            <tr class="align-items-center">
                                <td>{{ $umkm->id }}</td>
                                <td>{{ $umkm->name }}</td>
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
                        @endforeach
                    </tbody>
                </table>
            </div> --}}
        </div>
        <!-- /.card-body -->
    </div>
@endsection
