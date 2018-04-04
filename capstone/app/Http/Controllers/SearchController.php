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
            goes searches for a name or type in the 
            skyrim_weapons database.
    */
	public function weaponsSearch()
    {
        $search = \Request::get('search'); //get the value from the search box
     
        $weapons = DB::table('skyrim_weapons')
            ->where('name','like','%'.$search.'%')
            ->orWhere('type','like','%'.$search.'%')
            ->get(); //sql query
     
        return view('searchBar.weaponSearch',compact('weapons')); //look at the searchBar/weaponSearch.blade.php file
        //weapons is the name of the variable that has the database
    }

    /*
        Function is for a search bar that
            searches for a name or type in the 
            skyrim_armor database.
    */
    public function armorSearch()
    {
        $search = \Request::get('search'); //get the value from the search box
     
        $armor = DB::table('skyrim_armor')
            ->where('name','like','%'.$search.'%')
            ->orWhere('type','like','%'.$search.'%')
            ->get(); //sql query
     
        return view('searchBar.armorSearch',compact('armor')); //look at the searchBar/armorSearch.blade.php file
        //armor is the name of the variable that has the sql query result
    }

    /*
        Function is for a search bar that
            searches for a name or type in the 
            skyrim_perks database.
    */
    public function perkSearch()
    {
        $search = \Request::get('search'); //get the value from the search box
     
        $perk = DB::table('skyrim_perks')
            ->where('perk','like','%'.$search.'%')
            ->orWhere('tree','like','%'.$search.'%')
            ->get(); //sql query
     
        return view('searchBar.perkSearch',compact('perk')); //look at the searchBar/perkSearch.blade.php file
        //armor is the name of the variable that has the sql query result
    }

    /*
        Function is for a search bar that
            searches for a name or type in the 
            skyrim_effects database.
    */
    public function effectSearch()
    {
        $search = \Request::get('search'); //get the value from the search box
     
        $effect = DB::table('skyrim_effects')
            ->where('effect','like','%'.$search.'%')
            ->get(); //sql query
     
        return view('searchBar.effectSearch',compact('effect')); //look at the searchBar/perkSearch.blade.php file
        //armor is the name of the variable that has the sql query result
    }

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

    public function jsontestsearch() 
    {
        $search = \Request::get('search');

        return view('db.JSONtest');
    }
}
