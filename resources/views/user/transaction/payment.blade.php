@extends('layouts.app')

@section('title', 'Payment')

@section('content')
    <div class="container">
        <h3 class="text-center my-5">Proses Pembayaran</h3>
        <div class="text-center">
            <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        document.getElementById('pay-button').addEventListener('click', function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert('Pembayaran berhasil!');
                    window.location.href = '/transaction';
                },
                onPending: function(result) {
                    alert('Menunggu pembayaran...');
                },
                onError: function(result) {
                    alert('Pembayaran gagal!');
                }
            });
        });
    </script>
@endsection
