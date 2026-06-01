<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::get('user',[UserController::class, 'index'])->name('admin.user');
Route::post('get-user-data',[UserController::class,'userData']);    
Route::resource('users', UserController::class);
Route::resource('admin/posts', PostController::class);
Route::get('get-posts-data',[PostController::class,'getPost'])->name('get-post');
require __DIR__.'/auth.php';   