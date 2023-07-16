@extends('layouts.app')

@section('title', 'Detail Transaction')

@section('content')
    <div class="transactions my-5">
        <div class="text-center my-5">
            <h3>
                Detail Transaction
            </h3>
        </div>
        <div class="container">
            <div class="row">
                @php
                    $total_price = 0;
                @endphp
                <div class="col">
                    <div class="card p-5">
                        <h3 class="mb-4">Transaksi</h3>
                        @if ($transaction->is_paid == 0)
                            <span class="text-warning">Belum dibayar</span>
                        @else
                            <span class="text-success">Sudah dibayar</span>
                        @endif
                        <p class="fw-bold">{{ $transaction->created_at }}</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Barang</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            @foreach ($transaction->detail_transactions as $item)
                                <tbody>
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>Rp{{ number_format($item->product->price, 0, ',', '.') }}</td>
                                        <td>{{ $item->qty }} Pcs</td>
                                    </tr>
                                    @php
                                        $total_price += $item->product->price * $item->qty;
                                    @endphp
                            @endforeach
                            </tbody>
                        </table>

                        <h5 class="mt-3 text-center">Total: Rp{{ number_format($total_price, 0, ',', '.') }}</h5>
                        @if ($transaction->is_paid == false && $transaction->payment_receipt == null)
                            <form action="{{ route('submit_payment_receipt', $transaction) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Upload your payment receipt</label>
                                    <input type="file" name="payment_receipt" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Bayar Sekarang</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
