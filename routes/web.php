<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\Home\HomeController::class, 'home'])->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    
    Route::middleware(['customer'])->group(function () {
        Route::post('/profile', [App\Http\Controllers\Auth\ProfileController::class, 'post'])->name('profile.post');
        Route::get('/profile', [App\Http\Controllers\Auth\ProfileController::class, 'get'])->name('profile.get');
    });
    Route::middleware(['admin'])->group(function () {
        Route::post('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'post'])->name('dashboard.post');
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'get'])->name('dashboard.get');

        Route::get('/customer', [App\Http\Controllers\Models\CustomerController::class, 'index'])->name('customer');
        Route::get('/customer/create', [App\Http\Controllers\Models\CustomerController::class, 'create'])->name('customer.create');
        Route::post('/customer/create', [App\Http\Controllers\Models\CustomerController::class, 'store'])->name('customer.store');
        Route::get('/customer/show/{id}', [App\Http\Controllers\Models\CustomerController::class, 'show'])->name('customer.show');
        Route::get('/customer/update/{id}', [App\Http\Controllers\Models\CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/customer/update/{id}', [App\Http\Controllers\Models\CustomerController::class,'App\Http\Controllers\Models\update'])->name('customer.update');
        Route::get('/customer/delete/{id}', [App\Http\Controllers\Models\CustomerController::class,'destroy'])->name('customer.destroy');
    
        Route::get('/vehicle', [App\Http\Controllers\Models\VehicleController::class, 'index'])->name('vehicle');
        Route::get('/vehicle/create', [App\Http\Controllers\Models\VehicleController::class, 'create'])->name('vehicle.create');
        Route::post('/vehicle/create', [App\Http\Controllers\Models\VehicleController::class, 'store'])->name('vehicle.store');
        Route::get('/vehicle/show/{id}', [App\Http\Controllers\Models\VehicleController::class, 'show'])->name('vehicle.show');
        Route::get('/vehicle/update/{id}', [App\Http\Controllers\Models\VehicleController::class, 'edit'])->name('vehicle.edit');
        Route::post('/vehicle/update/{id}', [App\Http\Controllers\Models\VehicleController::class,'update'])->name('vehicle.update');
        Route::get('/vehicle/delete/{id}', [App\Http\Controllers\Models\VehicleController::class,'destroy'])->name('vehicle.destroy');
    
        Route::get('/order', [App\Http\Controllers\Models\OrderController::class, 'index'])->name('order');
        Route::get('/order/create', [App\Http\Controllers\Models\OrderController::class, 'create'])->name('order.create');
        Route::post('/order/create', [App\Http\Controllers\Models\OrderController::class, 'store'])->name('order.store');
        Route::get('/order/show/{id}', [App\Http\Controllers\Models\OrderController::class, 'show'])->name('order.show');
        Route::get('/order/update/{id}', [App\Http\Controllers\Models\OrderController::class, 'edit'])->name('order.edit');
        Route::post('/order/update/{id}', [App\Http\Controllers\Models\OrderController::class,'update'])->name('order.update');
        Route::get('/order/delete/{id}', [App\Http\Controllers\Models\OrderController::class,'destroy'])->name('order.destroy');
    });

});

