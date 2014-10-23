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
	return Redirect::to('quotes');
});

Route::get('quotes', function ()
{
	return View::make('quotes_home')->with('quotes_num', 9000);
});

Route::get('quotes/{id}', function($id)
{
	return "Quotes $id";
})->where('id','[0-9]+');