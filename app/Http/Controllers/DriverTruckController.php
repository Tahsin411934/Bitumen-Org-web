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
                'end_date' => 'required|date|after:start_date',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors()); // Show validation error messages
        }
    
        // Check for conflicting assignments for the truck or driver
        $conflict = DriverTruck::where(function ($query) use ($request) {
            $query->where('truck_id', $request->truck_id)
                  ->orWhere('driver_id', $request->driver_id);
        })
        ->where(function ($query) use ($request) {
            $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                  ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                  ->orWhere(function ($query) use ($request) {
                      $query->where('start_date', '<=', $request->start_date)
                            ->where('end_date', '>=', $request->end_date);
                  });
        })
        ->exists();
    
        if ($conflict) {
            return redirect()->back()->with('conflict', 'This truck or driver is already assigned during the selected period.');

        }
    
        // Create a new assignment
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
    { try {
      
        $validated = $request->validate([
            'truck_id' => 'required',
            'driver_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:startdate',
        ]);

        

    } catch (\Illuminate\Validation\ValidationException $e) {
        
        dd($e->errors()); // This will show the validation error messages
    }
        

    $driverTruck = DriverTruck::findOrFail($id);

  
        $driverTruck->update($request->all());

        return redirect()->back()->with('success', 'Driver and truck assignment updated successfully!');
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
