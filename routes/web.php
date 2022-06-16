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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/items', 'App\Http\Controllers\ItemController@index');
Route::get('/item/{id}', 'App\Http\Controllers\ItemController@show');
Route::get('/items/create', 'App\Http\Controllers\ItemController@create');
Route::post('/items', 'App\Http\Controllers\ItemController@add');
Route::delete('/item/{id}', 'App\Http\Controllers\ItemController@destroy');

Route::post('/equipment/add/{id}', 'App\Http\Controllers\EquipmentController@add')->middleware('auth');
Route::post('/equipment/equip/{id}/{state}', 'App\Http\Controllers\EquipmentController@equip')->middleware('auth');
Route::get('/equipment', 'App\Http\Controllers\EquipmentController@my')->middleware('auth')->name('equipment.my');

Route::get('/profile/edit', 'App\Http\Controllers\InformationController@edit')->middleware('auth')->name('information.edit');

Route::get('/profile', 'App\Http\Controllers\UserController@myProfile')->middleware('auth')->name('user.myprofile');
Route::get('/profile/{id}', 'App\Http\Controllers\UserController@profile')->name('user.profile');

Route::post('/rating/add/{id}', 'App\Http\Controllers\RatingController@add')->middleware('auth');

Route::get('/review/create', 'App\Http\Controllers\ReviewController@create')->name('review.create');
Route::post('/review', 'App\Http\Controllers\ReviewController@add')->name('review.add');
Route::get('/reviews', 'App\Http\Controllers\ReviewController@all')->name('reviews.all');
Route::get('/reviews/my', 'App\Http\Controllers\ReviewController@my')->name('reviews.my');
Route::post('/review/edit/{review_id}', 'App\Http\Controllers\ReviewController@edit')->name('review.edit');

Route::post('/observate/{id}', 'App\Http\Controllers\ObservationController@add')->middleware('auth')->name('observation.add');
Route::delete('/unobservate/{id}', 'App\Http\Controllers\ObservationController@destroy')->middleware('auth')->name('observation.destroy');
Route::get('/observations', 'App\Http\Controllers\ObservationController@show')->middleware('auth')->name('observations.show');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
