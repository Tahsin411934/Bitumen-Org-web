<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    public function index()
    {
        $expensetypes = ExpenseType::all();
        return view('expensetypes.index', compact('expensetypes'));
    }

    public function create()
    {
        return view('expensetypes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'expensename' => 'required|string|max:255',
        ]);

        ExpenseType::create($request->all());
        return redirect()->route('expensetypes.index');
    }

    public function show(ExpenseType $expensetype)
    {
        return view('expensetypes.show', compact('expensetype'));
    }

    public function edit(ExpenseType $expensetype)
    {
        return view('expensetypes.edit', compact('expensetype'));
    }

    public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'expensename' => 'required|string|max:255',
    ]);

    // Find the ExpenseType model by its ID
    $expensetype = ExpenseType::findOrFail($id);

    // Update the model with validated data
    $expensetype->update([
        'expensename' => $request->input('expensename'),
    ]);

    // Redirect to the Expense Types index page
    return redirect()->route('expensetypes.index')->with('success', 'Expense Type updated successfully!');
}


    public function destroy($id)
    {
        $expensetype = ExpenseType::findOrFail($id);
        $expensetype->delete();
        return redirect()->route('expensetypes.index')->with('success', 'Expense Type updated successfully!');
    }
}
