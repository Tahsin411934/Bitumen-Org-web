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
        
        // Fetch the Sales Order with related inventory for the given order number
        $salesOrder = Order::with('orderDetails.inventory.product')  // Eager load orderDetails, inventory, and product data
        ->where('order_no', $salesOrderNo)
        ->first();

        // Fetch trucks and drivers
        $trucks = Truck::all();
        $drivers = Driver::all();

        // Pass the data to the view
        return view('challan.form', compact('salesOrder', 'trucks', 'drivers'));
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

        // Insert delivery details for each item
        foreach ($request->itemcode as $index => $itemcode) {
            $grossWeight = $request->gross_weight[$index];
            $emptyWeight = $request->empty_weight[$index];
            $netWeight = $grossWeight - $emptyWeight;
        
            DeliveryDetail::create([
                'challanno' => $deliveryMaster->challanno,
                'purchase_no' => $itemcode,
                'gross_weight' => $grossWeight,
                'empty_weight' => $emptyWeight,
                'net_weight' => $netWeight,
            ]);

            // Fetch the order details to get quantity information
        $orderDetail = OrderDetail::where('order_no', $request->orderno)
        
        ->first();

    if ($orderDetail) {
       
        // Update Inventory table's sold quantity by `purchase_no`
        $inventory = Inventory::where('id', $itemcode)->first();
      

        if ($inventory) {
            // Check if sold quantity exceeds available quantity
            $newSoldQuantity = $inventory->sold_quantity + $orderDetail->quantity;
           
            if ($newSoldQuantity > $inventory->quantity) {
                return redirect()->back()->with('error', "Cannot update inventory for itemcode $itemcode. Sold quantity exceeds available quantity.");
            }

            $inventory->sold_quantity = $newSoldQuantity;
            $inventory->save();
        }



        // if ($inventory) {
        //     $inventory->sold_quantity += $orderDetail->quantity;
        //     $inventory->save();
        // }
    }
        }
        

        // Fetch the related delivery details and order data
        $challanMemo = DeliveryMaster::with('deliveryDetails.inventory.product')->where('challanno', $deliveryMaster->challanno)->first();
  
        $order = Order::with('customer')->where('order_no', $request->orderno)->first();

        // Return the receipt view with the fetched data
        return view('challan.receipt', compact('challanMemo', 'order'))
            ->with('success', 'Challan created successfully');
    }
}
