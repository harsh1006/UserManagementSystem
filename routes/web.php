<?php

use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/list', [UserManagementController::class,'list']);
Route::get('/add', [UserManagementController::class,'add']);
Route::post('/store', [UserManagementController::class,'store']);


