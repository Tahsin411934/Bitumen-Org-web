<?php

namespace App\Http\Controllers;

use App\Models\fuelUSAGE;
use App\Models\Truck;
use App\Models\Driver;
use Illuminate\Http\Request;

class FuelUSAGEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all fuel usage records
        $fuelUsages = fuelUSAGE::all();
        $trucks = Truck::all();
        $drivers = Driver::all();
        // Return the view with the fuel usage data
        return view('fuelusage.index', compact('fuelUsages','trucks', 'drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new fuel usage record
        return view('fuelusage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validate the incoming data

        try {
      
            $validated = $request->validate([
                'truckid' => 'required',
                'date' => 'required|date',
                'quantity' => 'required|numeric',
                'fillingstation' => 'required',
                'driver' => 'required',
                'meterREADING' => 'required|numeric',
            ]);
    
            
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            dd($e->errors()); // This will show the validation error messages
        }
       

        // Create a new fuel usage record with the validated data
        fuelUSAGE::create($validated);

        // Redirect to the index page with a success message
        return redirect()->route('fuelusage.index')->with('success', 'Fuel usage created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(fuelUSAGE $id)
    {
        // Show the specific fuel usage record
        return view('fuelusage.show', compact('fuelUSAGE'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fuelUSAGE $fuelUSAGE)
    {
        // Return the edit view with the fuel usage data
        return view('fuelusage.edit', compact('fuelUSAGE'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
        // Validate the incoming data
        try {
            $validated = $request->validate([
                'truckid' => 'required',
                'date' => 'required|date',
                'quantity' => 'required|numeric',
                'fillingstation' => 'required',
                'driver' => 'required',
                'meterREADING' => 'required|numeric',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors()); // This will show the validation error messages
        }
    
        // Find the fuel usage record by ID
        $fuelUsage = FuelUsage::findOrFail($id); 
    
        // Update the record with the validated data
        $fuelUsage->update($validated);
    
        // Redirect to the index page with a success message
        return redirect()->route('fuelusage.index')->with('success', 'Fuel usage updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fuelUsage = FuelUsage::findOrFail($id); 
        $fuelUsage->delete();

        // Redirect to the index page with a success message
        return redirect()->route('fuelusage.index')->with('success', 'Fuel usage deleted successfully!');
    }
}