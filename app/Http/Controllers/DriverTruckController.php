<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Truck;
use App\Models\DriverTruck;
use Illuminate\Http\Request;

class DriverTruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trucks = Truck::all();
        $drivers = Driver::all();
        $truck_drivers = DriverTruck::all();

        return view('DriverTruck.index', compact('trucks', 'drivers', 'truck_drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trucks = Truck::all();
        $drivers = Driver::all();

        return view('DriverTruck.create', compact('trucks', 'drivers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
      
            $validated = $request->validate([
                'truck_id' => 'required|numeric',
                'driver_id' => 'required|numeric',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:startdate',
            ]);

        
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            dd($e->errors()); // This will show the validation error messages
        }
        

        DriverTruck::create([
            'truck_id' => $request->truck_id,
            'driver_id' => $request->driver_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        

        return redirect()->route('drivertrucks.index')->with('success', 'Driver and truck assignment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $driverTruck = DriverTruck::findOrFail($id);

        return view('DriverTruck.show', compact('driverTruck'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $driverTruck = DriverTruck::findOrFail($id);
        $trucks = Truck::all();
        $drivers = Driver::all();

        return view('DriverTruck.edit', compact('driverTruck', 'trucks', 'drivers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'truck_id' => 'required|exists:trucks,truck_id',
            'driver_id' => 'required|exists:drivers,driver_id',
            'startdate' => 'required|date',
            'enddate' => 'required|date|after:startdate',
        ]);

        $driverTruck = DriverTruck::findOrFail($id);
        $driverTruck->update($request->all());

        return redirect()->route('drivertrucks.index')->with('success', 'Driver and truck assignment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $driverTruck = DriverTruck::findOrFail($id);
        $driverTruck->delete();

        return redirect()->route('drivertrucks.index')->with('success', 'Driver and truck assignment deleted successfully!');
    }
}
