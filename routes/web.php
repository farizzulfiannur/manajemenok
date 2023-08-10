<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProjectManagerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// Login & Register
Route::get('/',[HomeController::class,'login'])->name('login');
Route::get('/register',[HomeController::class,'register'])->name('register');
Route::post('/storeRegister',[HomeController::class,'storeRegister'])->name('storeRegister');
Route::post('/storeLogin',[HomeController::class,'storeLogin'])->name('storeLogin');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');

// Project Manager 
Route::get('/home',[ProjectManagerController::class,'homePM'])->name('homePM')->middleware('auth');
Route::get('/editprofile/{id}',[ProjectManagerController::class,'editprofilePM'])->name('editprofilePM')->middleware('auth');
Route::post('/updateprofile/{id}',[ProjectManagerController::class,'updateprofilePM'])->name('updateprofilePM')->middleware('auth');
// Route::post('pm/updateprofile/{id}',[ProjectManagerController::class,'updateprofilePM'])->name('updateprofilePM')->middleware('auth','pm');

// Notes 
Route::get('/notes/add',[NoteController::class,'addNotes'])->name('addNotes')->middleware('auth');
Route::post('/notes/store',[NoteController::class,'storeNotes'])->name('storeNotes')->middleware('auth');
Route::get('/notes/show/{id}',[NoteController::class,'showNotes'])->name('showNotes')->middleware('auth');
Route::get('/notes/delete/{id}',[NoteController::class,'deleteNotes'])->name('deleteNotes')->middleware('auth');
Route::get('/notes/edit/{id}',[NoteController::class,'editNotes'])->name('editNotes')->middleware('auth');
Route::post('/notes/update/{id}',[NoteController::class,'updateNotes'])->name('updateNotes')->middleware('auth');

// Tasks
Route::get('/task',[TaskController::class,'homeTask'])->name('task')->middleware('auth');
Route::get('/task/add',[TaskController::class,'addTask'])->name('addTask')->middleware('auth');
Route::post('/task/store',[TaskController::class,'storeTask'])->name('storeTask')->middleware('auth');
Route::get('/task/show/{id}',[TaskController::class,'showTask'])->name('showTask')->middleware('auth');

    
// Tester Tasks
Route::get('/task/cobak',[TaskController::class,'cobakTask'])->name('cobakTask');

// Todo 
Route::get('/Todo',[TodoController::class,'homeTodo'])->name('todo')->middleware('auth');
Route::get('/Todo/show',[TodoController::class,'showTodo'])->name('showtodo')->middleware('auth');


