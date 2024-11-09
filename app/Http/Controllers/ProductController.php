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
        
        $products = Product::all();
        $maxItemCode = Product::max('itemcode');
        return view('products.index', compact('products', 'maxItemCode'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $maxItemCode = Product::max('itemcode') ?? 0; 
    //     $products = Product::all(); 
    //      return view('products.create', compact('maxItemCode', 'products'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            
            'itemname' => 'required',
            'uom' => 'required',
        ]);
    
        // Now, dump the validated data
       
    
        // If validation passes, create the new product record
        Product::create($validated);
    
        // Redirect with a success message
        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }



    public function search(Request $request)
    {
       
        $query = $request->get('query'); 

        if ($query) {
           
            $products = Product::where('itemname', 'LIKE', "%$query%")
                                ->orWhere('uom', 'LIKE', "%$query%")
                                ->get();
        } else {
            $products = []; 
        }

        return response()->json($products);
    }
    
    
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $itemcode)
{
    // Find the product by itemcode
    $product = Product::where('itemcode', $itemcode)->first();

    // Validate the input
    $request->validate([
        'itemname' => 'required|string|max:255',
        'uom' => 'required|string|max:50',
    ]);

    // Update the product
    $product->update([
        'itemname' => $request->itemname,
        'uom' => $request->uom,
    ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
