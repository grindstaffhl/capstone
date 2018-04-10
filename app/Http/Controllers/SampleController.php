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
        $name = request()->input('name'); //name of the item
        $smithlvl = request()->input('smithlvl'); //smithing level
        $smithperk = request()->input('smithperk'); //smithing perk

        //requesting all of the inputs from above in an array
        $input = request()->all();

        //get name from the skyrim_weapons_armor database
        $search = DB::table('skyrim_weapons_armor')
			->where('name', 'like', $name)
			->get();

        //decoding the search sql query to json
        $jsonstuff = response()->json($search);
        $js = json_decode($search);
        array_push($input, $js); //putting the input and json encodning of sql query on array
        //return $input;

        return $input;
    }
}
