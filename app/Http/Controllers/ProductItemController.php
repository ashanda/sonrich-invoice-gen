<?php

namespace App\Http\Controllers;

use App\Models\ProductItem;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductItemController extends Controller
{
    // Display a listing of the product items
    public function index()
    {
        $productItems = ProductItem::all();
        return view('pages.admin.product-items.index', compact('productItems'));
    }

    // Show the form for creating a new product item
    public function create()
    {
        return view('pages.admin.product-items.create');
    }

    // Store a newly created product item in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'amount' => 'required',
            // Add validation rules for other fields as needed
        ]);

        ProductItem::create($validatedData);

        return redirect()->route('product_items.index')->with('success', 'Product item created successfully.');
    }

    // Show the form for editing the specified product item
    public function edit($id)
    {
        $productItem = ProductItem::findOrFail($id);
        return view('pages.admin.product-items.edit', compact('productItem'));
    }

    // Update the specified product item in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'amount' => 'required',
            // Add validation rules for other fields as needed
        ]);

        $productItem = ProductItem::findOrFail($id);
        $productItem->update($validatedData);

        return redirect()->route('pages.admin.product-items.index')->with('success', 'Product item updated successfully.');
    }

    // Remove the specified product item from the database
    public function destroy($id)
    {
        $productItem = ProductItem::findOrFail($id);
        $productItem->delete();

        return redirect()->route('product_items.index')->with('success', 'Product item deleted successfully.');
    }
}