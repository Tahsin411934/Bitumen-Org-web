<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ChallanController;
use App\Http\Controllers\scaleSlipController;
use App\Http\Controllers\InventoryLedgerController;



Route::get('/', function () {
    return view('auth.login');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/test', function () {
    return view('test');
});


Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('customers', CustomerController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('inventories', InventoryController::class);
Route::resource('orders', OrderController::class);
Route::get('/pendingOrder', [InventoryLedgerController::class, 'pandingOrder']);
Route::resource('inventory-ledger', InventoryLedgerController::class);

// Route::put('inventories', [InventoryController::class, 'update1'])->name('inventories.update');
Route::get('/challan/{salesOrderNo}', [ChallanController::class, 'showChallanForm'])->name('challan.create');
Route::post('/delivery', [ChallanController::class, 'store'])->name('delivery.store');
Route::get('/challanPrint/{challanno}')->name('ChallanPrint.create');
Route::get('/scaleSlip/{order_no}', [scaleSlipController::class, 'create'])->name('scaleSlip.create');
Route::post('slipscale', [scaleSlipController::class, 'store'])->name('slipscale.store');
Route::get('/scaleSlip/show/{slipno}', [scaleSlipController::class, 'show'])->name('scaleSlip.show');
Route::get('/challanCreate', [ChallanController::class, 'create']);
Route::get('/challan-order-create/{trxID}', [OrderController::class, 'challanOrderCreate']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
