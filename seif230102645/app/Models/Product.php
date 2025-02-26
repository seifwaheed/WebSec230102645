<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Mass assignable attributes
    protected $fillable = [
        'code',
        'name',
        'model',
        'photo',
        'description',
        'price',
    ];
}