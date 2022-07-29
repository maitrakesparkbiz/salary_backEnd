<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PdfController;
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

Route::get('/', function () {
//    return view('welcome');
    return "asdasdasd";
});

Route::get("export",[ExcelController::class,'Export'])->name('export');
Route::get("index",[ExcelController::class,'index'])->name('import');
Route::post("import",[ExcelController::class,'Import'])->name('import');
Route::get("makePdf",[PdfController::class,'makePdf']);
