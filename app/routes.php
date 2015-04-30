<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::route('dashboard');
});
Route::group(['before' => 'guest'], function(){
	Route::controller('password', 'RemindersController');
	Route::get('login', ['as'=>'login','uses' => 'AuthController@login']);
	Route::post('login', array('uses' => 'AuthController@doLogin'));
});

Route::group(array('before' => 'auth'), function()
{

	Route::get('students',['as' => 'student.index', 'uses' => 'StudentController@index']);
	Route::get('student/create',['as' => 'student.create', 'uses' => 'StudentController@create']);
	Route::post('student/create',['as' => 'student.store', 'uses' => 'StudentController@store']);
	Route::get('student/{id}/edit',['as' => 'student.edit', 'uses' => 'StudentController@edit']);
	Route::put('student/{id}',['as' => 'student.update', 'uses' => 'StudentController@update']);
	Route::delete('students/{id}',['as' => 'student.delete', 'uses' => 'StudentController@destroy']);

	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'AuthController@doChangePassword'));

	// Advertisement Type Cruds Related Routes Created By Joy
	Route::get('advtypes',['as' => 'advtype.index', 'uses' => 'AdvertisementTypeController@index']);
	Route::get('advtype/create',['as' => 'advtype.create', 'uses' => 'AdvertisementTypeController@create']);
	Route::post('advtype/create',['as' => 'advtype.store', 'uses' => 'AdvertisementTypeController@store']);
	Route::get('advtype/{id}/edit',['as' => 'advtype.edit', 'uses' => 'AdvertisementTypeController@edit']);
	Route::put('advtype/{id}',['as' => 'advtype.update', 'uses' => 'AdvertisementTypeController@update']);
	Route::delete('advtypes/{id}',['as' => 'advtype.delete', 'uses' => 'AdvertisementTypeController@destroy']);
	//


	Route::get('students',['as' => 'student.index', 'uses' => 'StudentController@index']);
	Route::get('student/create',['as' => 'student.create', 'uses' => 'StudentController@create']);
	Route::post('student/create',['as' => 'student.store', 'uses' => 'StudentController@store']);
	Route::get('student/{id}/edit',['as' => 'student.edit', 'uses' => 'StudentController@edit']);
	Route::put('student/{id}',['as' => 'student.update', 'uses' => 'StudentController@update']);
	Route::delete('students/{id}',['as' => 'student.delete', 'uses' => 'StudentController@destroy']);
});

Route::get('test',function(){
	$faker = Faker\Factory::create();
	$time = $faker->unixTime;
	$to= Carbon::createFromTimeStamp($time)->addDays($faker->numberBetween(1,1000));
	$from = Carbon::createFromTimeStamp($time);
	//var_dump($time);
	return [
		'from' => $from,
		'to' => $to
	];
});