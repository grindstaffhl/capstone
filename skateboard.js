var h_steel = {type:"head", weight:"heavy", family:"steel", name:"Steel Helmet", base:17}
var c_steel = {type:"chest", weight:"heavy", family:"steel", name:"Steel Armor", base:31}
var a_steel = {type:"arms", weight:"heavy", family:"steel", name:"Steel Nordic Gauntlets", base:12}
var f_steel = {type:"feet", weight:"heavy", family:"steel", name:"Steel Shin Boots", base:12}
var o_steel = {type:"onehand", family:"steel", name:"Steel Sword", base:8}
var t_steel = {type:"twohand", family:"steel", name:"Steel Greatsword", base:17}

var h_daedric = {type:"head", weight:"heavy", family:"daedric", name:"Daedric Helmet", base:23}
var c_daedric = {type:"chest", weight:"heavy", family:"daedric", name:"Daedric Armor", base:49}
var a_daedric = {type:"arms", weight:"heavy", family:"daedric", name:"Daedric Gauntlets", base:18}
var f_daedric = {type:"feet", weight:"heavy", family:"daedric", name:"Daedric Boots", base:18}
var o_daedric = {type:"onehand", family:"daedric", name:"Daedric Sword", base:14}
var t_daedric = {type:"twohand", family:"daedric", name:"Daedric Greatsword", base:24}

var h_elven = {type:"head", weight:"light", family:"elven", name:"Elven Helmet", base:13}
var c_elven = {type:"chest", weight:"light", family:"elven", name:"Elven Armor", base:29}
var a_elven = {type:"arms", weight:"light", family:"elven", name:"Elven Gauntlets", base:8}
var f_elven = {type:"feet", weight:"light", family:"elven", name:"Elven Boots", base:8}
var o_elven = {type:"onehand", family:"elven", name:"Elven Sword", base:11}
var t_elven = {type:"twohand", family:"elven", name:"Elven Greatsword", base:20}

var h_glass = {type:"head", weight:"light", family:"glass", name:"Glass Helmet", base:16}
var c_glass = {type:"chest", weight:"light", family:"glass", name:"Glass Armor", base:38}
var a_glass = {type:"arms", weight:"light", family:"glass", name:"Glass Gauntlets", base:11}
var f_glass = {type:"feet", weight:"light", family:"glass", name:"Glass Boots", base:11}
var o_glass = {type:"onehand", family:"glass", name:"Glass Sword", base:12}
var t_glass = {type:"twohand", family:"glass", name:"Glass Greatsword", base:21}

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
	window.alert(armoracteff);
	var step1 = basedef + ratbo;
	var step2 = Math.ceil(step1 * (1 + (0.4 * ((armslevel + armoracteff)/100))));
	var step3 = step2 * (1 + unisonperk);
	var step4 = step3 * (1 + matchset);
	var step5 = step4 * (1 + (armorperk/5));
	var steps = (step1 + " " + step2 + " " + step3 + " " + step4 + " " + step5);
	//var steps = (armslevel + " " + armoracteff);
	window.alert(armoracteff);
	window.alert(steps);
	return step5;
	//return(Math.ceil((basedef + ratbo) * (1 + 0.4 * (armslevel + armoracteff)/100))
	//* (1 + unisonperk) * (1 + matchset) * (1 + (armorperk/5)));
}	

function readpage()
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
	
	var family = $('input[name=family]:checked').val();
	var type = $('input[name=type]:checked').val();
	
	var item = (type + "_" + family);
	
	var ratbo = ratingbonus(eval(item).type, qlevel);
	
	var wpndmg = 0;
	var wpnbase = 0;
	var armdef = 0;
	var armbase = 0;
	
	armbase = armordefense(eval(item).base, 0, halvl, 0, 0, 0, haperk);
	armdef = armordefense(eval(item).base, ratbo, halvl, 0, 0, 0, haperk);
	//armbase = armordefense(c_steel.base, 0, halvl, 0, 0, 0, haperk);
	//armdef = armordefense(c_steel.base, ratbo, halvl, 0, 0, 0, haperk);
	
	/*switch(eval(item).type)
	{
		case "onehand":
			wpnbase = weapondamage(eval(item).base, 0, onelvl, oneperk, 0, 0, 0);
			wpndmg = weapondamage(eval(item).base, ratbo, onelvl, oneperk, 0, 0, 0);
			break;
		case "twohand":
			wpnbase = weapondamage(eval(item).base, 0, twolvl, twoperk, 0, 0, 0);
			wpndmg = weapondamage(eval(item).base, ratbo, twolvl, twoperk, 0, 0, 0);
			break;
		default:
			if (eval(item).weight == "light")
			{
				armbase = armordefense(eval(item).base, 0, lalvl, 0, 0, 0, laperk);
				armdef = armordefense(eval(item).base, ratbo, lalvl, 0, 0, 0, laperk);
			}
		    else if (eval(item).weight == "heavy")
			{
				armbase = armordefense(eval(item).base, 0, halvl, 0, 0, 0, haperk);
				armdef = armordefense(eval(item).base, ratbo, halvl, 0, 0, 0, haperk);
			}
			else
			{}
			break;
	}*/
	
	/*var stufftoprint = ("Smithlvl: " + smithlvl + "\nSmith Perk: " + smithperk
	+ "\nOnelvl: " + onelvl + "\nOneperk: " + oneperk + "\nTwolvl: " + twolvl
	+ "\ntwoperk" + twoperk + "\nlalvl: " + lalvl + "\nlaperk: " + laperk + "\nhalvl: " + halvl
	+ "\nhaperk: " + haperk + "\neffskill: " + effskill + "\nqlevel: "
	+ qlevel + "\nratbo: " + ratbo + "\nfamily: " + family + "\ntype: " + type + "\nitem: "
	+ item);*/
	
	
	
	var para = document.getElementById("test");
	para.innerHTML = (halvl + " " + haperk + " " + ratbo + " " + armbase + " " + armdef);
}

// Testing stuff below

var eskill = effectiveskill(98, 1, 0, 0);

var qlvl = qualitylvl(eskill);

var ratbo = ratingbonus(c_steel.type, qlvl);

//var wpndmg = weapondamage(o_steel.base, ratbo, 100, 1, 0, 0, 1);
//var bdmg = weapondamage(o_steel.base, 0, 100, 1, 0, 0, 0.10);
var poopy = "c_steel";


var barm = armordefense(eval(poopy).base, 0, 100, 0, 0, 0, 5);
var armdef = armordefense(eval(poopy).base, ratbo, 100, 0, 0, 0, 5);

//var p = document.getElementById("test");

/*p.innerHTML = (character.name + " making an " + 
sword.name + " with a Smithing Level of " + character.smithlvl + " means an Effective Skill of " + eskill + 
", a Quality Level of " + qlvl + ", base damage being " + barm + " and a Rating Bonus of " + ratbo + 
", making the total defense be " + armdef);
*/
//window.alert(barm + " " + armdef);