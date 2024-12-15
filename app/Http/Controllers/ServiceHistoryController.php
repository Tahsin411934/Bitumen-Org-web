<?php

namespace App\Http\Controllers;

use App\Models\ServiceHistory;
use App\Models\Truck;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceHistoryController extends Controller
{
    public function index()
    {
        $serviceHistories = ServiceHistory::all();
        $trucks = Truck::all();
        $serviceTypes = ServiceType::all();
        return view('servicehistory.index', compact('serviceHistories', 'trucks', 'serviceTypes'));
    }

    public function create()
    {
        return view('servicehistory.create');
    }

    public function store(Request $request)
    { 
        try {
      
            $validated =  $request->validate([
                'truck_id' => 'required|exists:trucks,truck_id',
                'date' => 'required|date',
                'service' => 'required|string|max:255',
                'cost' => 'required|numeric|min:0',
            ]);
    
      
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            dd($e->errors()); // This will show the validation error messages
        }

        ServiceHistory::create($request->all());

        return redirect()->back()->with('success', 'Service history added successfully.');
    }

   

    public function update(Request $request, $id)
    {
       
        $request->validate([
           'truck_id' => 'required|exists:trucks,truck_id',
                'date' => 'required|date',
                'service' => 'required|string|max:255',
                'cost' => 'required|numeric|min:0',
        ]);

        $servicehistory = ServiceHistory::findOrFail($id);
        $servicehistory->update($request->all());

        return redirect()->back()->with('success', 'Service history updated successfully.');
    }

    public function destroy($id)
    {
        $servicehistory = ServiceHistory::findOrFail($id);
        $servicehistory->delete();

        return redirect()->back()->with('success', 'Service history deleted successfully.');
    }
}
