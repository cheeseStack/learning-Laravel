@extends('layouts.app')
    
    @section('content')
    <div class="wrappper pizza-details">
        <h1 class="name">Order for {{ $pizza->name }} </h1>
        <p class="type"> Type - {{ $pizza->type }}</p>
        <p class="base"> Base - {{ $pizza->base }}</p>
        <!-- beelow: foreach for extra toppings -->
        <p class="base"> Extra Toppings:</p>
        <ul>
            @foreach($pizza->toppings as $topping)
                <li>{{ $topping }}</li>
            @endforeach
        </ul> <br>
        <!-- below: delete button -->
        <form action="/pizzas/{{ $pizza->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Complete Order</button>
        </form>
    </div>

    <a href="/pizzas" class="back"><- Back to all pizzas</a>
    @endsection

