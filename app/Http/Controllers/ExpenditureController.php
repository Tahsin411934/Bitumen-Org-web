<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Models\Truck;
use App\Models\Driver;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    // Display a listing of the expenditures
    public function index()
    {
        $expenditures = Expenditure::all();
        $expenseType = ExpenseType::all();
        $trucks = Truck::all();
        $drivers= Driver::all();
        return view('expenditures.index', compact('expenditures','trucks','drivers','expenseType'));
    }

    // Show the form for creating a new expenditure
    public function create()
    {
        // This method can return a view, but for an API, you might not need this.
    }

    // Store a newly created expenditure in storage
    public function store(Request $request)
    { 
        // Validate incoming request

        try {
      
            $validated =  $request->validate([
                'truckid' => 'required|integer',
                'expendituretype' => 'required|string',
                'description' => 'nullable|string',
                'date' => 'required|date',
                'amount' => 'required|numeric',
                'driver_id' => 'nullable|string',
                'paidto' => 'nullable|string',
            ]);
    
            
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            dd($e->errors()); // This will show the validation error messages
        }
       

        // Create and save the new expenditure record
        $expenditure = Expenditure::create($request->all());

        return back();
    }

    // Display the specified expenditure
    public function show($id)
    {
        $expenditure = Expenditure::findOrFail($id);
        return response()->json($expenditure);
    }


    // Update the specified expenditure in storage
    public function update(Request $request, $id)
    { 
        // Validate incoming request
        try {
      
            $validated =  $request->validate([
                'truckid' => 'required|integer',
                     'expendituretype' => 'required|string',
                     'description' => 'nullable|string',
                     'date' => 'required|date',
                     'amount' => 'required|numeric',
                     'driver_id' => 'nullable|string',
                     'paidto' => 'nullable|string',
             ]);
     
    
         
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            dd($e->errors()); // This will show the validation error messages
        }
       
        // Find the expenditure and update it
        $expenditure = Expenditure::findOrFail($id);
        $expenditure->update($request->all());

        return back();
    }

    // Remove the specified expenditure from storage
    public function destroy($id)
    {
        $expenditure = Expenditure::findOrFail($id);
        $expenditure->delete();

        return back();
    }
}
