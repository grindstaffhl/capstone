<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/*
	This class is for ONLY viewing the contents of the database.
		These functions solely display the contents of each respective database.
*/

class DBController extends Controller
{
    /*
		Views the contents of skyrim_weapons_armor database

		-returns the db/weapons_armor.blade.php biew
	*/
	public function ascendName()
	{
		$weaponsAndArmor = DB::table('skyrim_weapons_armor')->get();
        return view('db.weapons_armor', compact('weaponsAndArmor'));
    }

    /*
        Views the contents of skyrim_weapons_armor database

        -returns the db/weapons_armor.blade.php biew
    */
    public function descendName()
    {
        $weaponsAndArmor = DB::table('skyrim_weapons_armor')->get();
        return view('db.weapons_armor', compact('weaponsAndArmor'));
    }

    /*
        Views the contents of skyrim_weapons_armor database

        -returns the db/weapons_armor.blade.php biew
    */
    public function ascendRating()
    {
        $weaponsAndArmor = DB::table('skyrim_weapons_armor')->get();
        return view('db.weapons_armor', compact('weaponsAndArmor'));
    }

    /*
        Views the contents of skyrim_weapons_armor database

        -returns the db/weapons_armor.blade.php biew
    */
    public function descendRating()
    {
        $weaponsAndArmor = DB::table('skyrim_weapons_armor')->get();
        return view('db.weapons_armor', compact('weaponsAndArmor'));
    }
}
