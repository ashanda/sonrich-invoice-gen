<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPackage extends Model
{
    use HasFactory;
    protected $fillable = [
    'product_items',
    'title',
    'product_type',
    'amount'
    ];
    public function productItems()
    {
        return $this->belongsToMany(ProductItem::class, 'product_packages');
    }
}
