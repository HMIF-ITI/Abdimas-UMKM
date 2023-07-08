@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    {{-- hero --}}
    <div class="hero d-flex align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h3 class="text-white fw-semibold mb-2">Holaaa</h3>
                    <h1 class="text-white fw-bold mb-4">Selamat Datang di Abdimas</h1>
                    <p class="text-white mb-5 text-opacity-75">
                        Lorem ipsum dolor sit amet consectetur. Ut mus ut sed maecenas nibh. Leo pulvinar turpis mauris
                        massa tortor. <br>
                        Eu sed cursus sapien diam. Dui venenatis libero fringilla mauris purus aliquam vel sed arcu.
                    </p>
                    <a href="#" class="btn btn-primary btn-lg rounded-1 mt-3">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
