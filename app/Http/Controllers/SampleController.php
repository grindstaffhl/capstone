<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SampleController extends Controller
{
    /**

     * Function ajaxRequest() is for the scooter website
     *

     * @return db/JSONtest.blade.php

     */

    public function ajaxRequest()

    {

        return view('db.JSONtest'); // db/JSONtest.blade.php

    }

    /**

     * Function ajaxRequestPost() is for when the ajaxRequest()
        will do a POST from the database when the user clicks submit
     *
     * @return the input from the user's textboxes

     */

    public function ajaxRequestPost()

    {
        //Requests the input from the textboxes
        $headname = request()->input('headname'); //name of the item
        $chestname = request()->input('chestname');
        $handsname = request()->input('handsname');
        $bootsname = request()->input('bootsname');
        $shieldname = request()->input('shieldname');
        $weaponname = request()->input('weaponname');

        $smithlvl = request()->input('smithlvl'); //smithing level
        $smithperk = request()->input('smithperk'); //smithing perk

        //requesting all of the inputs from above in an array
        $input = request()->all();

        //get name from the skyrim_weapons_armor database
        $headsearch = DB::table('skyrim_weapons_armor')
			->where('name', 'like', $headname)
			->get();

        $chestsearch = DB::table('skyrim_weapons_armor')
            ->where('name', 'like', $chestname)
            ->get();

        $handssearch = DB::table('skyrim_weapons_armor')
            ->where('name', 'like', $handsname)
            ->get();
            
        $bootssearch = DB::table('skyrim_weapons_armor')
            ->where('name', 'like', $bootsname)
            ->get();

        $shieldsearch = DB::table('skyrim_weapons_armor')
            ->where('name', 'like', $shieldname)
            ->get();

        $weaponsearch = DB::table('skyrim_weapons_armor')
            ->where('name', 'like', $weaponname)
            ->get();    

        //decoding the search sql query to json
        //$jsonstuff = response()->json($search);
        $jshead = json_decode($headsearch);
        $jschest = json_decode($chestsearch);
        $jshands = json_decode($handssearch);
        $jsboots = json_decode($bootssearch);
        $jsshield = json_decode($shieldsearch);
        $jsweapon = json_decode($weaponsearch);

        array_push($input, $jshead, $jschest, $jshands, $jsboots, $jsshield, $jsweapon); //putting the input and json encodning of sql query on array
        //return $input;

        return $input;
    }
}
