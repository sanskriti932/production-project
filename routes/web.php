<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CafeAdmin\FrontendController;
use App\Http\Controllers\CafeAdmin\CafeCategoryController;
use App\Http\Controllers\CafeAdmin\CafeProductController;
use App\Http\Controllers\StationeryAdmin\StationeryFrontendController;
use App\Http\Controllers\StationeryAdmin\StationeryCategoryController;
use App\Http\Controllers\StationeryAdmin\StationeryProductController;
use App\Http\Controllers\FrontPage\FrontPageController;
use App\Http\Controllers\CafeFrontend\CafeFrontendController;
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

Route::get('/newhome', [FrontPageController::class, 'index']);

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
    Route::get('stationerycategories',[StationeryCategoryController::class, 'index']);
    Route::get('add-stationerycategory',[StationeryCategoryController::class, 'add']);
    Route::post('insert-stationerycategory',[StationeryCategoryController::class, 'insert']);
    Route::get('edit-stationerycategory/{id}',[StationeryCategoryController::class, 'edit']);
    Route::put('update-stationerycategory/{id}',[StationeryCategoryController::class, 'update']);
    Route::get('delete-stationerycategory/{id}',[StationeryCategoryController::class, 'destroy']);

    Route::get('stationeryproducts',[StationeryProductController::class,'index']);
     Route::get('add-stationeryproduct',[StationeryProductController::class,'add']);
     Route::post('insert-stationeryproduct',[StationeryProductController::class,'insert']);
     Route::get('edit-stationeryproduct/{id}',[StationeryProductController::class, 'edit']);
    Route::put('update-stationeryproduct/{id}',[StationeryProductController::class, 'update']);
    Route::get('delete-stationeryproduct/{id}',[StationeryProductController::class, 'destroy']);
});


Route::middleware(['auth','isCafeOpr'])->group(function(){
    Route::get('/cafehome', [CafeFrontendController::class, 'index']);
});