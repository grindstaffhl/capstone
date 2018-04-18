$(document).ready(function()
{
	// set up jQuery with the CSRF token, or else post routes will fail
	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

	// handlers
	function onGetClick(event)
	{
		// we're not passing any data with the get route, though you can if you want
		$.get('/ajax/search/{data}', onSuccess);
	}

	function onPostClick(event)
	{
		// we're passing data with the post route, as this is more normal
		$.post('/ajax/post', {payload:'hello'}, onSuccess);
	}

	function onSuccess(data, status, xhr)
	{
		// with our success handler, we're just logging the data...
		// console.log(data, status, xhr);

	    // but you can do something with it if you like - the JSON is deserialised into an object
		// console.log(String(data.value).toUpperCase())
		//var readdata = data[0];
		readpage(data[0]);
	}

	// listeners
	$('button#get').on('click', onGetClick);
	$('button#post').on('click', onPostClick);
});
/* 
 * Finds your effective skill for smithing
 * baseskill = skill in smithing tree
 * perk = 1 if you have relevent smithing perk, 0 if not
 * enchantments = value of total enchantments ex: 2 10% fortify smithing would give value of "20"
 * potions = works like enchantments except for fortify smithing potions
 */
function effectiveskill(baseskill, perk, enchantments, potions)
{
	return (baseskill - 13.29) * (1 + perk) * (1 + (enchantments/100)) * 
			(1 + (potions/100)) + 13.29;
}

/* 
 * Determines quality level of improved armor or weapon
 * Should round down but sometimes messes up???
 * effskill = value returned by effectiveskill method
 */
function qualitylvl(effskill)
{
	return Math.floor((effskill + 38) * (3/103));
}

/*
 * Finds how much dmg/def to add to item depending on quality level
 * part = what body part of armor or weapon, non chest pieces and weapons get half bonus
 */
function ratingbonus(part, qlevel)
{
	rbo = (3.6 * qlevel - 1.6);
	if (part == "chest")
		return Math.ceil(rbo);
	else
		return Math.ceil(rbo/2);
}
/*
 * Finds weapon rating
 * basedam = base damage of weapon
 * ratbo = rating bonus of improved weapon, 0 if unimproved weapon
 * wpnslevel = one handed or two handed skill level
 * wpnperk = perk bonus for relevant tree, 0 to 5 (onehanded = Armsman, twohanded = Barbarian)
 * itemeff = enhancements/active effects that increase one or two handed
 * potioneff = potion effects that increase one or two handed
 * seekmight = 1 if Seeker of Might is active, 0 if not
 * 
 */
function weapondamage(basedam, ratbo, wpnslevel, wpnperk, itemeff, potioneff, seekmight)
{
	return ((basedam + ratbo) * (1 + (wpnslevel/200)) * (1 + (wpnperk * 0.2))
			* (1 + (itemeff/100)) * (1 + (potioneff/100)) * (1 + (seekmight/10)));
}
/* 
 * basedef = base defense of armor
 * ratbo = rating bonus of improved armor, 0 if unimproved armor
 * armslevel = heavy armor or light armor skill level
 * armoracteff = enhancements/active effects that increase heavy or light armor
 * unisonperk = 1 if unison perk active, 0 if not (Well Fitted = heavy, Custom Fit = light)
 * matchset = 1 if Matching Set perk active, 0 if not
 * armorperk = perk bonus for relevant tree, from 0 to 5 (Juggernaut = heavy, Agile Defender = light)
 */
function armordefense(basedef, ratbo, armslevel, armoracteff, unisonperk, matchset, armorperk)
{
	armslevel = parseInt(armslevel);
	armoracteff = parseInt(armoracteff);
	
	return(Math.ceil((basedef + ratbo) * (1 + 0.4 * (armslevel + armoracteff)/100))
	* (1 + unisonperk) * (1 + matchset) * (1 + (armorperk/5)));
}	

function readpage(data)
{
	var smithlvl = document.getElementById("smithlvl").value;
	var smithperk = 0;
	var smithperkbox = document.getElementById("smithperk");
	if (smithperkbox.checked)
		smithperk = 1;
	
	var onelvl = document.getElementById("ohlvl").value;
	var oneperk = document.getElementById("ohperk").value;
	
	var twolvl = document.getElementById("thlvl").value;
	var twoperk = document.getElementById("thperk").value;
	
	var lalvl = document.getElementById("lalvl").value;
	var laperk = document.getElementById("laperk").value;
	
	var halvl = document.getElementById("halvl").value;
	var haperk = document.getElementById("haperk").value;
	
	
	var effskill = effectiveskill(smithlvl, smithperk, 0, 0);
	var qlevel = qualitylvl(effskill);
	
	var ratbo = ratingbonus(data.type, qlevel);
	
	var baserating,improvedrating = 0;
	var itemname, ratingtype = "";
	
	switch(data.type)
	{
		case "One-Handed":
			baserating = weapondamage(data.rating, 0, onelvl, oneperk, 0, 0, 0);
			improvedrating = weapondamage(data.rating, ratbo, onelvl, oneperk, 0, 0, 0);
			itemname = "weapon";
			ratingtype = "damage";
			break;
		case "Two-Handed":
			baserating = weapondamage(data.rating, 0, twolvl, twoperk, 0, 0, 0);
			improvedrating = weapondamage(data.rating, ratbo, twolvl, twoperk, 0, 0, 0);
			itemname = "weapon";
			ratingtype = "damage";
			break;
		case "Light":
			baserating = armordefense(data.rating, 0, lalvl, 0, 0, 0, laperk);
			improvedrating = armordefense(data.rating, ratbo, lalvl, 0, 0, 0, laperk);
			itemname = "armor";
			ratingtype = "defense";
			break;
		case "Heavy":
			baserating = armordefense(data.rating, 0, halvl, 0, 0, 0, haperk);
			improvedrating = armordefense(data.rating, ratbo, halvl, 0, 0, 0, haperk);
			itemname = "armor";
			ratingtype = "defense";
			break;
		default:
			break;
	}
	
	var para = document.getElementById("test");
	para.innerHTML = ("Assuming your character has no active effects," 
	+ data.name + "'s base " + ratingtype + " is " + baserating
	+ ". It can be improved to have " + improvedrating + " " + ratingtype + ".");
}