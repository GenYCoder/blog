<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
interface BarInterface {};
class Bar implements BarInterface 
{

};
class SecondBar implements BarInterface 
{

};

App::bind('BarInterface', 'Bar');

Route::get('bar', function(){
	$bar = app('BarInterface');
	dd($bar);
});


Route::get('foo', 'fooController@foo');

Route::get('/', 'pageController@index');

Route::get('success', 'fileTransferController@successfulUpload');
Route::get('upload', 'fileTransferController@showUpload');
Route::post('apply/upload', 'fileTransferController@uploadContents');
Route::get('downloads', ['middleware'=>'auth','uses'=>'fileTransferController@showDownloads']);
// Route::get('downloads', 'fileTransferController@showDownloads');



// Route::get('articles/create', 'pageController@create');
// Route::get('articles/query', 'pageController@test');
// Route::post('articles', 'pageController@store');
// 
Route::resource('articles', 'pageController');
// Route::get('foo', ['middleware'=>'mananger', function(){
// 	return "may only be view by managers";
// }]);

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController'
// ]);


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('login/{provider?}', 'Auth\AuthController@login');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');