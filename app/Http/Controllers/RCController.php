<?php

namespace App\Http\Controllers;

use App\Models\RC;
use Illuminate\Http\Request;

class RCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all RC records
        $records = RC::all();
        return response()->json($records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Normally used for returning a view for creating a resource
        return view('rc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  dd($request);
        try {
      
            $validated = $request->validate([
                'WeightType' => 'required|string|max:50',
                'Challan_no' => 'required|string|max:50',
                'MaterialDescription' => 'nullable|string',
                'SellerName' => 'required|string|max:100',
                'SellerAddress' => 'nullable|string',
                'Quantity' => 'required|numeric',
                'BuyerName' => 'required|string|max:100',
                'BuyerAddress' => 'nullable|string',
                'OperatorName' => 'required|string|max:100',
                'DriverName' => 'required|string|max:100',
                'TruckName' => 'required|string|max:50',
                'GrossWeightDate' => 'nullable|date',
                'GrossWeightTime' => 'nullable|date_format:H:i:s',
                'GrossWeight' => 'required|numeric',
                'TareWeightDate' => 'nullable|date',
                'TareWeightTime' => 'nullable|date_format:H:i:s',
                'TareWeight' => 'required|numeric',
                'NetWeight' => 'required|numeric',
            ]);
    
            dd($validated, );
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            dd($e->errors()); // This will show the validation error messages
        }
        // Validate and create a new RC record
       

        $rc = RC::create($validated);

        return response()->json([
            'message' => 'RC record created successfully!',
            'data' => $rc,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RC  $rC
     * @return \Illuminate\Http\Response
     */
    public function show(RC $rC)
    {
        // Return a specific RC record
        return response()->json($rC);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RC  $rC
     * @return \Illuminate\Http\Response
     */
    public function edit(RC $rC)
    {
        // Normally used for returning a view for editing a resource
        return view('rc.edit', compact('rC'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RC  $rC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RC $rC)
    {
        // Validate and update the RC record
        $validated = $request->validate([
            'WeightType' => 'required|string|max:50',
            'Challan_no' => 'required|string|max:50',
            'MaterialDescription' => 'nullable|string',
            'SellerName' => 'required|string|max:100',
            'SellerAddress' => 'nullable|string',
            'Quantity' => 'required|numeric',
            'BuyerName' => 'required|string|max:100',
            'BuyerAddress' => 'nullable|string',
            'OperatorName' => 'required|string|max:100',
            'DriverName' => 'required|string|max:100',
            'TruckName' => 'required|string|max:50',
            'GrossWeightDate' => 'nullable|date',
            'GrossWeightTime' => 'nullable|date_format:H:i:s',
            'GrossWeight' => 'required|numeric',
            'TareWeightDate' => 'nullable|date',
            'TareWeightTime' => 'nullable|date_format:H:i:s',
            'TareWeight' => 'required|numeric',
            'NetWeight' => 'required|numeric',
        ]);

        $rC->update($validated);

        return response()->json([
            'message' => 'RC record updated successfully!',
            'data' => $rC,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RC  $rC
     * @return \Illuminate\Http\Response
     */
    public function destroy(RC $rC)
    {
        // Delete the RC record
        $rC->delete();

        return response()->json([
            'message' => 'RC record deleted successfully!',
        ]);
    }
}
