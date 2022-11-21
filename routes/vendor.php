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
Route::get('/logout', [VendorController::class, 'logout']);
Route::post('/validate_vendor', [VendorController::class, 'validate_vendor']);

Route::group(['middleware' => 'vendor_auth'], function(){

    // Dashboard
    Route::get('/dashboard', [VendorController::class, 'dashboard']);
    
    // Invoice Section
    Route::get('/allInvoice', [VendorController::class, 'allInvoice']);
    Route::get('/addInvoice', [VendorController::class, 'addInvoice']);
    Route::get('/editInvoice', [VendorController::class, 'editInvoice']);
    
    // Profile Section
    Route::get('/profile', [VendorController::class, 'profile']);
    Route::get('/editProfile', [VendorController::class, 'editProfile']);
    
    // Support Section
    Route::get('/support', [VendorController::class, 'support']);
    Route::get('/addSupport', [VendorController::class, 'addSupport']);

});
