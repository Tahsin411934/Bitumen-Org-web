<?php

namespace App\Http\Controllers;

use App\Models\Waybill;
use App\Models\Truck;
use Illuminate\Http\Request;

class WaybillController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $waybills = Waybill::all();
        $trucks = Truck::all();
        return view('waybills.index', compact('waybills', 'trucks'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('waybills.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'truckid' => 'required|integer',
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'aproximatedistance' => 'required|numeric',
        ]);

        Waybill::create($request->all());

        return redirect()->route('waybills.index')->with('success', 'Waybill created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $waybill = Waybill::findOrFail($id);
        return view('waybills.show', compact('waybill'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $waybill = Waybill::findOrFail($id);
        return view('waybills.edit', compact('waybill'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'truckid' => 'required|integer',
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'aproximatedistance' => 'required|numeric',
        ]);

        $waybill = Waybill::findOrFail($id);
        $waybill->update($request->all());

        return redirect()->route('waybills.index')->with('success', 'Waybill updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $waybill = Waybill::findOrFail($id);
        $waybill->delete();

        return redirect()->route('waybills.index')->with('success', 'Waybill deleted successfully.');
    }
}
