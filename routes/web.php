<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');
});

//Admin Routes List
Route::middleware(['auth', 'Useraccess:superadmin'])->group(function () {

    Route::get('/superadmin/home', [HomeController::class, 'superAdmin'])->name('superadmin.home');
});

