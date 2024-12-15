<?php

namespace App\Http\Controllers;

use App\Models\MobilUSAGE;
use App\Models\Truck;
use Illuminate\Http\Request;

class MobilUSAGEController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all resources
        $filters = MobilUSAGE::all(); 
        $trucks = Truck::all();
        return view('mobile-usage.index', compact('filters', 'trucks')); // Replace with the actual view path
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show a form to create a new resource
        return view('mobile-usage.create'); // Replace with the actual view path
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validate and store the new resource
        $validated = $request->validate([
             // Add your validation rules
            'truckID' => 'required',
            'changedate' => 'required|date',
        ]);

        MobilUSAGE::create($validated);

        return redirect()->route('mobile-usage.index')->with('success', 'Filter usage created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MobileUsage $mobile_usage)
    {
        // Display a specific resource
        return view('mobile-usage.show', compact('filterUsage')); // Replace with the actual view path
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MobileUsage $mobile_usage)
    {
        // Show a form to edit the resource
        return view('mobile-usage.edit', compact('filterUsage')); // Replace with the actual view path
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {  
        // Validate the incoming request data
        $validated = $request->validate([
            'truckID' => 'required',
            'changedate' => 'required|date',
        ]);
    
        // Find the record by ID and handle if not found
        $filterUsage = MobilUSAGE::findOrFail($id); // Corrected: Use $id instead of 'id'
    
        // Update the record with validated data
        $filterUsage->update($validated);
    
        // Redirect back with a success message
        return back()->with('success', 'Filter usage updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $filterUsage = MobilUSAGE::findOrFail($id);
        $filterUsage->delete();

        return back()->with('success', 'Filter deleted successfully!');
    }
}
