<?php
 use App\Http\controllers\AuthController;
 Route::get('admin-login',[AuthController::class,'getLogin']);
 Route::post('login',[AuthController::class,'postLogin'])->name('login');
Route::post('admin-logout',[AuthController::class,'postLogout'])->name('admin-logout');
 