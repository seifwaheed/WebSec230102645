<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model  {

	protected $fillable = [
        'code',
        'name',
        'price',
        'stock',
        'model',
        'description',
        'photo'
    ];

    public function hasStock($quantity)
    {
        return $this->stock >= $quantity;
    }
}