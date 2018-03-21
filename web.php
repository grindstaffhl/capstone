<?php

/*
	--------------------------
	Routes for the website url
	--------------------------
*/


/*
	Routes for the PageController (MAIN pages)
*/
Route::get('/', 'PageController@home'); //home page

Route::get('/skateboard', 'PageController@skateboard');


/*
	Routes for the ONLY SEEING the contents of each database
*/
Route::get('weapons', 'DBController@weapons'); //view weapons database

Route::get('armor', 'DBController@armor'); //view armor database

Route::get('effects', 'DBController@effects'); //view effects database

Route::get('perks', 'DBController@perks'); //view perks database

Route::get('weapons_armor', 'DBController@weapons_armor'); //view weapons_armor database


/*
	Routes for the database SEARCH bars
*/
Route::get('search/weapons', 'SearchController@weaponsSearch'); //search weapons database

Route::get('search/armor', 'SearchController@armorSearch'); //search armor database

Route::get('search/perks', 'SearchController@perkSearch'); //search perk database

Route::get('search/effects', 'SearchController@effectSearch'); //search effect database

Route::get('search/weapons_armor', 'SearchController@weaponsAndArmorSearch'); //search wepaons_armor database





/**
 * Laravel / jQuery AJAX code example
 * See conversation here: http://laravel.io/forum/04-29-2015-people-asking-about-jquery-ajax
 *
 * Drop this code into your App/Http/routes.php file, and go to /ajax/view in your browser
 * Be sure to bring up the JavaScript console by pressing F12.
 */

// This is your View AJAX route - load this in your browser
//Route::get('/ajax/view', 'DBController@jsontest');
//Route::get('/ajax/search/{data}', 'SearchController@jsontestsearch');

// this is your GET AJAX route
// Route::get('/ajax/get', ['middleware' => 'auth', 'uses' => 'DBController@jsontest']);

Route::get('ajax/get', 'PageController@ajaxThings');

// this is your POST AJAX route
Route::post('/ajax/post', function () {

	// pass back some data, along with the original data, just to prove it was received
	$data   = DB::table('skyrim_weapons_armor')
            ->where('name','like', 'Iron Sword')
            ->get();

	// return a JSON response
	return  Response::json($data);
});




Route::get('/ajax/searchitem', function() 
{
	return view('db.JSONtest');
});

Route::get('/ajax/get?name={item}', function($item) 
{
	$weparm = str_replace('+', ' ', $item);

	$search = DB::table('skyrim_weapons_armor')
			->where('name', 'like', $weparm)
			->get();


	//return view('db.JSONtest', compact('search'));
});