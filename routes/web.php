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
    Route::get('dashboard', [HomeController::class, 'admin'])->name('dashboard');
    //supplier Routes List
    Route::get('supplier', [SupplierController::class, 'index'])->name('supplier');
    Route::get('supplier/create', [SupplierController::class, 'create'])->name('create');
    Route::post('supplier/create', [SupplierController::class, 'store'])->name('create');
    Route::get('supplier/edit/{id}', [SupplierController::class, 'edit'])->name('edit');
    Route::put('supplier/update/{id}', [SupplierController::class, 'update'])->name('update');
    Route::post('supplier/delete/{id}', [SupplierController::class, 'destroy'])->name('delete');
    //purchase Routes List
    Route::get('purchase', [PurchaseController::class, 'index'])->name('index');
    Route::get('purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
    Route::post('purchase/create', [PurchaseController::class, 'store'])->name('purchase.store');
    Route::get('purchase/edit/{id}', [PurchaseController::class, 'edit'])->name('purchase.edit');
    Route::put('purchase/update/{id}', [PurchaseController::class, 'update'])->name('purchase.update');
    Route::post('purchase/delete/{id}', [PurchaseController::class, 'destroy'])->name('purchase.delete');
    Route::post('purchase/show/{id}', [PurchaseController::class, 'show'])->name('purchase.show');

    //purchase Routes List
    Route::get('purchase-items/index', [PurchaseItemDetailController::class, 'index'])->name('admin.purchase-items.index');
    Route::get('purchase-items/create', [PurchaseItemDetailController::class, 'create'])->name('admin.purchase-items.create');
});

//Admin Routes List
Route::middleware(['auth', 'Useraccess:superadmin'])->group(function () {

    Route::get('/superadmin/home', [HomeController::class, 'superAdmin'])->name('superadmin.home');
});
