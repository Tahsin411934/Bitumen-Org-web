<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all(); // Get all customers
        return view('customer.index', compact('customers')); // Pass customers to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validate the input
        
        $validated = $request->validate([
            'customername' => 'required|string|max:255',
            'customerType' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'city_district' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'contactperson' => 'nullable|string|max:100',
            'contactperson_mobile' => 'nullable|string|max:20',
        ]);

        // Create a new customer
        $customer = Customer::create($validated);

        // Redirect to customer index with a success message
        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer')); // Show details of the specific customer
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer')); // Return the edit view for the customer
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        // Validate the input
        $validated = $request->validate([
            'customername' => 'required|string|max:255',
            'customerType' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'city_district' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'contactperson' => 'nullable|string|max:100',
            'contactperson_mobile' => 'nullable|string|max:20', // Fix 'contactmobile' to 'contactperson_mobile' to match DB field
        ]);
    
        // Update the customer data
        $customer->update($validated);
    
        // Redirect to customer index with a success message
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        // Delete the customer
        $customer->delete();

        // Redirect to customer index with a success message
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
