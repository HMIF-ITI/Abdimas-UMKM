@extends('umkm.layouts.app')

@section('title', 'Transactions')

@section('content')
    <div class="container">
        <div class="row g-4">
            @if ($transactions->isEmpty())
                <p><i class="text-warning">Waahh ..., sepertinya UMKM kamu belum memiliki transaksi</i></p>
            @else
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID Transaksi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Status</th>                              
                                <th scope="col">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @auth
                                @foreach ($transactions as $transaction)
                                    @foreach ($transaction->detail_transactions as $detail)
                                        @if ($detail->umkm->pelaku_umkm->id == Auth::user()->id)
                                            <tr>
                                                <td>{{ $transaction->id }}</td>
                                                <td>{{ $transaction->created_at->translatedFormat('l d M Y') }}</td>
                                                @if ($transaction->is_paid == 0)
                                                    <td class="text-danger">Belum Dibayar</td>
                                                @else
                                                    <td class="text-success">Sudah Dibayar</td>
                                                @endif
                                                <td class="d-flex align-items-center">
                                                    @if ($transaction->is_paid == 0)
                                                        <a href="{{ Storage::url($transaction->payment_receipt) }}"
                                                            class="btn btn-info">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                        <a href="/umkm/detailtransaction/{{ $transaction->id }}"
                                                            class="mx-1 btn btn-warning">

                                                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                                                        </a>
                                                        <form action="{{ route('confirm_payment', $transaction) }}"
                                                            method="post">
                                                            @csrf
                                                            <button class="btn btn-success" type="submit">
                                                                <i class="fa-solid fa-circle-check"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <a href="{{ Storage::url($transaction->payment_receipt) }}"
                                                            class="btn btn-info">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                        <a href="/umkm/detailtransaction/{{ $transaction->id }}"
                                                            class="mx-1 btn btn-warning">
                                                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                                                        </a>
                                                        <form action="{{ route('confirm_payment', $transaction) }}"
                                                            method="post">
                                                            @csrf
                                                            <button class="btn btn-success" type="submit" disabled>
                                                                <i class="fa-solid fa-circle-check"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @else
                                            <p style="color: #f8f9fc">Belum Memiliki Transaksi</p>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endauth
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
