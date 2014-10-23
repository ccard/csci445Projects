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

Route::model('quote','Quote');

Route::get('/', function()
{
	return Redirect::to('quotes');
});

Route::get('quotes', function ()
{
	$quotes = Quote::all();
	return View::make('quotes.quotes_home')->with('quotes', $quotes);
});

Route::get('quotes/create',function(){
	$quote = new Quote;
	return View::make('quotes.edit')->with('quote', $quote)->with('method','post');
});

Route::get('quotes/{quote}', function(Quote $quote){
	return View::make('quotes.single')->with('quote', $quote);
});

Route::get('quotes/{quote}/edit', function(Quote $quote){
	return View::make('quotes.edit')->with('quote', $quote)->with('method', 'put');
});

Route::get('quotes/{quote}/delete', function(Quote $quote){
	return View::make('quotes.edit')->with('quote', $quote)->with('method', 'delete');
});

Route::get('quotes/genres/{name}', function($name)
{
	$genre = Genre::whereName($name)->with('quotes')->first();
	return View::make('quotes.quotes_home')->with('genre', $genre)->with('quotes', $genre->quotes);
	return "Quotes $id";
});

Route::post('quotes', function(){
	$quote = Quote::create(Input::all());
	return Redirect::to('quotes/'.$quote->id)->with('message','Successfully created page!');
});

Route::put('quotes/{quote}', function(Quote $quote){
	$quote->update(Input::all());
	return Redirect::to('quotes/'.$quote->id)->with('message','Successfully update page!');
});

Route::delete('quotes/{quote}', function(Quote $quote){
	$quote->delete();
	return Redirect::to('quotes')->with('message', 'Successfully deleted page!');
});

View::composer('quotes.edit', function($view){
	$genres = Genre::all();
	if(count($genres) > 0){
		$genre_options = array_combine($genres->lists('id'), $genres->lists('name'));
	} else {
		$genre_options = array_combine(null,'Unspecified');
	}
	$view->with('genre_options',$genre_options);
});