var head = {type:"armor", name:"Iron Helmet", base:15, value:60}
var chest = {type:"carmor", name:"Daedric Armor", base:41, value:125}
var arms = {type:"armor", name:"Iron Gauntlets", base:10, value:25}
var feet = {type:"armor", name:"Iron Boots", base:10, value:25}
var sword = {type:"weapon", name:"Iron Sword", base:27, value:25}
var character = {name:"bob", smithlvl: 98, smithperk:0, ench:0, pot:50}

function effectiveskill(baseskill, perk, enchantments, potions)
{
	//"perk" will be 1 if you have the relevant smithing perk, 0 if not
	// ex: improving elven armor when you have the Elven Smithing perk
	return (baseskill - 13.29) * (1 + perk) * (1 + (enchantments/100)) * 
			(1 + (potions/100)) + 13.29;
}

function qualitylvl(effskill)
{
	return ((effskill + 38) * (3/103));
}

function ratingbonus(type, qlevel)
{
	rbo = (3.6 * qlevel - 1.6);
	if (type == "carmor")
		return Math.ceil(rbo);
	else
		return Math.ceil(rbo/2);
}

function weapondamage(basedam, wpnsmithbonus, wpnslevel, wpnperkeff, itemeffects, poteff, seekmight)
{
	return ((basedam + wpnsmithbonus) * (1 + (wpnslevel/200)) * (1 + wpnperkeff)
			* (1 + itemeffects) * (1 + (poteff/100)) * (1 + seekmight));
}

function armordefense(basedef, itemquality, aslevel, armoracteff, unisonperk, matchset, armorperk)
{
	return (Math.ceil((basedef + itemquality) * (1 + 0.4 * ((aslevel + armoracteff)/100)))
			* (1 + unisonperk) * (1 + matchset) * (1 + armorperk));
}	

var eskill = effectiveskill(character.smithlvl, character.smithperk, character.ench, character.pot);

var qlvl = qualitylvl(eskill);

var ratbo = ratingbonus(chest.type, qlvl);

var wpndmg = weapondamage(sword.base, ratbo, 100, 1, 0, 0, 1);
var bdmg = weapondamage(sword.base, 0, 100, 1, 0, 0, 0.10);

var armdef = armordefense(chest.base, ratbo, 100, 0, 0, 0, 1);
var barm = armordefense(chest.base, 0, 100, 0, 0, 0, 1);

var p = document.getElementById("test");

//p.innerHTML = "I changed this in javascript!"

p.innerHTML = (character.name + " making an " + 
sword.name + " with a Smithing Level of " + character.smithlvl + " means an Effective Skill of " + eskill + 
", a Quality Level of " + qlvl + ", base damage being " + barm + " and a Rating Bonus of " + ratbo + ", making the total defense be " + armdef);


//p.innerHTML = effectiveskill(character.smithlvl, character.smithperk, character.ench, character.pot);