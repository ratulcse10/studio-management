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
	// Stduio Class  Cruds Related Routes Created By Joy
	Route::get('studioclasses',['as' => 'studioclass.index', 'uses' => 'StudioClassController@index']);
	Route::get('studioclass/create',['as' => 'studioclass.create', 'uses' => 'StudioClassController@create']);
	Route::post('studioclass/create',['as' => 'studioclass.store', 'uses' => 'StudioClassController@store']);
	Route::get('studioclass/{id}/edit',['as' => 'studioclass.edit', 'uses' => 'StudioClassController@edit']);
	Route::put('studioclass/{id}',['as' => 'studioclass.update', 'uses' => 'StudioClassController@update']);
	Route::delete('studioclasses/{id}',['as' => 'studioclass.delete', 'uses' => 'StudioClassController@destroy']);
	// 
	// Revenues Cruds
	Route::get('revenues',['as' => 'revenue.index', 'uses' => 'RevenueController@index']);
	Route::get('revenue/create',['as' => 'revenue.create', 'uses' => 'RevenueController@create']);
	Route::post('revenue/create',['as' => 'revenue.store', 'uses' => 'RevenueController@store']);
	Route::get('revenue/{id}/edit',['as' => 'revenue.edit', 'uses' => 'RevenueController@edit']);
	Route::put('revenue/{id}',['as' => 'revenue.update', 'uses' => 'RevenueController@update']);
	Route::delete('revenue/{id}',['as' => 'revenue.delete', 'uses' => 'RevenueController@destroy']);
	// 
	Route::get('campaigns',['as' => 'campaign.index', 'uses' => 'CampaignsController@index']);
	Route::get('campaign/create',['as' => 'campaign.create', 'uses' => 'CampaignsController@create']);
	Route::post('campaign/create',['as' => 'campaign.store', 'uses' => 'CampaignsController@store']);
	Route::get('campaign/{id}/edit',['as' => 'campaign.edit', 'uses' => 'CampaignsController@edit']);
	Route::put('campaign/{id}',['as' => 'campaign.update', 'uses' => 'CampaignsController@update']);
	Route::delete('campaigns/{id}',['as' => 'campaign.delete', 'uses' => 'CampaignsController@destroy']);

	Route::get('subscribers',['as' => 'subscriber.index', 'uses' => 'SubscribersController@index']);
	Route::get('subscriber/create',['as' => 'subscriber.create', 'uses' => 'SubscribersController@create']);
	Route::post('subscriber/create',['as' => 'subscriber.store', 'uses' => 'SubscribersController@store']);
	Route::get('subscriber/{id}/edit',['as' => 'subscriber.edit', 'uses' => 'SubscribersController@edit']);
	Route::put('subscriber/{id}',['as' => 'subscriber.update', 'uses' => 'SubscribersController@update']);
	Route::delete('subscribers/{id}',['as' => 'subscriber.delete', 'uses' => 'SubscribersController@destroy']);
});

Route::get('test',function(){
//	$faker = Faker\Factory::create();
//	$time = $faker->unixTime;
//	$to= Carbon::createFromTimeStamp($time)->addDays($faker->numberBetween(1,1000));
//	$from = Carbon::createFromTimeStamp($time);
//	//var_dump($time);
//	return [
//		'from' => $from,
//		'to' => $to
//	];

	return Campaign::all();
});