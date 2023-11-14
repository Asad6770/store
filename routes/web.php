<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseItemDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
//Normal Users Routes List
Route::middleware(['auth', 'Useraccess:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

//Admin Routes List
Route::middleware(['auth', 'Useraccess:admin'])->group(function () {
    //dashboard Routes List
    Route::get('admin/home', [HomeController::class, 'admin'])->name('admin.home');
    //supplier Routes List
    Route::get('supplier', [SupplierController::class, 'index'])->name('supplier');
    Route::get('supplier/create', [SupplierController::class, 'create'])->name('create');
    Route::post('supplier/create', [SupplierController::class, 'store'])->name('create');

    //purchase Routes List
    Route::get('purchase/index', [PurchaseController::class, 'index'])->name('admin.purchase.index');
    Route::get('purchase/create', [PurchaseController::class, 'create'])->name('admin.purchase.create');

    //purchase Routes List
    Route::get('purchase-items/index', [PurchaseItemDetailController::class, 'index'])->name('admin.purchase-items.index');
    Route::get('purchase-items/create', [PurchaseItemDetailController::class, 'create'])->name('admin.purchase-items.create');
});

//Admin Routes List
Route::middleware(['auth', 'Useraccess:superadmin'])->group(function () {

    Route::get('/superadmin/home', [HomeController::class, 'superAdmin'])->name('superadmin.home');
});
