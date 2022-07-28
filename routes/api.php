<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("login",[LoginController::class,'login']);
Route::post("register",[LoginController::class,'register']);

Route::post("add",[ExpenseController::class,'add']);
Route::post("list",[ExpenseController::class,'list']);
Route::get("get/{id}",[ExpenseController::class,'get']);
Route::post("update",[ExpenseController::class,'update']);
Route::get("delete/{id}",[ExpenseController::class,'delete']);


//category
Route::post("category/add",[ExpenseController::class,'categoryAdd']);
Route::get("category",[ExpenseController::class,'categoryList']);
