<?php
use App\Models\ProductItem;

function ProductItemsGet($id)
{
    $products = ProductItem::where('id', $id)->first();
    return $products;
}
