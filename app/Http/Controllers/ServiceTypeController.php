<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceTypes = ServiceType::all();
        return view('servicetypes.index', compact('serviceTypes'));
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'servicename' => 'required|string|max:255',
        ]);

        ServiceType::create($request->all());
        return back()->with('success', 'Service Type created successfully!');
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'servicename' => 'required|string|max:255',
        ]);
        $servicetype= ServiceType::findOrFail($id);
        $servicetype->update($request->all());
        return redirect()->back()->with('success', 'Service Type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $servicetype= ServiceType::findOrFail($id);
        $servicetype->delete();
        return redirect()->back()->with('success', 'Service Type deleted successfully!');
    }
}
