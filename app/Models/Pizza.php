<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model 
// this automatically connects to the pizzas table as it pluralises its name: Pizza(s)
{
    use HasFactory;
    
protected $casts = [
    'toppings' => 'array'
];

}
