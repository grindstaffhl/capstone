<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/*
	This class is for controlling the MAIN pages
		of the website.
*/

class PageController extends Controller
{
	/*
		Home page for the website.

		- returns the view welcome.blade.php
	*/
    public function home()
    {
    	return view('welcome'); //welcome.blade.php
    }

    public function skateboard()
    {
    	return view('skateboard'); //skateboard.blade.php
    }

    /* for ajax things to work
    */
    public function ajaxThings()
    {
        $search = \Request::get('search'); 

        $data   = DB::table('skyrim_weapons_armor')
            ->where('name','like', ''.$search.'')
            ->get();

        // return a JSON response
        return view('db.JSONtest', compact('data'));
    }
}
