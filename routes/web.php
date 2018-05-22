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

Route::get('/posts', 'PostController@index')->name('posts');

Route::get('/post/{id}', 'PostController@show');

Route::get('/posts/author/{author}', 'PostController@byAuthor');



Route::group(['middleware'=>'registeredUser'], function(){
	Route::match(['get'], '/posts/create', 'PostController@create')->name('create');
});

Route::post('/posts/store', 'PostController@store')->name('store');

