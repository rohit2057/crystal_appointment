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


//for_officer_works
Route::get('/officer',[\App\Http\Controllers\OfficerController::class,'index'])->name('officer');
Route::post('/officerAdd',[\App\Http\Controllers\OfficerController::class,'officerAdd'])->name('officerAdd');
Route::put('/status_update',[\App\Http\Controllers\OfficerController::class,'status_update']);

//for_visitor_works
Route::get('/visitor',[\App\Http\Controllers\VisitorController::class,'visit'])->name('visitor');
Route::post('/visitorAdd',[\App\Http\Controllers\VisitorController::class,'visitorAdd'])->name('visitorAdd');
Route::put('/visitor_update',[\App\Http\Controllers\VisitorController::class,'visitor_update'])->name('visitor_update');


Route::get('/activity',[\App\Http\Controllers\ActivityController::class,'activity'])->name('activity');