<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

Route::filter('Admin',function(){
	if(! Entrust::hasRole(Config::get('customConfig.roles.admin'))){
		return Redirect::to('/');
	}
});


Route::filter('dashboard',function(){
	if(! CustomHelper::userHasPermission(Auth::user(),[Config::get('customConfig.permissions.dashboard')])){
		return Redirect::to('/');
	}
});

Route::filter('student',function(){
	if(! CustomHelper::userHasPermission(Auth::user(),[Config::get('customConfig.permissions.student')])){
		return Redirect::to('/');
	}
});

Route::filter('class',function(){
	if(! CustomHelper::userHasPermission(Auth::user(),[Config::get('customConfig.permissions.class')])){
		return Redirect::to('/');
	}
});

Route::filter('marketing',function(){
	if(! CustomHelper::userHasPermission(Auth::user(),[Config::get('customConfig.permissions.marketing')])){
		return Redirect::to('/');
	}
});
Route::filter('users',function(){
	if(! CustomHelper::userHasPermission(Auth::user(),[Config::get('customConfig.permissions.users')])){
		return Redirect::to('/');
	}
});
Route::filter('finance',function(){
	if(! CustomHelper::userHasPermission(Auth::user(),[Config::get('customConfig.permissions.finance')])){
		return Redirect::to('/');
	}
});

Route::filter('advance_search',function(){
	if(! CustomHelper::userHasPermission(Auth::user(),[Config::get('customConfig.permissions.advance_search')])){
		return Redirect::to('/');
	}
});