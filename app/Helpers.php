<?php
use App\Models\ProductItem;
use App\Models\User;
use App\Models\Invoice;
use App\Models\ProductPackage;

function ProductItemsGet($id)
{
    $products = ProductItem::where('id', $id)->first();
    return $products;
}


function staffcount(){
    $staffcount = User::whereIn('type', [0, 2, 3])->count();
    return $staffcount;
}

function totalinvoicescount(){
    $totalinvoicescount = Invoice::count();
    return $totalinvoicescount;
}

function productscount(){
    $productscount = ProductItem::count();
    return $productscount;
}
function packagesscount(){
    $packagesscount = ProductPackage::count();
    return $packagesscount;
}