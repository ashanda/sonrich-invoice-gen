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
        'quantity' => 'nullable|array',
        'tax' => 'required',
        'discount' => 'required',
        'deliver_fee' => 'required',
        'package_visibility' => 'required',
    ]);

    $productPackage = new ProductPackage;
    $productPackage->title = $validatedData['title'];
    $productPackage->amount = $validatedData['amount'];
    $productPackage->product_type = $validatedData['product_type'];
    $productPackage->product_items = json_encode($validatedData['product_items']);
    $productPackage->quantity = json_encode($validatedData['quantity']);
    $productPackage->tax = $validatedData['tax'];
    $productPackage->discount = $validatedData['discount'];
    $productPackage->deliver_fee = $validatedData['deliver_fee'];
    $productPackage->package_visibility = $validatedData['package_visibility'];
    $productPackage->save();

    // Redirect or perform any other actions

    return redirect()->route('product_packages.index')->with('success', 'Product package created successfully.');
}

public function edit(ProductPackage $productPackage)
{
    
    $productItems = ProductItem::all();
    $productqtys = ProductPackage::where('id', $productPackage->id)->first();
    return view('pages.admin.package.edit', compact('productPackage', 'productItems','productqtys'));
}

public function update(Request $request, ProductPackage $productPackage)
{

    
    $productPackage->update([
        'product_items' => $request->input('product_items'),
        'quantity' => $request->input('quantity'),
        'title' => $request->input('title'),
        'product_type' => $request->input('product_type'),
        'amount' => $request->input('amount'),
        'tax' => $request->input('tax'),
        'discount' => $request->input('discount'),
        'deliver_fee' => $request->input('deliver_fee'),
        'package_visibility' => $request->input('package_visibility'),
    ]);
    //$productPackage->productItems()->sync($request->input('product_items'));

    return redirect()->route('product_packages.index')->with('success', 'Product Package updated successfully.');
}

public function destroy($id)
{
    $productItem = ProductPackage::findOrFail($id);
    $productItem->delete();

        return redirect()->route('product_packages.index')->with('success', 'Product package deleted successfully.');
}

}
