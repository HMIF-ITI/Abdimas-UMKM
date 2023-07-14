@extends('layouts.app')

@section('title', 'Pesan Bengkel')

@section('content')

    <div class="mb-xl-5 pesan">
        <div class="pesan-bengkel">
            <div class="container my-3 p-5">
                <div class="row">

                    <form action="{{ url('/booking') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <h1 class="text-center font-weight-bold">Form Pembayaran</h1>
                            <div class="mb-3">
                                <h4 class="font-weight-bold mb-3">Data Customer </h4>
                                <label for="exampleInputName" class="form-label">Name</label>
                                <input type="hidden" name="user_id" id="user_id" value="" class="">
                                <input type="text" class="form-control" id="exampleInputName" aria-describedby="name"
                                    value="" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail" value=""
                                    name="email">
                            </div>
                            <div class="mb-3">
                                <label for="typeNumber" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="typeNumber" value=""
                                    name="phone_number">
                            </div>
                        </div>

                        {{-- <div class="mt-5">
                        <h5 class="fw-bold">Total: Rp{{ number_format($total_price, 0, ',', '.') }}</h5>
                    </div> --}}

                        <div class="col-lg-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-lg btn-primary btn-pesan">Selanjutnya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
