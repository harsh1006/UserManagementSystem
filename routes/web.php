<?php

use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserManagementController::class,'list']);
Route::get('/add', [UserManagementController::class,'add']);
Route::get('/edit/{id}', [UserManagementController::class,'edit']);
Route::post('/delete/{id}', [UserManagementController::class,'delete']);
Route::post('/store', [UserManagementController::class,'store']);


