<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::get('user',[UserController::class, 'index'])->name('admin.user');
Route::post('get-user-data',[UserController::class,'userData']);    
Route::resource('users', UserController::class);

require __DIR__.'/auth.php';   