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
    public function update(Request $request)
    {  
        // Validate the incoming request data
        try {
          
            $validated =  $request->validate([
                'truck_id' => 'required|numeric',
                'reg_no' => 'nullable|string|max:255',
                'capacity' => 'nullable|numeric',
                'type' => 'nullable|string|max:255',
                'brand' => 'nullable|string|max:255',
                'year' => 'nullable|numeric|min:1900|max:' . date('Y'),
                'chassis_no' => 'nullable|string|max:255',
                'tier_count' => 'nullable|numeric',
                'tier_size' => 'nullable|string|max:255',
                'mileage' => 'nullable|numeric',
                'fuel_type' => 'nullable|string|max:255',
                'status' => 'nullable|in:0,1',
                'docRenewDate' => 'nullable|date',
            ]);
    
           
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            dd($e->errors()); // This will show the validation error messages
        }
       
    
        // Find the truck by ID
        $truck = Truck::findOrFail($request->truck_id);
   
        // Update the truck details
        $truck->update([
            'truck_id' => $request->input('truck_id'),
            'reg_no' => $request->input('reg_no'),
            'capacity' => $request->input('capacity'),
            'type' => $request->input('type'),
            'brand' => $request->input('brand'),
            'year' => $request->input('year'),
            'chassis_no' => $request->input('chassis_no'),
            'tier_count' => $request->input('tier_count'),
            'tier_size' => $request->input('tier_size'),
            'mileage' => $request->input('mileage'),
            'fuel_type' => $request->input('fuel_type'),
            'status' => $request->input('status'),
            'docRenewDate' => $request->input('docRenewDate'),
        ]);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Truck details updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Find the truck by its ID or throw a 404 error if not found
    $truck = Truck::findOrFail($id);

    // Delete the truck record
    $truck->delete();

    // Redirect to the trucks index page with a success message
    return redirect()->back()->with('success', 'Truck deleted successfully.');
}

}
