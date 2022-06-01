<?php

use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::livewire('/', 'home')->name('home');
Route::livewire('/products', 'product-index')->name('products');
Route::livewire('/products/brand/{brandId}', 'product-brand')->name('products.brand');
Route::livewire('/products/{id}', 'product-detail')->name('products.detail');
Route::livewire('/keranjang', 'keranjang')->name('keranjang');
Route::livewire('/checkout', 'checkout')->name('checkout');
Route::livewire('/history', 'history')->name('history');

Route::livewire('/admin/dashboard', 'admin.dashboard')->layout('layouts.admin.admin-app')->name('admin.dashboard')->middleware('is_admin');
Route::livewire('/admin/brand', 'admin.brand')->layout('layouts.admin.admin-app')->name('admin.brand')->middleware('is_admin');
Route::livewire('/admin/product', 'admin.product')->layout('layouts.admin.admin-app')->name('admin.product')->middleware('is_admin');
Route::livewire('/admin/order', 'admin.order')->layout('layouts.admin.admin-app')->name('admin.order')->middleware('is_admin');