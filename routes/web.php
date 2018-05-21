<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

//route for home

Route::get('/', 'HomeController@index')->name('home');

// Route for middleware
// ROute middleware is registered in Kernel.php in Milldleware directory
Route::group(['middleware'=>'CheckUrl'], function(){
	Route::match(['get','post'], 'testmiddleware/{id}', 'HomeController@testmiddleware');
});

//add skills
Route::get('addskills', 'HomeController@addskills');

Route::post('addskills', 'HomeController@store');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'HomeController@profile')->name('profile');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
