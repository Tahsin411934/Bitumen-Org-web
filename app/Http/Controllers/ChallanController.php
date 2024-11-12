<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Truck;
use App\Models\Driver;
use App\Models\DeliveryMaster;
use App\Models\DeliveryDetail;
use App\Models\Inventory;
use Validator;

class ChallanController extends Controller
{
   public function showChallanForm($salesOrderNo)
{
    // Fetch the Sales Order based on the order number
    $salesOrder = Order::with('customer', 'orderDetails')->where('order_no', $salesOrderNo)->first();

    $orderDetails = $salesOrder->orderDetails;
    // This will show an array of itemcodes

    // Fetch Inventory data based on the itemcode of the order details
    $inventoryData = [];
    foreach ($orderDetails as $orderDetail) {
        $inventory = Inventory::where('itemcode', $orderDetail->itemcode)->first();
        if ($inventory) {
            $inventoryData[] = $inventory;
        }
    }
   

    // Fetch Inventory data based on the itemcode of the order details
    $inventoryData = [];
    foreach ($orderDetails as $orderDetail) {
        $inventory = Inventory::where('itemcode',)->first();
        if ($inventory) {
            $inventoryData[] = $inventory;
        }
    }

    // Fetch all trucks and drivers
    $trucks = Truck::all();
    $drivers = Driver::all();

    // Pass the data to the view
    return view('challan.form', compact('salesOrder', 'orderDetails', 'inventoryData', 'trucks', 'drivers'));
}


    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'datetime' => 'required|date',
            'orderno' => 'required|string',
            'client_name' => 'nullable|string',
            'address' => 'nullable|string',
            'Truck' => 'required|string',
            'driver' => 'required|string',
            'License' => 'required|string',
            'delivery_details' => 'required|array',
            'gross_weight.*' => 'numeric',
            'empty_weight.*' => 'numeric',
            'net_weight.*' => 'numeric',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Insert into delivery master table
        $deliveryMaster = DeliveryMaster::create([
            'datetime' => $request->datetime,
            'orderno' => $request->orderno,
            'client_name' => $request->client_name,
            'address' => $request->address,
            'truck_no' => $request->Truck,
            'driver' => $request->driver,
            'license' => $request->License,
        ]);
    
        // Insert each delivery detail record and calculate the total quantity for each item
        $itemQuantities = [];
    
        foreach ($request->delivery_details as $index => $deliveryDetail) {
            $grossWeight = $request->gross_weight[$index];
            $emptyWeight = $request->empty_weight[$index];
            $netWeight = $grossWeight - $emptyWeight;
    
            DeliveryDetail::create([
                'challanno' => $deliveryMaster->challanno,
                'itemcode' => $deliveryDetail['itemcode'],
                'gross_weight' => $grossWeight,
                'empty_weight' => $emptyWeight,
                'net_weight' => $netWeight,
            ]);
    
        }
    
        // Update the sold_quantity for each item in the inventory
        
    
        // Fetch the related delivery details using the defined relationship
        $challanMemo = DeliveryMaster::with('deliveryDetails')->where('challanno', $deliveryMaster->challanno)->first();
        $order = Order::with('customer')->where('order_no', $request->orderno)->first();
    
        // Return the view with the fetched data directly
        return view('challan.receipt', compact('challanMemo', 'order'))
            ->with('success', 'Challan created successfully');
    }
    

    


    
    
}
