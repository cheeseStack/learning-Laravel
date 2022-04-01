<?php

namespace App\Http\Controllers;
use App\Models\Pizza; // model added for Pizza records

use Illuminate\Http\Request;

class PizzaController extends Controller
{

  public function index() {
    // get data from a database
  
    // get all pizzas
    // $pizzas = Pizza::all(); // get all the ddiefferent records in the table

    // order pizzas by name
    // $pizzas = Pizza::orderBy('name', 'asc')->get(); // order by name

    // Get spefcific pizzas
    // $pizzas = Pizza::where('type', 'hawaiian')->get();

    // get pizzas by latest / newest:
    $pizzas = Pizza::latest()->get();

    return view('pizzas.index', [
      'pizzas' => $pizzas,
    ]);
  }

  public function show($id) {
    // use the $id variable to query the db for a record
    $pizza = Pizza::findOrFail($id);
    return view('pizzas.show', ['pizza' => $pizza]);
  }

  public function create() {
    return view('pizzas.create');
  }

  public function store() {
    request('name');// this gets the name inputted in the form
    // continue here: https://netninja.dev/courses/make-a-website-with-laravel-6/lectures/31316651
    $pizza = new Pizza(); // Pizza.php contains the Pizza model, which collects the databse data of pizzas

    $pizza->name = request('name');
    $pizza->type = request('type');
    $pizza->base = request('base');
    $pizza->toppings = request('toppings');

    // error_log($pizza);//to log to the terminal:

    $pizza->save(); // save to the db using the save() function

    return redirect('/')->with('mssg', 'Thanks for your order'); // this goes to the home screen
  }

  public function destroy($id){
    $pizza = Pizza::findOrFail($id);
    $pizza->delete();

    return redirect('/pizzas');
  }
}