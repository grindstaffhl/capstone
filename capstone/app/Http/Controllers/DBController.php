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
		Views the contents of skyrim_weapons database

		-returns the db/weapons.blade.php view
	*/
     public function weapons()
    {
    	$weapon = DB::table('skyrim_weapons')->get(); //gets the contents of the database
        return view('db.weapons', compact('weapon')); //sends the information of the contents to the view
    }

    /*
		Views the contents of skyrim_armor database

		-returns the db/armor.blade.php biew
	*/
    public function armor()
    {
    	$arms = DB::table('skyrim_armor')->get();
        return view('db.armor', compact('arms'));
    }

    /*
		Views the contents of skyrim_effects database

		-returns the db/effects.blade.php biew
	*/
    public function effects()
    {
    	$effect = DB::table('skyrim_effects')->get();
        return view('db.effects', compact('effect'));
    }

    /*
		Views the contents of skyrim_perks database

		-returns the db/perks.blade.php biew
	*/
    public function perks()
    {
    	$perk = DB::table('skyrim_perks')->get();
        return view('db.perks', compact('perk'));
    }

    /*
		Views the contents of skyrim_weapons_armor database

		-returns the db/weapons_armor.blade.php biew
	*/
	public function weapons_armor()
	{
		$weaponsAndArmor = DB::table('skyrim_weapons_armor')->get();
        return view('db.weapons_armor', compact('weaponsAndArmor'));
    }

    public function jsontest(Request $request)
    {
        $name = $request->input('name');

        $data   = DB::table('skyrim_weapons_armor')
            ->where('name','like', $name)
            ->get();

    // return a JSON response
    return Response::json($data);
    }

}
