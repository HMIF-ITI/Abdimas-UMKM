@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <div class="carts my-5">
        <div class="text-center my-5">
            <h3>
                Keranjangmu
            </h3>
        </div>
        <div class="container">
            <div class="row">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @php
                    $total_price = 0;
                @endphp
            </div>
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4">
                @foreach ($carts as $cart)
                    <div class="col">
                        <div class="card">
                            <img src="{{ Storage::url($cart->product->image) }}" class="card-img-top" style="height: 16rem;">
                            <div class="card-body">
                                <div class="card-title d-flex justify-content-between align-items-center">
                                    <h5>{{ $cart->product->name }}</h5>
                                    <h6>IDR {{ $cart->product->price }}</h6>
                                </div>
                                <p class="card-text">Jumlah : {{ $cart->qty }}</p>
                                <form action="{{ route('update_cart', $cart) }}" method="post">
                                    @method('patch')
                                    @csrf
                                    <div class="mb-3">
                                        <input type="number" name="qty" value="{{ $cart->qty }}"
                                            class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                                <form action="{{ route('update_cart', $cart) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-link text-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @php
                        $total_price += $cart->product->price * $cart->qty;
                    @endphp
                @endforeach
            </div>
            <div class="row my-5 mx-1">
                <div class="alert alert-primary" role="alert">
                    Total Belanja : {{ $total_price }}
                </div>
                {{-- checkout --}}
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" value="haha" name="status">
                    <button type="submit" class="btn btn-primary"
                        @if ($carts->isEmpty()) disabled @endif>Checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection
