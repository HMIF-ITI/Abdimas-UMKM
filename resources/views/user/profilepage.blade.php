@extends('layouts.app')

@section('title', 'Profile User')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col text-center">
                @auth
                    <h1>{{ Auth::user()->name }}</h1>
                    <p>{{ Auth::user()->email }}</p>
                    <p>{{ Auth::user()->nik }}</p>
                    <p>{{ Auth::user()->phone_number }}</p>
                    <p>{{ Auth::user()->address }}</p>
                @endauth
            </div>
        </div>
    </div>
@endsection
