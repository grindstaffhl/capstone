<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/*
    Class is for controlling the search bars
        and search queries.
*/

class SearchController extends Controller
{   
    /*
        Function is for a search bar that
        searches for a name or type in the 
        skyrim_weapons_armor database.
    */
    public function weaponsAndArmorSearch()
    {
        $search = \Request::get('search'); //get the value from the search box
     
        $weapArmor = DB::table('skyrim_weapons_armor')
            ->where('name','like','%'.$search.'%')
             ->orWhere('type','like','%'.$search.'%')
            ->get(); //sql query
     
        return view('searchBar.weapons_armorSearch',compact('weapArmor')); //look at the searchBar/perkSearch.blade.php file
        //armor is the name of the variable that has the sql query result
    }
}
