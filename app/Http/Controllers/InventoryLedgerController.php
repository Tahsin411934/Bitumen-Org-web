<?php

namespace App\Http\Controllers;

use App\Models\InventoryLedger;
use App\Models\OrderDetail;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all inventory ledger entries
        $inventoryLedgers = InventoryLedger::all();

        return view('inventory_ledger.index', compact('inventoryLedgers'));
    }

    public function pandingOrder(){
        $inventoryLedgers = InventoryLedger::with('customer','suppliers','products')->where('order_no', '')->get() ;
        
        return view('orders.pendingOrder', compact('inventoryLedgers'));
    }


    public function create()
    {
        return view('inventory_ledger.create');
    }

   
    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InventoryLedger $inventoryLedger)
    {
       
        // Validate the request data
        $validated = $request->validate([
            'status' => 'required|in:verified,unverified',
        ]);

        // Update the status of the inventory ledger entry
        $inventoryLedger->status = $validated['status'];
        $inventoryLedger->save();

        // If order number is provided, update inventory based on that order number
        if ($inventoryLedger->order_no) {
            // Fetch the order detail based on the order number
            $orderDetail = OrderDetail::where('order_no', $inventoryLedger->order_no)->first();
            
            if ($orderDetail) {
                // Fetch the inventory item based on itemcode from the order detail
                $inventory = Inventory::where('itemcode', $orderDetail->itemcode)->
                where('do_invoice_no', $inventoryLedger->DO_no )->first();
               
                if ($inventory) {
                    // Calculate the new sold quantity
                    $newSoldQuantity = $inventory->sold_quantity + $orderDetail->quantity;

                    // Check if the new sold quantity exceeds the available quantity
                    if ($newSoldQuantity > $inventory->quantity) {
                        return redirect()->back()->with('error', "Cannot update inventory for item {$inventory->itemcode}. Sold quantity exceeds available quantity.");
                    }

                    // Update the sold quantity in the inventory
                    $inventory->sold_quantity = $newSoldQuantity;
                    $inventory->save();
                }
            }
        }

        // Redirect back to the inventory ledger index page with a success message
        return redirect()->route('inventory-ledger.index')->with('success', 'Inventory Ledger entry updated successfully!');
    }
}
