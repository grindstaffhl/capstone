<?php

/*
	--------------------------
	Routes for the website url
	--------------------------
*/


/*
	Routes for the PageController (MAIN pages)
*/
Route::get('home', 'PageController@home'); //home page


/*
	Routes for the ONLY SEEING the contents of each database
*/

Route::get('weapons_armor', 'DBController@ascendName'); //view weapons_armor database


/*
	Routes for the database SEARCH bars
*/

Route::get('search/weapons_armor', 'SearchController@weaponsAndArmorSearch'); //search wepaons_armor database

/*
	Routes for the current working website.
	Uses ajax requests to get things from the database.
*/
Route::get('/', 'SampleController@ajaxRequest');

Route::post('/', 'SampleController@ajaxRequestPost');