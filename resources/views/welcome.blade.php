@extends('layouts.layout')

@section('content')
@vite(['resources/scss/main.scss'])
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
    @endif

    <div class="content">
        <img src="/img/pizza-house.png" alt="Pizza House Logo">
        <div class="title m-b-md">
            The North's Best Pizzas
        </div>
        <p class="mssg" >{{ session('message') }}</p>
        <a href="{{ route('pizzas.create') }}">Order a pizza</a>
    </div>
</div>
@endsection