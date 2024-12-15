<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Truck;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all();
        $trucks=Truck::all(); // Get all drivers
        return view('driver.index', compact('drivers','trucks')); // Pass drivers to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('driver.create'); // Return view for creating a new driver
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'license_no' => 'required|string|max:255|unique:drivers,license_no',
            'nid_no' => 'required|string|max:255|unique:drivers,nid_no',
            'contact_no' => 'required|string|max:255',
            'truck_id' => 'required', // Assuming truck_id exists in the trucks table
        ]);

        // Create a new driver
        Driver::create([
            'name' => $request->name,
            'license_no' => $request->license_no,
            'nid_no' => $request->nid_no,
            'contact_no' => $request->contact_no,
            'truck_id' => $request->truck_id,
        ]);
        
        // Redirect back with a success message
        return redirect()->route('drivers.index')->with('success', 'Driver added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $driver = Driver::findOrFail($id); // Find driver by id
        return view('driver.show', compact('driver')); // Return view to show driver details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $driver = Driver::findOrFail($id); // Find driver by id
        return view('driver.edit', compact('driver')); // Return edit view with driver data
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'license_no' => 'required|string|max:255',  // Exclude current driver's license_no
            'nid_no' => 'required|string|max:255|unique:drivers,nid_no,' . $id . ',driver_id',  // Exclude current driver's nid_no
            'contact_no' => 'required|string|max:255',
            'truck_id' => 'required|exists:trucks,truck_id',
        ]);
    
        // Find the driver by the custom primary key
        $driver = Driver::findOrFail($id);  // This will now find by driver_id instead of the default 'id'
    
        // Update the driver details
        $driver->update([
            'name' => $request->name,
            'license_no' => $request->license_no,
            'nid_no' => $request->nid_no,
            'contact_no' => $request->contact_no,
            'truck_id' => $request->truck_id,
        ]);
    
        // Redirect back with a success message
        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully!');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the driver by id
        $driver = Driver::findOrFail($id);

        // Delete the driver
        $driver->delete();

        // Redirect back with a success message
        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully!');
    }
}
