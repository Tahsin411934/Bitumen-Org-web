<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     */
    public function index()
    {
        
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new supplier.
     */
    public function create()
    {
        // Get the maximum supplied_id for generating a new unique ID for the supplier
        $maxSupplied_id = Supplier::max('supplied_id') ?? 0;
        return view('suppliers.create', compact('maxSupplied_id'));
    }

    /**
     * Store a newly created supplier in storage.
     */
    public function store(Request $request)
    {
        // Step 1: Validate the incoming request
        $validated = $request->validate([
            'supplied_id' => 'required|string|max:255|unique:suppliers', // Ensure supplied_id is unique
            'suppliername' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:suppliers', // Ensure email is unique
        ]);

        // Step 2: Create a new Supplier record
        Supplier::create([
            'supplied_id' => $validated['supplied_id'],
            'suppliername' => $validated['suppliername'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'contact_person' => $validated['contact_person'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
        ]);

        // Step 3: Redirect to the suppliers index page with a success message
        return redirect()->route('suppliers.index')
                         ->with('success', 'Supplier added successfully!');
    }

    /**
     * Display the specified supplier.
     */
    public function show(Supplier $supplier)
    {

    }

    /**
     * Show the form for editing the specified supplier.
     */
    public function edit(Supplier $supplier)
    {
        
    }

    /**
     * Update the specified supplier in storage.
     */
    public function update(Request $request, Supplier $supplier)
{
   
    // Step 1: Validate the incoming request
    try {
        $validated = $request->validate([
            
            'suppliername' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);
       
    } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors()); // Display validation errors
    }
    
    // See all incoming request data

    // Step 2: Update the supplier's data
    $supplier->update([
        'suppliername' => $validated['suppliername'],
        'address' => $validated['address'],
        'city' => $validated['city'],
        'contact_person' => $validated['contact_person'],
        'mobile' => $validated['mobile'],
        'email' => $validated['email'],
    ]);

    // Step 3: Redirect to the suppliers index page with a success message
    return redirect()->route('suppliers.index')
                     ->with('success', 'Supplier updated successfully!');
}


    /**
     * Remove the specified supplier from storage.
     */
    public function destroy(Supplier $supplier)
    {
        // Delete the supplier record
        $supplier->delete();

        // Redirect to the suppliers index page with a success message
        return redirect()->route('suppliers.index')
                         ->with('success', 'Supplier deleted successfully!');
    }
}
