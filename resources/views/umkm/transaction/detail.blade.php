@extends('umkm.layouts.app')

@section('title', 'Detail Transactions')

@section('content')
    <div class="container">
        {{-- @foreach ($transaction->detail_transactions as $detail)
                    @if ($detail->umkm->pelaku_umkm->id == Auth::user()->id)
                        <p>{{ $detail->product->name }}</p>
                        <p>{{ $detail->umkm->name }}</p>
                        {{ $detail->qty }}/{{ $detail->product->name }}/
                        Rp{{ number_format($detail->product->price, 0, ',', '.') }}
                        <br>
                        @php
                            $total_price += $detail->product->price * $detail->qty;
                        @endphp
                        <p>Rp{{ number_format($total_price, 0, ',', '.') }}</p>
                    @endif
                @endforeach --}}
        <div class="row my-5">
            <div class="col text-center">
                <h1>Detail Transaksi</h1>
                <p>Detail transaksi dengan Id Transaksi {{ $transaction->id }}</p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col">
                @php
                    $total_price = 0;
                @endphp
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Product</th>
                            <th scope="col">Image</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">User</th>
                            <th scope="col">UMKM</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction->detail_transactions as $detail)
                            @if ($detail->umkm->pelaku_umkm->id == Auth::user()->id)
                                <tr>
                                    <td>{{ $detail->product->name }}</td>
                                    <td>
                                        <img src="{{ Storage::url($detail->product->image) }}" class="img-fluid"
                                            style="width: 4em">
                                    </td>
                                    <td>{{ $detail->qty }}</td>
                                    <td>Rp{{ number_format($detail->product->price, 0, ',', '.') }}</td>
                                    @php
                                        $total_price += $detail->product->price * $detail->qty;
                                    @endphp
                                    <td>Rp{{ number_format($total_price, 0, ',', '.') }}</td>
                                    @if ($transaction->is_paid == 0)
                                        <td class="text-warning">Belum dibayar</td>
                                    @else
                                        <td class="text-success">Lunas</td>
                                    @endif
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>{{ $detail->umkm->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
