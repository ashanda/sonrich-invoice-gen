<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    protected $fillable = [
        'title',
        'amount',
        // Add more fillable fields as needed
    ];
}
