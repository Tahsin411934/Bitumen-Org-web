<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // This method would display all suppliers, but for now, it's not used.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $maxSupplied_id = Supplier::max('supplied_id') ?? 0;
        $supplier = Supplier::all(); // Fetch all suppliers, if needed for the form.
        return view('suppliers.create', compact('maxSupplied_id', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
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
        $supplier = Supplier::create([
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
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        // This method will display the details of a specific supplier
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        // This method will show the form to edit a specific supplier
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        // This method will update a specific supplier
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        // This method will delete a specific supplier
    }
}
