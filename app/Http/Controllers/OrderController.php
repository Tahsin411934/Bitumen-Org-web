<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['orderDetails.product', 'customer'])->get(); 
        return view('orders.index', compact('orders'));
    }
    

    public function create()
    {
        $customers = Customer::all();  // Get all customers
        $products = Product::all();  // Get all products
        return view('orders.create', compact('customers', 'products'));  // Fixed compact function
    }
    

    public function store(Request $request)
    {
       
        // Set default order date if not provided
        $request->merge([
            'orderdate' => $request->input('orderdate', Carbon::now()->toDateString())
        ]);
    
        // Validate the incoming data
        $validated = $request->validate([
            'orderdate' => 'required|date',
            'customerid' => 'required|exists:customers,customerID',
            'deliverylocation' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
            'order_details' => 'required|array',
            'order_details.*.itemcode' => 'required|string|max:255',
            'order_details.*.quantity' => 'required|integer',
            'order_details.*.price' => 'required|numeric',
        ]);
    
        // Create the order
        $order = Order::create($validated);
    
        // Create related order details
        foreach ($request->order_details as $detail) {
            $order->orderDetails()->create($detail);
        }
    
        // Check which button was clicked
        if ($request->has('save_and_print')) {
            return redirect()->route('orders.create')
            ->with('success', 'Order created successfully!')
            ->with('order_no', $order->order_no);
        } elseif ($request->has('save_and_challan')) {
            return redirect()->route('challan.create', ['salesOrderNo' => $order->order_no])
    ->with('success', 'Order created and Challan generated.');

        }
    
        return back()->with('error', 'An error occurred while creating the order.');
    }
    

    public function show($order_no)
    {
        $order = Order::with('orderDetails')->findOrFail($order_no);
        return view('orders.show', compact('order'));
    }
}
