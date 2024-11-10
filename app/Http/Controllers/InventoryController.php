<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the inventories.
     */
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventory.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new inventory item.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created inventory item in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'purchase_no' => 'required|string|max:50',
            'itemcode' => 'required|string|max:50',
            'do_invoice_no' => 'required|string|max:50',
            'quantity' => 'required|integer',
            'uom' => 'required|string|max:10',
            'price' => 'required|numeric',
            'location' => 'required|string|max:100',
            'status' => 'required|string|max:20',
        ]);

        Inventory::create($request->all());

        return redirect()->route('inventories.index')
                         ->with('success', 'Inventory item added successfully.');
    }

    /**
     * Display the specified inventory item.
     */
    public function show(Inventory $inventory)
    {
        return view('inventory.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified inventory item.
     */
    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', compact('inventory'));
    }

    /**
     * Update the specified inventory item in storage.
     */
   public function update(Request $request, $id)
{
   
    $inventory = Inventory::where('id', $id)->firstOrFail();

    // Validate and update the status field or other fields as needed
    $inventory->update([
        'status' => $request->status,
    ]);

    // Return response with success message
    return redirect()->route('inventories.index')->with('success', 'Inventory updated successfully!');
}


    /**
     * Remove the specified inventory item from storage.
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventories.index')
                         ->with('success', 'Inventory item deleted successfully.');
    }
}
