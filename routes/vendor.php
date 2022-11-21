<?php

use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [VendorController::class, 'index']);
Route::get('/login', [VendorController::class, 'login'])->name('vendorlogin');
Route::post('/validate_vendor', [VendorController::class, 'validate_vendor']);
Route::get('/logout', [VendorController::class, 'logout']);

Route::group(['middleware' => 'vendor_auth'], function(){
    Route::get('/dashboard', [VendorController::class, 'dashboard']);
});
