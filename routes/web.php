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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::view('dashboard','admin.dashboard');
Route::get('categories','Crud\CategoryController@index')->name('category');
Route::post('categories/store','Crud\CategoryController@store')->name('category.store');
Route::get('show/categories','Crud\CategoryController@show')->name('category.show');
Route::get('edit/category/{id}','Crud\CategoryController@edit')->name('category.edit');
Route::post('delete/category/{id}','Crud\CategoryController@delete')->name('category.delete');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
