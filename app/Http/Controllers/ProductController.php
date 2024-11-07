<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    
   public function store(Request $request)
{
    $validatedData = $request->validate([
        'products' => 'required|array',
        'products.*.itemcode' => 'required|string',
        'products.*.itemname' => 'required|string',
        'products.*.uom' => 'required|string',
    ]);

    // Set created_at and updated_at timestamps manually
    $products = array_map(function ($product) {
        return array_merge($product, [
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }, $validatedData['products']);

    Product::insert($products);

    return redirect()->back()->with('success', 'Product added successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
