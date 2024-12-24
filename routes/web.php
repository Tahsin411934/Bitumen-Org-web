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
use App\Http\Controllers\MEBscaleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\DriverTruckController;
use App\Http\Controllers\FilterUSAGEController;
use App\Http\Controllers\MobilUSAGEController;
use App\Http\Controllers\FuelUSAGEController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\WaybillController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\ChangeAlertSettingController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\ServiceHistoryController;
use App\Http\Controllers\RCController;


Route::get('/', function () {
    return view('auth.login');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


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

// scale slip
Route::get('/meb', [MEBscaleController::class, 'create'])->name('scaleSlipMEB.create');
Route::post('/meb-scale-slips', [MEBscaleController::class, 'store'])->name('meb.store');
Route::get('/meb/print/{id}', [MEBscaleController::class, 'printMebInfo'])->name('meb.print');

Route::resource('rc', RCController::class);

// vehicle management
Route::get('view_trucks', [TruckController::class, 'index']);
Route::get('view_trucks/{truck_id}', [TruckController::class, 'truckProfile']);
Route::post('/trucks/store', [TruckController::class, 'store'])->name('trucks.store');
Route::put('/trucks', [TruckController::class, 'update'])->name('trucks.update');
Route::delete('/trucks/{truck}', [TruckController::class, 'destroy'])->name('trucks.destroy');


Route::resource('drivers', DriverController::class);
Route::resource('drivertrucks', DriverTruckController::class);
Route::resource('filter-usage', FilterUSAGEController::class);
Route::resource('mobile-usage', MobilUSAGEController::class);
Route::resource('fuelusage', FuelUSAGEController::class);
Route::resource('expenditures', ExpenditureController::class);
Route::resource('waybills', WaybillController::class);
Route::resource('expensetypes', ExpenseTypeController::class);
Route::resource('alert-settings', ChangeAlertSettingController::class);
Route::resource('service-type', ServiceTypeController::class);
Route::resource('service-history', ServiceHistoryController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
