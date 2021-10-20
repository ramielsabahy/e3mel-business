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

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('filter', 'App\Http\Controllers\HomeController@filter')->name('filter');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'isAdmin'], function(){
    Route::get('/', 'CategoryController@admin');
    Route::resource('categories', 'CategoryController');
    Route::get('toggle-category/{id}', 'CategoryController@toggleStatus');

    Route::resource('courses', 'CourseController');
    Route::any('delete-course/{id}', 'CourseController@destroy');
    Route::get('toggle-course/{id}', 'CourseController@toggleStatus');
});
