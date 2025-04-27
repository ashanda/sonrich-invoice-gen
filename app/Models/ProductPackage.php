<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPackage extends Model
{
    use HasFactory;
    protected $fillable = ['product_items', 'quantity', 'title', 'product_type', 'amount', 'tax', 'service_charge','discount', 'deliver_fee','package_visibility'];

    public function productItems()
    {
        return $this->belongsToMany(ProductItem::class, 'product_packages');
    }
}
