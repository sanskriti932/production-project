<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CafeAdmin\FrontendController;
use App\Http\Controllers\CafeAdmin\CafeCategoryController;
use App\Http\Controllers\CafeAdmin\CafeProductController;
use App\Http\Controllers\StationeryAdmin\StationeryFrontendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',function(){
        return "This is admin";
    });
});


Route::middleware(['auth','isCafeAdmin'])->group(function(){
    Route::get('/cafedashboard', [FrontendController::class, 'index']);
    Route::get('cafecategories',[CafeCategoryController::class, 'index']);
    Route::get('add-cafecategory',[CafeCategoryController::class, 'add']);
    Route::post('insert-cafecategory',[CafeCategoryController::class, 'insert']);
    Route::get('edit-cafecategory/{id}',[CafeCategoryController::class, 'edit']);
    Route::put('update-cafecategory/{id}',[CafeCategoryController::class, 'update']);
    Route::get('delete-cafecategory/{id}',[CafeCategoryController::class, 'destroy']);

    Route::get('cafeproducts',[CafeProductController::class,'index']);
    Route::get('add-cafeproduct',[CafeProductController::class,'add']);
    Route::post('insert-cafeproduct',[CafeProductController::class,'insert']);
    Route::get('edit-cafeproduct/{id}',[CafeProductController::class, 'edit']);
    Route::put('update-cafeproduct/{id}',[CafeProductController::class, 'update']);
    Route::get('delete-cafeproduct/{id}',[CafeProductController::class, 'destroy']);
});


Route::middleware(['auth','isStationeryAdmin'])->group(function(){
    Route::get('/stationerydashboard', [StationeryFrontendController::class, 'index']);
});