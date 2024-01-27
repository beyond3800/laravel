<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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

// Route::put('/update/{order}',[OrderController::class,'update']);
Route::get('/',[MenuController::class,'index']);
Route::get('/menu.createMenu',[MenuController::class,'create'])->middleware('admin');
Route::post('/product',[MenuController::class,'store'])->middleware('admin');
Route::get('/register',[UserController::class,'create'])->middleware(['guest']);
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');
Route::post('/user/authen',[UserController::class,'authen'])->middleware('guest');
Route::get('/order.index',[OrderController::class,'index']);
Route::get('/show/index/{menu}',[MenuController::class,'show']);
Route::post('/user',[UserController::class,'store']);


Route::middleware(['auth'])->group(function(){
    Route::post('/order/{menu}',[OrderController::class,'store']);
    Route::post('/logout',[UserController::class,'logout']);
    Route::put('/add_order/{order}',[OrderController::class,'addOrder']);
    Route::put('/adding_order',[OrderController::class,'update']);
    Route::put('/remove_order/{order}',[OrderController::class,'removeOrder']);
    Route::delete('/order_deleted/{order}',[OrderController::class,'destroy']);
    Route::delete('/clear-order',[UserController::class,'destroy']);
    Route::get('/checkout',[UserController::class,'checkout']);
    Route::put('/checkout-address',[UserController::class,'updateAddress']);
    Route::put('/checkout-order',[UserController::class,'checkoutOrders']);
});

Route::prefix('admin')->middleware(['admin'])->group(function(){
    Route::get('/usersOrders',[AdminController::class,'usersOrders']);
    Route::get('/dashboard',[AdminController::class,'index']);
    Route::get('/customers',[AdminController::class,'customers']);
    Route::post('/logout',[AdminController::class,'logout']);
    Route::post('/',[AdminController::class,'store']);
    Route::delete('/deleteOrder/{order}',[AdminController::class,'deleteOrder']); 
});

Route::prefix('admin')->middleware('management')->group(function(){
    Route::get('/register',[AdminController::class,'create']);
    Route::get('/admins',[AdminController::class,'adminUsers']);
    Route::get('/edit-admin/{admin}',[AdminController::class,'editAdmin']);
    Route::delete('/delete-admin/{admin}',[AdminController::class,'deleteAdmin']);
    Route::put('/edit/{admin}',[AdminController::class,'updateAdmin']);
});

Route::post('/admin/authen',[AdminController::class,'authen']);
Route::get('/admin.login',[AdminController::class,'login']);










