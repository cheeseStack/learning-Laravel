<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { // this / takes us to the root page
    return view('welcome');
});

// Route::get('/pizzas', 'PizzaController@index');
   
// Route::get('/pizzas/{id}', 'PizzaController@show');


// https://laravel.com/docs/9.x/controllers
use App\Http\Controllers\PizzaController;
// add the Routes baseed on order of operation and precedence required


Route::get('/pizzas', [PizzaController::class, 'index'])->name('pizzas.index')->middleware('auth');

Route::get('/pizzas/create', [PizzaController::class, 'create'])->name('pizzas.create');

// set up a Route to POST the data from the /create web form:
Route::post('/pizzas', [PizzaController::class, 'store'])->name('pizzas.store');

Route::get('/pizzas/{id}', [PizzaController::class, 'show'])->name('pizzas.show')->middleware('auth'); // have this LAST so it does not interfere with other page links

//below: delete a pizza (once order has been made)
Route::delete('/pizzas/{id}', [PizzaController::class, 'destroy'])->name('pizzas.destroy')->middleware('auth');


// deleted to allow register Routes to be removed
// Auth::routes();

//to disable the register Routes:
Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
