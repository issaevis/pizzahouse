@extends('layouts.app')

@section('content')
@vite(['resources/scss/main.scss'])
<div class="wrapper pizza-details">
    <h1>Order for {{ $pizza->name }}</h1>
    <p class="type">Type: {{ $pizza->type }}</p>
    <p class="base">Base: {{ $pizza->base }}</p>
    <p class="toppings">Extra Toppings</p>
    <ul>
        @foreach($pizza->toppings as $topping)
            <li>{{ $topping }}</li>
        @endforeach
    </ul>
    <form action="/pizzas/{{ $pizza->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Complete Order</button>
    </form>
</div>
<a href="/pizzas" class="back">Back to all pizzas</a>
@endsection