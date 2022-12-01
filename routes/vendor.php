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
Route::get('/logout', [VendorController::class, 'logout']);
Route::post('/validate_vendor', [VendorController::class, 'validate_vendor']);
Route::get('/login', [VendorController::class, 'login'])->name('vendorlogin');

Route::group(['middleware' => 'vendor_auth'], function(){

    // Dashboard
    Route::get('/dashboard', [VendorController::class, 'dashboard'])->name('dashboard');

    // Client Section
    Route::get('/allClients', [VendorController::class, 'allClients']);
    Route::post('/add_client', [VendorController::class, 'add_client']);
    Route::post('/edit_client', [VendorController::class, 'edit_client']);

    // Invoice Section
    Route::get('/allInvoice', [VendorController::class, 'allInvoice']);
    Route::get('/addInvoice', [VendorController::class, 'addInvoice']);
    Route::get('/editInvoice/{id}', [VendorController::class, 'editInvoice']);
    Route::post('/add_invoice', [VendorController::class, 'add_invoice']);
    Route::get('/invoicePreview/{id}', [VendorController::class, 'invoicePreview']);
    Route::get('/invoiceDownload/{id}', [VendorController::class, 'downloadPdf']);

    // Template Creation
    Route::get('/createTemplate', [VendorController::class, 'createTemplate']);

    // Profile Section
    Route::get('/profile', [VendorController::class, 'profile']);
    Route::get('/editProfile', [VendorController::class, 'editProfile']);

    // Support Section
    Route::get('/support', [VendorController::class, 'support']);
    Route::get('/addSupport', [VendorController::class, 'addSupport']);

});
