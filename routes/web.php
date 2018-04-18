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


/*
	Routes for the ONLY SEEING the contents of each database
*/

Route::get('weapons_armor', 'DBController@viewWeaponsArmor'); //view weapons_armor database


/*
	Routes for the database SEARCH bars
*/

Route::get('search', 'SearchController@weaponsAndArmorSearch'); //search wepaons_armor database

/*
	Routes for the current working website.
	Uses ajax requests to get things from the database.
*/
Route::get('home', 'PageController@ajaxRequest');
Route::post('home', 'PageController@ajaxRequestPost');