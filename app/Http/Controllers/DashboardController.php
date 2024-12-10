<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProducts' => Product::count(),
            'totalSuppliers' => Supplier::count(),
            'totalCustomers' => Customer::count(),
            'totalOrders' => Order::count(),
        ]);
    }
}
