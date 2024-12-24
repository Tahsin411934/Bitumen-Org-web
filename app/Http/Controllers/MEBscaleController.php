<?php

namespace App\Http\Controllers;

use App\Models\MEBscale;
use Illuminate\Http\Request;

class MEBscaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("scaleSlip.meb");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        try {
      
            $validated = $request->validate([
                'no' => 'required|string|max:255',
                'date' => 'required|date',
                'customer_name' => 'required|string|max:255',
                'vehicle' => 'nullable|string|max:255',
                'goods' => 'required|string|max:255',
                'gross_weight_time' => 'required|date_format:H:i',
                'gross_weight_amount' => 'required|numeric',
                'gross_weight_uom' => 'required|string|max:50',
                'tare_weight_time' => 'required|date_format:H:i',
                'tare_weight_amount' => 'required|numeric',
                'tare_weight_uom' => 'required|string|max:50',
                'price' => 'nullable|numeric',
                'total_price' => 'nullable|numeric',
                'company' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'holder' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'do_no' => 'required|string|max:50',
            ]);
    
          
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            dd($e->errors()); // This will show the validation error messages
        }

        // Create a new MEB scale slip and store it in the database
        $mebScaleSlip = MEBscale::create([
            'no' => $validated['no'],
            'date_time' => $validated['date'],
            'customer_name' => $validated['customer_name'],
            'vehicle' =>$validated['vehicle'],
            'goods' => $validated['goods'],
            'gross_weight_time' => $validated['gross_weight_time'],
            'gross_weight_amount' => $validated['gross_weight_amount'],
            'gross_weight_uom' => $validated['gross_weight_uom'],
            'tare_weight_time' => $validated['tare_weight_time'],
            'tare_weight_amount' => $validated['tare_weight_amount'],
            'tare_weight_uom' => $validated['tare_weight_uom'],
            'price' => $validated['price'] ?? null,
            'total_price' => $validated['total_price'] ?? null,
            'company' => $validated['company'],
            'address' => $validated['address'],
            'holder' => $validated['holder'],
            'phone' => $validated['phone'],
            'do_no' => $validated['do_no'],
        ]);

        $meb_infos = MEBscale::where('id', $mebScaleSlip->id)->first();


     return view('scaleSlip.meb_show', compact('meb_infos'));
    }

    /**
     * Display the specified resource.
     */
    public function show(MEBscale $mEBscale)
    {
        //
    }

    public function printMebInfo($id)
{
    // Fetch the MEB scale slip by ID
    $meb_infos = MEBscale::find($id);

    // If no record found, return an error message
    if (!$meb_infos) {
        return response()->json(['message' => 'Record not found'], 404);
    }

    // Return the view with the data for printing
    return view('scaleSlip.meb_print', compact('meb_infos'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MEBscale $mEBscale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MEBscale $mEBscale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MEBscale $mEBscale)
    {
        //
    }
}
