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

	wpnslvl = parseInt(wpnslevel);


	var wpndmg = (((basedam + ratbo) * (1 + (wpnslevel/200)) * (1 + (wpnperk * 0.2))
			* (1 + (itemeff/100)) * (1 + (potioneff/100)) * (1 + (seekmight/10))));
	return wpndmg;
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
	armorperk = parseInt(armorperk);
	
	return Math.round((basedef + ratbo) * (1 + 0.4 * (armslevel + armoracteff)/100))
	* (1 + unisonperk) * (1 + matchset) * (1 + (armorperk/5));
}	

function addInput()
{

}

/* Main function that does all the calculations
 * data = array of data that contains key value pairs of form input
 * data[0][0] is json data from database query
 */
function readpage(data)
{
	var smithlvl = parseInt(data['smithlvl']);
	var smithperk = parseInt(data['smithperk']);
	
	var onelvl = parseInt(data['ohlvl']);
	var oneperk = parseInt(data['ohperk']);
	
	var twolvl = parseInt(data['thlvl']);
	var twoperk = parseInt(data['thperk']);
	
	var lalvl = parseInt(data['lalvl']);
	var laperk = parseInt(data['laperk']);
	
	var halvl = parseInt(data['halvl']);
	var haperk = parseInt(data['haperk']);

	var arlvl = parseInt(data['arlvl']);
	var arperk = parseInt(data['arperk']);

	var potiontype = data['potiontype'];
	var potionnum = parseInt(data['potionnum']);
	
	var effskill = effectiveskill(smithlvl, smithperk, 0, 0);
	var qlevel = qualitylvl(effskill);
	
	var ratbo = ratingbonus(data[0][0].type, qlevel);
	
	var baserating,improvedrating = 0;
	var itemname, ratingtype = "";

	// calculates weapon damage or armor defense depending on the item
	switch(data[0][0].type)
	{
		case "One-Handed":
			if (potiontype != "One-Handed")
				potionnum = 0;
			baserating = weapondamage(data[0][0].rating, 0, onelvl, oneperk, 0, potionnum, 0);
			improvedrating = weapondamage(data[0][0].rating, ratbo, onelvl, oneperk, 0, potionnum, 0);
			itemname = "weapon";
			ratingtype = "damage";
			break;
		case "Two-Handed":
			if (potiontype != "Two-Handed")
				potionnum = 0;
			baserating = weapondamage(data[0][0].rating, 0, twolvl, twoperk, 0, potionnum, 0);
			improvedrating = weapondamage(data[0][0].rating, ratbo, twolvl, twoperk, 0, potionnum, 0);
			itemname = "weapon";
			ratingtype = "damage";
			break;
		case "Archery":
			if (potiontype != "Archery")
				potionnum = 0;
			baserating = weapondamage(data[0][0].rating, 0, arlvl, arperk, 0, potionnum, 0);
			improvedrating = weapondamage(data[0][0].rating, ratbo, arlvl, arperk, 0, potionnum, 0);
			break;
		case "Light":
			if (potiontype != "Light")
				potionnum = 0;
			baserating = armordefense(data[0][0].rating, 0, lalvl, potionnum, 0, 0, laperk);
			improvedrating = armordefense(data[0][0].rating, ratbo, lalvl, potionnum, 0, 0, laperk);
			itemname = "armor";
			ratingtype = "defense";
			break;
		case "Heavy":
			if (potiontype != "Heavy")
				potionnum = 0;
			baserating = armordefense(data[0][0].rating, 0, halvl, potionnum, 0, 0, haperk);
			improvedrating = armordefense(data[0][0].rating, ratbo, halvl, potionnum, 0, 0, haperk);
			itemname = "armor";
			ratingtype = "defense";
			break;
		default:
			break;
	}
	
	// adds text to the screen after calculations are done
	 var para = document.getElementById("test");
	para.innerHTML = ("Assuming your character has no active effects, " 
	+ data[0][0].name + "'s base " + ratingtype + " is " + baserating
	+ ". It can be improved to have " + improvedrating + " " + ratingtype + ".");

	//para.innerHTML = data[0][0].rating + " " + baserating + " " + improvedrating + " " + effskill + " " + ratbo;
	//para.innerHTML = potiontype + " " + potionnum;
}