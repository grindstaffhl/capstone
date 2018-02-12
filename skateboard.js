var h_steel = {part:"head", type: "heavy", name:"Steel Helmet", base:17}
var c_steel = {part:"chest", type: "heavy",  name:"Steel Armor", base:31}
var a_steel = {part:"arms", type: "heavy",  name:"Steel Nordic Gauntlets", base:12}
var f_steel = {part:"feet", type: "heavy",  name:"Steel Shin Boots", base:12}
var o_steel = {type:"onehand", name:"Steel Sword", base:8}
var t_steel = {type:"twohand", name:"Steel Greatsword", base:17}

var h_daedric = {part:"head", type:"heavy", name:"Daedric Helmet", base:23}
var c_daedric = {part:"chest", type:"heavy", name:"Daedric Armor", base:49}
var a_daedric = {part:"arms", type:"heavy", name:"Daedric Gauntlets", base:18}
var f_daedric = {part:"feet", type:"heavy", name:"Daedric Boots", base:18}
var o_daedric = {type:"onehand", name:"Daedric Sword", base:14}
var t_daedric = {type:"twohand", name:"Daedric Greatsword", base:24}

var h_elven = {part:"head", type:"light", name:"Elven Helmet", base:13}
var c_elven = {part:"chest", type:"light", name:"Elven Armor", base:29}
var a_elven = {part:"arms", type:"light", name:"Elven Gauntlets", base:8}
var f_elven = {part:"feet", type:"light", name:"Elven Boots", base:8}
var o_elven = {type:"onehand", name:"Elven Sword", base:11}
var t_elven = {type:"twohand", name:"Elven Greatsword", base:20}

var h_glass = {part:"head", type:"light", name:"Glass Helmet", base:16}
var c_glass = {part:"chest", type:"light", name:"Glass Armor", base:38}
var a_glass = {part:"arms", type:"light", name:"Glass Gauntlets", base:11}
var f_glass = {part:"feet", type:"light", name:"Glass Boots", base:11}
var o_glass = {type:"onehand", name:"Glass Sword", base:12}
var t_glass = {type:"twohand", name:"Glass Greatsword", base:21}

var character = {name:"bob", smithlvl: 98, smithperk:0, ench:0, pot:50}

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
	if (part == "carmor")
		return Math.ceil(rbo);
	else
		return Math.ceil(rbo/2);
}
/*
 * Finds weapon rating
 * basedam = base damage of weapon
 * ratbo = rating bonus of improved weapon, 0 if unimproved weapon
 * wpnslevel = one handed or two handed skill level
 * wpnperk = perk bonus for relevant tree (onehanded = Armsman, twohanded = Barbarian)
 * itemeff = enhancements/active effects that increase one or two handed
 * potioneff = potion effects that increase one or two handed
 * seekmight = 1 if Seeker of Might is active, 0 if not
 * 
 */
function weapondamage(basedam, ratbo, wpnslevel, wpnperk, itemeffects, potioneff, seekmight)
{
	return ((basedam + ratbo) * (1 + (wpnslevel/200)) * (1 + wpnperk)
			* (1 + (itemeff/100)) * (1 + (potioneff/100)) * (seekmight * 1.10));
}
/* 
 * basedef = base defense of armor
 * ratbo = rating bonus of improved armor, 0 if unimproved armor
 * armslevel = heavy armor or light armor skill level
 * armoracteff = enhancements/active effects that increase heavy or light armor
 * unisonperk = 1 if unison perk active, 0 if not (Well Fitted = heavy, Custom Fit = light)
 * matchset = 1 if Matching Set perk active, 0 if not
 * armorperk = 1 if armor perk active, 0 if not (Juggernaut = heavy, Agile Defender = light)
 */
function armordefense(basedef, ratbo, armslevel, armoracteff, unisonperk, matchset, armorperk)
{
	return (Math.ceil((basedef + ratbo) * (1 + 0.4 * ((armslevel + armoracteff)/100)))
			* (1 + unisonperk) * (1 + matchset) * (1 + armorperk));
}	

// Testing stuff below
var eskill = effectiveskill(character.smithlvl, character.smithperk, character.ench, character.pot);

var qlvl = qualitylvl(eskill);

var ratbo = ratingbonus(chest.part, qlvl);

var wpndmg = weapondamage(sword.base, ratbo, 100, 1, 0, 0, 1);
var bdmg = weapondamage(sword.base, 0, 100, 1, 0, 0, 0.10);

var armdef = armordefense(chest.base, ratbo, 100, 0, 0, 0, 1);
var barm = armordefense(chest.base, 0, 100, 0, 0, 0, 1);

var p = document.getElementById("test");

p.innerHTML = (character.name + " making an " + 
sword.name + " with a Smithing Level of " + character.smithlvl + " means an Effective Skill of " + eskill + 
", a Quality Level of " + qlvl + ", base damage being " + barm + " and a Rating Bonus of " + ratbo + 
", making the total defense be " + armdef);