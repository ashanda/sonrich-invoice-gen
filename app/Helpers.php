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

function product_items($id){
    $products = ProductPackage::where('id', $id)->first();
    $productItems = [];
    
    $packageItems = json_decode($products->product_items, true);
    $quantities = json_decode($products->quantity, true);
    
    $packageDeliveryFee = $products->deliver_fee;
    $packageTax = $products->tax;
    $packageDiscount = $products->discount;
    foreach ($packageItems as $index => $packageItemId) {
        $productItem = ProductItem::find($packageItemId);
        if ($productItem) {
            $productItem->quantity = $quantities[$index] ?? 0;
            $productItem->package_tax = $packageTax;
            $productItem->package_discount = $packageDiscount;
            $productItem->package_delivery_fee = $packageDeliveryFee;
            $productItems[] = $productItem;
        }
    }
    
    return $productItems;
}

function product_packags($id){
    $products = ProductPackage::where('id', $id)->first();
}


function updateAllMainProductPackages()
{
    $invoices = Invoice::all(); // get all invoices

    foreach ($invoices as $invoice) {
        $currentValue = $invoice->main_product_package;

        if ($currentValue && !is_array(json_decode($currentValue, true))) {
            // Wrap the current value into an array
            $invoice->main_product_package = json_encode([(string) $currentValue]);
            $invoice->save();
        }
    }

    return true;
}