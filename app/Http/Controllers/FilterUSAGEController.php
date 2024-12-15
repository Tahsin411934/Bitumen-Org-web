<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilterUsage; // Replace with the appropriate model name
use App\Models\Truck; // Replace with the appropriate model name

class FilterUSAGEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all resources
        $filters = FilterUsage::all(); 
        $trucks = Truck::all();
        return view('filter-usage.index', compact('filters', 'trucks')); // Replace with the actual view path
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show a form to create a new resource
        return view('filter-usage.create'); // Replace with the actual view path
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

        FilterUsage::create($validated);

        return redirect()->route('filter-usage.index')->with('success', 'Filter usage created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FilterUsage $filterUsage)
    {
        // Display a specific resource
        return view('filter-usage.show', compact('filterUsage')); // Replace with the actual view path
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FilterUsage $filterUsage)
    {
        // Show a form to edit the resource
        return view('filter-usage.edit', compact('filterUsage')); // Replace with the actual view path
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FilterUsage $filterUsage)
    {
        // Validate and update the resource
        $validated = $request->validate([
            'field_name' => 'required', // Add your validation rules
            // Add other fields as needed
        ]);

        $filterUsage->update($validated);

        return redirect()->route('filter-usage.index')->with('success', 'Filter usage updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FilterUsage $filterUsage)
    {
        // Delete the resource
        $filterUsage->delete();

        return redirect()->route('filter-usage.index')->with('success', 'Filter usage deleted successfully!');
    }
}
