@extends('layout')

@section('content')

<div class='container'>
    <h1> Skyrim Combat Skills Planner </h1>
    <br><br>

<p>
	This calculator is used to plan your character's combat skills: Smithing,
	Light Armor, Heavy Armor, One-Handed, Two-Handed, Block, and Archery.
	You will be able to input any items in the game and view the base
	rating and improved rating of said item based on your combat skill and
	perk levels. You can also view the database of items and search for the
	name of the item you wish to improve. You will also be able to add
	potions and effects to your improvement calculation. At the bottom of the
	calculations page, you will be able to view the "equipped" armor, weapon,
	and shield to view the total armor defense.
</p>
<br>
	<h3 style="text-align: center;"> DISCLAIMER </h3>
<p>
	We do not own or claim to own any rights to The Elder Scrolls V: Skyrim. 
	The Skyrim Combat Skills Calculator is an estimation. Each item has a
	standard deviation of +/- 3. Likewise, you will be able to add potions
	and effects into your formula. It is important to note that potions 
	do not stack, but instead overwrite each other and take
	the greater of the effects- no matter the order of consumption. With
	this in mind, have fun and Fus Ro Dah!
</p>

<br>
 <!-- button opens url to the skyrim calculator -->
<button style="margin: 0 auto;" onclick="window.location='/home';">
     Plan Character</button>

</div>
@stop	