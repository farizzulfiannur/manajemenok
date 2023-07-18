<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectManagerController;
use Illuminate\Support\Facades\Route;

// Login & Register
Route::get('/',[HomeController::class,'login'])->name('login');
Route::get('/register',[HomeController::class,'register'])->name('register');
Route::post('/storeRegister',[HomeController::class,'storeRegister'])->name('storeRegister');
Route::post('/storeLogin',[HomeController::class,'storeLogin'])->name('storeLogin');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');

// Project Manager 
Route::get('/pm/home',[ProjectManagerController::class,'homePM'])->name('homePM')->middleware('auth','pm');
Route::get('/pm/editprofile/{id}',[ProjectManagerController::class,'editprofilePM'])->name('editprofilePM')->middleware('auth','pm');
Route::post('/pm/updateprofile/{id}',[ProjectManagerController::class,'updateprofilePM'])->name('updateprofilePM')->middleware('auth','pm');
// Route::post('pm/updateprofile/{id}',[ProjectManagerController::class,'updateprofilePM'])->name('updateprofilePM')->middleware('auth','pm');