@extends('layouts.app')

@section('title', 'Transaction')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col">
                <div class="text-center my-5">
                    <h3>
                        Daftar Transaksi
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5 bg-light p-5" style="border-radius: 20px">
        @foreach ($transaction as $item)
            <div class="row py-3 mb-3 bg-white" style="border-radius: 20px">
                <div class="col d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <p class="card-link p-3 bg-light" style="border-radius: 12px; margin:0">
                            <img src="{{ asset('css/icon-bag-2.png') }}" style="width: 3em; height:auto">
                        </p>
                        <div class="mx-5">
                            <h5 style="margin: 0">{{ $item->created_at }}</h5>
                            @if ($item->is_paid == 0)
                                <p style="margin: 0" class="text-warning">Belum dibayar</p>
                            @else
                                <p style="margin: 0" class="text-success">Sudah dibayar</p>
                            @endif

                        </div>
                    </div>
                    <div>
                        <a href="{{ route('detail_transaction', $item) }}" class="card-link p-3 bg-light"
                            style="border-radius: 12px;">
                            <img src="{{ asset('css/icon-arrow.png') }}" style="width: 2em; height:auto"></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
