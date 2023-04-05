<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\backend\BookController;


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

 

//Frontend Route
Route::controller(FrontendController::class)->group(function (){
    
    Route::get('/' , 'index')->name('frontend.homepage');
    Route::get('/detailpage/{id}', 'detail')->name('frontend.bookdetailpage');
});

Auth::routes();

//Backend Route
Route::get('/author', [App\Http\Controllers\HomeController::class, 'index'])->name('backend.dashboard');

Route::controller(BookController::class)->group(function(){

    Route::get('backend/book/index' , 'index')->name('backend.book.index');
    Route::get('backend/book/create' , 'create')->name('backend.book.create');
    Route::post('backend/book/store' , 'store')->name('backend.book.store');
    Route::get('backend/book/edit/{id}' , 'edit')->name('backend.book.edit');
    Route::post('backend/book/update/{id}' , 'update')->name('backend.book.update');
    Route::get('backend/book/delete/{id}' , 'destroy')->name('backend.book.delete');
});

