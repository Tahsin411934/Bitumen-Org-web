<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Truck;
use App\Models\Supplier;
use App\Models\Driver;
use App\Models\DeliveryMaster;
use App\Models\DeliveryDetail;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Customer;
use App\Models\InventoryLedger;
use Validator;
use Carbon\Carbon;
class ChallanController extends Controller
{

    public function create() {
        $suppliers = Supplier::all();
        $products = Product::all();
        $customers = Customer::all();
        $trucks = Truck::all();
        $drivers = Driver::all();
        return view('challan.create', compact( 'suppliers', 'products', 'customers', 'trucks', 'drivers'));
    }


    public function showChallanForm($salesOrderNo)
    {
        
        // Fetch the Sales Order with related inventory for the given order number
        $salesOrder = Order::with('orderDetails.inventory.product')  // Eager load orderDetails, inventory, and product data
        ->where('order_no', $salesOrderNo)
        ->first();

        // Fetch trucks and drivers
        $trucks = Truck::all();
        $drivers = Driver::all();
        $suppliers = Supplier::all();
    
        // Pass the data to the view
        return view('challan.form', compact('salesOrder', 'trucks', 'drivers', 'suppliers'));
    }

    public function store(Request $request)
    {
        $inputDate = $request->input('datetime'); // e.g., "2/12/24"

        // Convert to Carbon instance
        
         if ($inputDate) {
            $date = Carbon::createFromFormat('d/m/y', $inputDate);
            $datetime = $date->setTime(now()->hour, now()->minute, now()->second);
        } else {
            $datetime=null;
        }
        
    
        $validator = Validator::make($request->all(), [
            'datetime' => 'required|date',
            'orderno' => 'nullable|string',
            'client_name' => 'nullable|string',
            'address' => 'nullable|string',
            'Lock_number' => 'nullable|string',
            'Truck' => 'required|string',
            'stock_source' => 'required|string',
            'driver' => 'required|string',
            'License' => 'required|string',
            'itemcode' => 'required|array',
           'gross_weight.*' => 'required|numeric|regex:/^\d+(\.\d{1,3})?$/',
'empty_weight.*' => 'nullable|numeric|regex:/^\d+(\.\d{1,10})?$/',
'net_weight.*' => 'nullable|numeric|regex:/^\d+(\.\d{1,10})?$/',
        ]);
        
     
       
        // Insert into delivery master table
        $deliveryMaster = DeliveryMaster::create([
            'datetime' => $datetime,
            'orderno' => $request->orderno,
            'client_name' => $request->client_name,
            'address' => $request->address,
            'Lock_number' => $request->Lock_number,
            'truck_no' => $request->Truck,
            'stock_source' => $request->stock_source,
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
                'itemcode' => $itemcode,
                'gross_weight' => $grossWeight,
                'empty_weight' => $emptyWeight,
                'net_weight' => $netWeight,
            ]);

            // Fetch the order details to get quantity information
        
       
 if($request->orderno){

    $orderDetail = OrderDetail::where('order_no', $request->orderno)->first();
    $inventory = Inventory::where(function ($query) use ($itemcode, $orderDetail) {
        $query->where('itemcode', $itemcode)
              ->whereRaw('quantity - sold_quantity > ?', [$orderDetail->quantity]);
    })
    ->orderBy('created_at', 'asc')
    ->first();




  
    $inventoryLedger = InventoryLedger::create([
        'date' => $datetime,
        'itemcode' => $itemcode,
        'DO_no' => $inventory->do_invoice_no,
        'quantity' => $orderDetail->quantity,
        'uom' => $orderDetail->uom,
        'challan_no' => $deliveryMaster->challanno,
        'order_no' => $request->orderno,
        'status' => 'unverified',
    ]);

} else{
   
    $inventory = Inventory::where('itemcode', $itemcode)
              ->whereRaw('quantity - sold_quantity > ?', $request->net_weight[$index])
  
    ->orderBy('created_at', 'asc')
    ->first();



    $inventoryLedger = InventoryLedger::create([
        'date' => $datetime,
        'itemcode' => $itemcode,
        'DO_no' => $inventory->do_invoice_no,
        'quantity' => $request->net_weight[$index],
        'uom' => $request->uom[$index],
        'challan_no' => $deliveryMaster->challanno,
        'order_no' => '',
        'status' => 'unverified',
        'customer_id' => $request->customerID,
        'supplied_id' => $request->stock_source,
    ]);

}
       
       

    
        }
        

        // Fetch the related delivery details and order data
        $challanMemo = DeliveryMaster::with('deliveryDetails.product','truck')->where('challanno', $deliveryMaster->challanno)->first();
  
        $order = Order::with('customer')->where('order_no', $request->orderno)->first();
        $Ledger = InventoryLedger::with('customer')-> where('challan_no', $deliveryMaster->challanno)->first();
// dd($Ledger);
        // Return the receipt view with the fetched data
        return view('challan.receipt', compact('challanMemo', 'order', 'Ledger'))
            ->with('success', 'Challan created successfully');
    }
}