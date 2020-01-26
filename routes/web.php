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

Route::POST('newsletters','Transend\HomePageController@newsLetters')->name('news.letters');
Route::group(['prefix' => 'hi' ], function () {
	Route::GET('/','Transend\HomePageController@index');
});
