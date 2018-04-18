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
        Has the disclaimer and button that
            goes to the calculator

        - returns the view welcome.blade.php
    */
    public function home()
    {
        return view('welcome'); //welcome.blade.php
    }

    /*
    *   Function ajaxRequest() is for the scooter website
    *
    *   - returns db/JSONtest.blade.php
    */
    public function ajaxRequest()
    {
        return view('db.CreateForms'); // db/JSONtest.blade.php
    }

    /*
    * Function ajaxRequestPost() is for when the ajaxRequest()
        will do a POST from the database when the user clicks submit
    *
    * - returns the input from the user's textboxes
    */
    public function ajaxRequestPost()
    {
        $names = request()->input('names');
        $parts = request()->input('parts');

        $smithlvl = request()->input('smithlvl'); //smithing level
        $smithperk = request()->input('smithperk'); //smithing perk

        //requesting all of the inputs from above in an array
        $input = request()->all();

        $items = [];

        for ($i = 0; $i < sizeof($names); $i++)
        {
            //get name from the skyrim_weapons_armor database
            $items[] = DB::table('skyrim_weapons_armor')
                 ->where('name', 'like', $names[$i])
                 ->get();
        }
        
        $array['names'] = $items;
        $array['input'] = $input;
        return $array;
    }

}