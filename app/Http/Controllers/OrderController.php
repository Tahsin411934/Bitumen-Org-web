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
        $orders = Order::with('orderDetails')->get();
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

        $request->merge([
            'orderdate' => $request->input('orderdate', Carbon::now()->toDateString())
        ]);
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

        // Create order
        $order = Order::create($validated);

        // Create order details
        foreach ($request->order_details as $detail) {
            $order->orderDetails()->create($detail);
        }

        return redirect()->route('orders.create')->with('success', 'Order created successfully!');
    }

    public function show($order_no)
    {
        $order = Order::with('orderDetails')->findOrFail($order_no);
        return view('orders.show', compact('order'));
    }
}
