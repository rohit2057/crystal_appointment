<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\VisitorController;

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
Route::get('/officer',[OfficerController::class,'index'])->name('officer');
Route::post('/officerAdd',[OfficerController::class,'officerAdd'])->name('officerAdd');
Route::put('/status_update',[OfficerController::class,'status_update']);
Route::put('/getOfficerDetail',[OfficerController::class,'getOfficerDetail'])->name('getOfficerDetail');
Route::put('/officerUpdate',[OfficerController::class,'officerUpdate'])->name('officerUpdate');


//for_visitor_works
Route::get('/visitor',[VisitorController::class,'visit'])->name('visitor');
Route::post('/visitorAdd',[VisitorController::class,'visitorAdd'])->name('visitorAdd');
Route::put('/getVisitorDetail',[VisitorController::class,'getVisitorDetail'])->name('getVisitorDetail');
Route::put('/visitor_update',[VisitorController::class,'visitor_update'])->name('visitor_update');


Route::get('/activity',[\App\Http\Controllers\ActivityController::class,'activity'])->name('activity');