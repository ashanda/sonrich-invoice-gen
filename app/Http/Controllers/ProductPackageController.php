<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductPackage;
use App\Models\ProductItem;
use RealRashid\SweetAlert\Facades\Alert;

class ProductPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $productPackages = ProductPackage::all();
    return view('pages.admin.package.index', compact('productPackages'));
}

public function create()
{
    $productItems = ProductItem::all();
    return view('pages.admin.package.create', compact('productItems'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'amount' => 'required',
        'product_type' => 'required',
        'product_items' => 'nullable|array',
    ]);

    $productPackage = new ProductPackage;
    $productPackage->title = $validatedData['title'];
    $productPackage->amount = $validatedData['amount'];
    $productPackage->product_type = $validatedData['product_type'];
    $productPackage->product_items = json_encode($validatedData['product_items']);
    $productPackage->save();

    // Redirect or perform any other actions

    return redirect()->route('product_packages.index')->with('success', 'Product package created successfully.');
}

public function edit(ProductPackage $productPackage)
{
    $productItems = ProductItem::all();
    
    return view('pages.admin.package.edit', compact('productPackage', 'productItems'));
}

public function update(Request $request, ProductPackage $productPackage)
{

    $productPackage->update([
        'product_items' => $request->input('product_items'),
        'title' => $request->input('title'),
        'product_type' => $request->input('product_type'),
        'amount' => $request->input('amount'),
    ]);
    //$productPackage->productItems()->sync($request->input('product_items'));

    return redirect()->route('product_packages.index')->with('success', 'Product Package updated successfully.');
}

public function destroy(ProductPackage $productPackage)
{
    $productPackage->productItems()->detach();
    $productPackage->delete();

    return redirect()->route('product_packages.index')->with('success', 'Product Package deleted successfully.');
}
}
