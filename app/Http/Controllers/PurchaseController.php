<?php

namespace App\Http\Controllers;
use App\Models\PurchaseMaster;
use App\Models\PurchaseDetail;
use App\Models\Inventory;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // $inventories = Inventory::all();
   
    // return view('inventory.index', compact('inventories'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('purchase.index', compact('suppliers', 'products')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $inputDate = $request->input('purchase_date'); // e.g., "2/12/24"

    // Convert to Carbon instance
    $date = Carbon::createFromFormat('d/m/y', $inputDate);

    // If you want to add the current time to the date:
    $datetime = $date->setTime(now()->hour, now()->minute, now()->second); // e.g., 2024-12-02 15:30:00

    // Validate the incoming request data
    $request->validate([
        'purchase_date' => 'required|date',
        'supplier_id' => 'required|exists:suppliers,supplied_id',
        'DO_InvoiceNo' => 'required|string',
        'remarks' => 'nullable|string',
        'items' => 'required|array',
        'items.*.itemcode' => 'required|string',
        'items.*.quantity' => 'required|numeric',
        'items.*.uom' => 'required|string',
        'items.*.price' => 'required|numeric',
        'items.*.storage_location' => 'required|string',
    ]);

    // Insert data into purchase_master table
    $purchaseMaster = PurchaseMaster::create([
        'purchase_date' => $datetime,
        'supplier_id' => $request->supplier_id,
        'DO_InvoiceNo' => $request->DO_InvoiceNo,
        'remarks' => $request->remarks,
    ]);

    // Insert data into purchase_detail and inventory tables
    foreach ($request->items as $item) {
        // Insert data into purchase_detail table
        $purchaseDetail = PurchaseDetail::create([
            'purchase_no' => $purchaseMaster->purchase_no,
            'itemcode' => $item['itemcode'],
            'quantity' => $item['quantity'],
            'uom' => $item['uom'],
            'price' => $item['price'],
            'storage_location' => $item['storage_location'],
        ]);

        // Insert data into inventory table
        Inventory::create([
            'purchase_no' => $purchaseMaster->purchase_no,
            'itemcode' => $item['itemcode'],
            'do_invoice_no' => $request->DO_InvoiceNo,  // Add DO_InvoiceNo to the inventory
            'quantity' => $item['quantity'],
            'uom' => $item['uom'],
            'price' => $item['price'],
            'location' => $item['storage_location'],
        ]);
    }

    return redirect()->back()->with('success', 'Purchase added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
