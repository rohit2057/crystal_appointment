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

 Route::get('/', function () {
   return view('home');
 });

// Route::get('/visitor', function () {
//     return view('visitor');
// });

Route::get('/officer',[\App\Http\Controllers\OfficerController::class,'index'])->name('officer');
Route::get('/visitor',[\App\Http\Controllers\VisitorController::class,'visit'])->name('visitor');
Route::get('/activity',[\App\Http\Controllers\ActivityController::class,'activity'])->name('activity');