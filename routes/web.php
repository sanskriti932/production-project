<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    Route::get('/cafedashboard', [App\Http\Controllers\CafeAdmin\FrontendController::class, 'index']);
    Route::get('cafecategories',[App\Http\Controllers\CafeAdmin\CafeCategoryController::class, 'index']);
    Route::get('add-cafecategory',[App\Http\Controllers\CafeAdmin\CafeCategoryController::class, 'add']);
    Route::post('insert-cafecategory',[App\Http\Controllers\CafeAdmin\CafeCategoryController::class, 'insert']);
    Route::get('edit-cafeproduct/{id}',[App\Http\Controllers\CafeAdmin\CafeCategoryController::class, 'edit']);
    Route::put('update-cafecategory/{id}',[App\Http\Controllers\CafeAdmin\CafeCategoryController::class, 'update']);
    Route::get('delete-cafecategory/{id}',[App\Http\Controllers\CafeAdmin\CafeCategoryController::class, 'destroy']);

});