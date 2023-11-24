<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\PurchaseItemDetailController;
use App\Http\Controllers\ProductConsumptionController;
use App\Http\Controllers\ComsumptionDetailController;
use App\Http\Controllers\DestroyedItemController;

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
    Route::get('purchase', [PurchaseController::class, 'index'])->name('purchase');
    Route::get('purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
    Route::post('purchase/create', [PurchaseController::class, 'store'])->name('purchase.store');
    Route::get('purchase/edit/{id}', [PurchaseController::class, 'edit'])->name('purchase.edit');
    Route::put('purchase/update/{id}', [PurchaseController::class, 'update'])->name('purchase.update');
    Route::post('purchase/delete/{id}', [PurchaseController::class, 'destroy'])->name('purchase.delete');
    Route::post('purchase/show/{id}', [PurchaseController::class, 'show'])->name('purchase.show');


    //purchase item detail Routes List
    Route::get('purchase-item', [PurchaseItemDetailController::class, 'index'])->name('purchase-item');
    Route::get('purchase-item/create', [PurchaseItemDetailController::class, 'create'])->name('purchase-item.create');
    Route::post('purchase-item/create', [PurchaseItemDetailController::class, 'store'])->name('purchase-item.store');
    Route::get('purchase-item/edit/{id}', [PurchaseItemDetailController::class, 'edit'])->name('purchase-item.edit');
    Route::put('purchase-item/update/{id}', [PurchaseItemDetailController::class, 'update'])->name('purchase-item.update');
    Route::post('purchase-item/delete/{id}', [PurchaseItemDetailController::class, 'destroy'])->name('purchase-item.delete');
    Route::post('purchase-item/show/{id}', [PurchaseItemDetailController::class, 'show'])->name('purchase-item.show');


    //Project Category Routes List
    Route::get('project-category', [ProjectCategoryController::class, 'index'])->name('project-category');
    Route::get('project-category/create', [ProjectCategoryController::class, 'create'])->name('project-category.create');
    Route::post('project-category/create', [ProjectCategoryController::class, 'store'])->name('project-category.store');
    Route::get('project-category/edit/{id}', [ProjectCategoryController::class, 'edit'])->name('project-category.edit');
    Route::put('project-category/update/{id}', [ProjectCategoryController::class, 'update'])->name('project-category.update');
    Route::post('project-category/delete/{id}', [ProjectCategoryController::class, 'destroy'])->name('project-category.delete');

    //Project Routes List
    Route::get('project', [ProjectController::class, 'index'])->name('project');
    Route::get('project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('project/create', [ProjectController::class, 'store'])->name('project.store');
    Route::get('project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('project/update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::post('project/delete/{id}', [ProjectController::class, 'destroy'])->name('project.delete');

    //product Routes List
    Route::get('product', [ProductTypeController::class, 'index'])->name('product');
    Route::get('product/create', [ProductTypeController::class, 'create'])->name('product.create');
    Route::post('product/create', [ProductTypeController::class, 'store'])->name('product.store');
    Route::get('product/edit/{id}', [ProductTypeController::class, 'edit'])->name('product.edit');
    Route::put('product/update/{id}', [ProductTypeController::class, 'update'])->name('product.update');
    Route::post('product/delete/{id}', [ProductTypeController::class, 'destroy'])->name('product.delete');

    //product consumption Routes List
    Route::get('product-consumption', [ProductConsumptionController::class, 'index'])->name('product-consumption');
    Route::get('product-consumption/create', [ProductConsumptionController::class, 'create'])->name('product-consumption.create');
    Route::post('product-consumption/create', [ProductConsumptionController::class, 'store'])->name('product-consumption.store');
    Route::get('product-consumption/edit/{id}', [ProductConsumptionController::class, 'edit'])->name('product-consumption.edit');
    Route::put('product-consumption/update/{id}', [ProductConsumptionController::class, 'update'])->name('product-consumption.update');
    Route::post('product-consumption/delete/{id}', [ProductConsumptionController::class, 'destroy'])->name('product-consumption.delete');

    //consumption detail Routes List
    Route::get('consumption-detail', [ComsumptionDetailController::class, 'index'])->name('consumption-detail');
    Route::get('consumption-detail/create', [ComsumptionDetailController::class, 'create'])->name('consumption-detail.create');
    Route::post('consumption-detail/create', [ComsumptionDetailController::class, 'store'])->name('consumption-detail.store');
    Route::get('consumption-detail/edit/{id}', [ComsumptionDetailController::class, 'edit'])->name('consumption-detail.edit');
    Route::put('consumption-detail/update/{id}', [ComsumptionDetailController::class, 'update'])->name('consumption-detail.update');
    Route::post('consumption-detail/delete/{id}', [ComsumptionDetailController::class, 'destroy'])->name('consumption-detail.delete');


     //destroyed-item Routes List
     Route::get('destroyed-item', [DestroyedItemController::class, 'index'])->name('destroyed-item');
     Route::get('destroyed-item/create', [DestroyedItemController::class, 'create'])->name('destroyed-item.create');
     Route::post('destroyed-item/create', [DestroyedItemController::class, 'store'])->name('destroyed-item.store');
     Route::get('destroyed-item/edit/{id}', [DestroyedItemController::class, 'edit'])->name('destroyed-item.edit');
     Route::put('destroyed-item/update/{id}', [DestroyedItemController::class, 'update'])->name('destroyed-item.update');
     Route::post('destroyed-item/delete/{id}', [DestroyedItemController::class, 'destroy'])->name('destroyed-item.delete');
});

//Admin Routes List
Route::middleware(['auth', 'Useraccess:superadmin'])->group(function () {

    Route::get('/superadmin/home', [HomeController::class, 'superAdmin'])->name('superadmin.home');
});
