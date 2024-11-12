<?php

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


Route::get('/',[\App\Http\Controllers\frontendcontroller::class,'home'])->name('home1');
Route::get('/home',[\App\Http\Controllers\frontendcontroller::class,'home'])->name('home');

Route::get('/login',[\App\Http\Controllers\frontendcontroller::class,'login'])->name('login');
Route::get('/register',[\App\Http\Controllers\frontendcontroller::class,'register'])->name('register');
Route::get('/forget',[\App\Http\Controllers\frontendcontroller::class,'forget'])->name('forget');
Route::post('/addNewUser',[\App\Http\Controllers\frontendcontroller::class,'addNewUser'])->name('addNewUser');

 Route::group(['middleware' => 'auth.check'], function ()
 {
    //customer
    Route::get('/changePass',function(){
        return view('changepass');
    })->name('changePass');
    Route::get('/profilePage',function(){
        return view('profile');
    })->name('profilePage');
    Route::get('/dashboard',function(){
        // $Orders = \App\Models\Order::all();
        // dd($Orders);
        return view('dashboard');
    })->name('dashboard');
    Route::get('/createParcel',function(){
        return view('customer.create_parcel');
    })->name('createParcel');
    Route::get('/trackOrder',function(){
        return view('customer.track_order');
    })->name('trackOrder');

    Route::get('/viewTrashed',[\App\Http\Controllers\TrashedOrders::class,'viewTrashed'])->name('viewTrashed');
    Route::get('/restoreOrder/{id}',[\App\Http\Controllers\TrashedOrders::class,'restoreOrder'])->name('restoreOrder');

    //admin
    Route::get('/manage_users',[\App\Http\Controllers\AdminController::class,'manage_users'])->name('manage_users');
    Route::get('/enable_disable_user/{id}',[\App\Http\Controllers\AdminController::class,'enable_disable_user'])->name('enable_disable_user');
    Route::get('/remove_user/{id}',[\App\Http\Controllers\AdminController::class,'remove_user'])->name('remove_user');
    Route::get('/viewDeletedUsrs',[\App\Http\Controllers\AdminController::class,'viewDeletedUsrs'])->name('viewDeletedUsrs');
    Route::get('/restoreUser/{id}',[\App\Http\Controllers\AdminController::class,'restoreUser'])->name('restoreUser');
    Route::get('/assign_agent',[\App\Http\Controllers\AdminController::class,'assign_agent'])->name('assign_agent');
    Route::post('/add_agent',[\App\Http\Controllers\AdminController::class,'add_agent'])->name('add_agent');
    Route::get('/get_customers/{id}', [\App\Http\Controllers\AdminController::class, 'getCustomers'])->name('get_customers');
    Route::get('/manage_orders',[\App\Http\Controllers\AdminController::class,'manage_orders'])->name('manage_orders');
    Route::get('/edit_order/{id}',[\App\Http\Controllers\AdminController::class,'edit_order'])->name('edit_order');
    Route::put('/change_order/{id}',[\App\Http\Controllers\AdminController::class,'change_order'])->name('change_order');
    Route::delete('/delete_order/{id}',[\App\Http\Controllers\AdminController::class,'delete_order'])->name('delete_order');

    //agent
    Route::get('/viewOrders',[\App\Http\Controllers\AgentController::class,'viewOrders'])->name('viewOrders');
    Route::get('/change_status/{id}',[\App\Http\Controllers\AgentController::class,'change_status'])->name('change_status');
    Route::put('/updateStatus/{id}',[\App\Http\Controllers\AgentController::class,'updateStatus'])->name('updateStatus');
    Route::delete('/remove_order/{id}',[\App\Http\Controllers\AgentController::class,'remove_order'])->name('remove_order');
    Route::resource('orders',\App\Http\Controllers\OrderController::class);
});
Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
Route::post('/dologin',[\App\Http\Controllers\AuthController::class,'dologin'])->name('dologin');

