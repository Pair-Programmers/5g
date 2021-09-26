<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\ProductCategoryController; 
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleOrderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', [DashboardController::class, 'index']);


//product
Route::post('/product_store', [ProductController::class, 'store'])->name('product_store');
Route::get('/product_create_page', [ProductController::class, 'create'])->name('product_create_page');
Route::get('/product_list', [ProductController::class, 'index'])->name('product_list_page');
//product category
Route::get('/product_category_page', [ProductCategoryController::class, 'create'])->name('product_category_page');
Route::post('/product_category_store', [ProductCategoryController::class, 'storeCategory'])->name('product_category_store');
Route::get('/product_category_destroy/{id}', [ProductCategoryController::class, 'destroyCategory'])->name('product_category_destroy');
Route::post('/product_sub_category_store', [ProductCategoryController::class, 'storeSubCategory'])->name('product_sub_category_store');
Route::get('/product_sub_category_destroy/{id}', [ProductCategoryController::class, 'destroySubCategory'])->name('product_sub_category_destroy');
//vendor
Route::get('/display_vendor_create', [VendorController::class, 'create'])->name('vendor_create_page');
Route::get('/display_vendor_edit/{id}', [VendorController::class, 'edit'])->name('vendor_edit_page');
Route::get('/display_vendor_list', [VendorController::class, 'index'])->name('vendor_list_page');
Route::post('/save_vendor', [VendorController::class, 'store'])->name('vendor_store');
Route::get('/delete_vendor/{id}', [VendorController::class, 'destroy'])->name('vendor_destroy');
Route::post('/update_vendor', [VendorController::class, 'update'])->name('vendor_update');
//customer
Route::get('/display_customer_create', [CustomerController::class, 'create'])->name('customer_create_page');
Route::get('/display_customer_edit/{id}', [CustomerController::class, 'edit'])->name('customer_edit_page');
Route::get('/display_customer_list', [CustomerController::class, 'index'])->name('customer_list_page');
Route::post('/save_customer', [CustomerController::class, 'store'])->name('customer_store');
Route::get('/delete_customer/{id}', [CustomerController::class, 'destroy'])->name('customer_destroy');
Route::post('/update_customer', [CustomerController::class, 'update'])->name('customer_update');

//sale order
Route::get('/display_sale_order_create', [SaleOrderController::class, 'create'])->name('sale_order_create_page');
Route::get('/display_sale_order_edit/{id}', [SaleOrderController::class, 'edit'])->name('sale_order_edit_page');
Route::get('/display_sale_order_list', [SaleOrderController::class, 'index'])->name('sale_order_list_page');
Route::post('/sale_order_store', [SaleOrderController::class, 'store'])->name('sale_order_store');
Route::get('/delete_customer/{id}', [SaleOrderController::class, 'destroy'])->name('customer_destroy');
Route::get('/sale_order_session_destroy/{id}', [SaleOrderController::class, 'destroyFromSession'])->name('sale_order_session_destroy');
Route::post('/update_sale_order', [SaleOrderController::class, 'update'])->name('sale_order_update');