<?php

namespace App\Http\Controllers;

use App\Models\ChangeAlertSetting;
use Illuminate\Http\Request;

class ChangeAlertSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $changeAlertSettings = ChangeAlertSetting::all();
        return view('changealertsetting.index', compact('changeAlertSettings'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'item' => 'required|string|max:255',
            'duration' => 'required|integer',
            'uom' => 'required|string|max:50',
        ]);

        $setting = ChangeAlertSetting::create($validatedData);
        return back();
    }

   
    

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $setting = ChangeAlertSetting::find($id);
       

        $validatedData = $request->validate([
            'item' => 'string|max:255',
            'duration' => 'integer',
            'uom' => 'string|max:50',
        ]);

        $setting->update($validatedData);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $setting = ChangeAlertSetting::find($id);
        if (!$setting) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $setting->delete();
        return back();
    }
}
