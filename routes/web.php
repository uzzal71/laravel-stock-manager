<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\CheckOutController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BarcodeController;

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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
  Route::resource('roles', RoleController::class);
  Route::resource('users', UserController::class);
  Route::resource('customers', CustomerController::class);
  Route::resource('suppliers', SupplierController::class);
  Route::resource('organizations', OrganizationController::class)->only(['show', 'edit', 'update']);
  Route::resource('categories', CategoryController::class);
  Route::resource('brands', BrandController::class);
  Route::resource('barcodes', BarcodeController::class);
  Route::resource('items', ItemController::class);
  Route::resource('checkin', CheckInController::class);
  Route::resource('checkout', CheckOutController::class);
});
