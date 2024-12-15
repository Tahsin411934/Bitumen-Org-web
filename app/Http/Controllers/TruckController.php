<?php

namespace App\Http\Controllers;
use App\Models\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trucks = Truck::all();
        return view('vehicle_management.truck', compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try {
      
            $validated = $request->validate([
                'reg_no' => 'required|string|max:255',
                'capacity' => 'required|numeric',
                'type' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'year' => 'required|digits:4|integer',
                'chassis_no' => 'required|string|max:255',
                'tier_count' => 'required|integer',
                'tier_size' => 'required|string|max:255',
                'mileage' => 'required|numeric',
                'fuel_type' => 'required|string|max:255',
                'status' => 'required|boolean',
                'docRenewDate' => 'required|date',
            ]);
    
          
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            dd($e->errors()); // This will show the validation error messages
        }
        

        // Create a new truck
        $truck = Truck::create([
            'reg_no' => $request->reg_no,
            'capacity' => $request->capacity,
            'type' => $request->type,
            'brand' => $request->brand,
            'year' => $request->year,
            'chassis_no' => $request->chassis_no,
            'tier_count' => $request->tier_count,
            'tier_size' => $request->tier_size,
            'mileage' => $request->mileage,
            'fuel_type' => $request->fuel_type,
            'status' => $request->status,
            'docRenewDate' => $request->docRenewDate,
        ]);

       
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Truck added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
