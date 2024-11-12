<?php

namespace App\Http\Controllers;
use App\Models\Slipscale;
use App\Models\Customer;
use App\Models\Truck;
use Illuminate\Http\Request;

class scaleSlipController extends Controller
{
    public function create($order_no){
        $customers = Customer::all();
        $trucks = Truck::all();
        return view('scaleSlip.scaleSlip', compact('order_no', 'customers', 'trucks'));
        // return view('scaleSlip.scaleSlip', []);
    }

    public function store(Request $request)
    {
        $request->validate([
            'orderno' => 'required',
            'plant' => 'required',
            'ticketno' => 'required',
            'first_weight_date' => 'required|date',
            'first_weight_time' => 'required',
            'first_weight_ref' => 'required',
            'second_weight_date' => 'required|date',
            'second_weight_time' => 'required',
            'second_weight_ref' => 'required',
            'duration_on_site' => 'required',
            'operator' => 'required',
            'vehicle_regi' => 'required',
            'customer' => 'required',
        ]);
    
        // Create a new SlipScale record with direct field insertion
        $scaleSlip = Slipscale::create([
            'orderno' => $request->orderno,
            'plant' => $request->plant,
            'ticketno' => $request->ticketno,
            'first_weight_date' => $request->first_weight_date,
            'first_weight_time' => $request->first_weight_time,
            'first_weight_ref' => $request->first_weight_ref,
            'second_weight_date' => $request->second_weight_date,
            'second_weight_time' => $request->second_weight_time,
            'second_weight_ref' => $request->second_weight_ref,
            'duration_on_site' => $request->duration_on_site,
            'operator' => $request->operator,
            'vehicle_regi' => $request->vehicle_regi,
            'customer' => $request->customer,
        ]);
    
        // Optional: For debugging, remove or replace with a proper response.
        if ($scaleSlip) {
            return redirect()->route('scaleSlip.show', $scaleSlip->slipno)
                ->with('success', 'SlipScale created successfully');
        }
        // return redirect()->route('scaleSlip.show', $scaleSlip->slipno)
        // ->with('success', 'SlipScale created successfully');
    }

    public function show($slipno)
{
   
   
    $scaleSlip = Slipscale::where('slipno', $slipno)->firstOrFail();

    return view('scaleSlip.show', compact('scaleSlip'));
}

    
}
