@extends('layouts.app')
    
    @section('content')
    <div class="wrapper create-pizza">
        <h1>Create a New Pizza</h1>
        <form action="/pizzas" method="POST">
            @csrf <!-- cross-site request forgery -->
            <label for="name">Your Name: </label><!--"name" input field -->
            <input type="text" id="name" name="name"><br>
            <!-- below: options for pizza "type" -->
            <label for="type">Choose pizza type: </label>
            <select class="select" name="type" id="type">
                <option value="margherita">Margherita</option>
                <option value="margherita">Hawaiian</option>
                <option value="veg supreme">Veg Supreme</option>
                <option value="volcano">volcano</option>
            </select><br>
            <!-- below: options for pizza "base" -->
            <label for="base">Choose pizza type: </label>
            <select class="select" name="base" id="base">
                <option value="cheesy crust">Cheesy Crust</option>
                <option value="garlic crust">Garlic Crust</option>
                <option value="thin & crispy">Thin & Crispy</option>
                <option value="thick">Thick</option>   
            </select><br>
            <!-- below: extra toppings -->
            <fieldset>
                <label>Extra Toppings:</label><br>
                <input type="checkbox" name="toppings[]" value="mushrooms">Mushrooms<br>
                <input type="checkbox" name="toppings[]" value="peppers">Peppers<br>
                <input type="checkbox" name="toppings[]" value="garlic">Garlic<br>
                <input type="checkbox" name="toppings[]" value="olives">Olives<br>
            </fieldset>
            <!-- below: submit button -->
            <input type="submit" value="Order Pizza">
        </form>
    </div>



    @endsection

