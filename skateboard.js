var head = {type:"armor", name:"Iron Helmet", base:15, value:60}
var chest = {type:"armor", name:"Iron Armor", base:25, value:125}
var arms = {type:"armor", name:"Iron Gauntlets", base:10, value:25}
var feet = {type:"armor", name:"Iron Boots", base:10, value:25}
var sword = {type:"weapon", name:"Iron Sword", base:15, value:25}
var character = {name:"Athena", smithlvl: 98, smithperk:1, ench:0, pot:0}

function effectiveskill(baseskill, perk, enchantments, potions)
{
	//"perk" will be 1 if you have the relevant smithing perk, 0 if not
	// ex: improving elven armor when you have the Elven Smithing perk
	return ((baseskill - 13.29) * (1 + perk) * (1 + (enchantments/100)) * (1 + (potions/100)) + 13.29);
}


function qualitylvl(effskill)
{
	qlevel = (effskill + 38) * (3/103);
	return Math.floor(qlevel);
}

function ratingbonus(type, qlevel)
{
	if (this.type == "armor")
		return Math.ceil(3.6 * qlevel - 1.6);
	else
		return Math.ceil(1.8 * qlevel - 1.6);
}


var eskill = effectiveskill(character.smithlvl, character.smithperk, character.ench, character.pot);

var qlvl = qualitylvl(eskill);

var ratbo = ratingbonus(sword.type, qlvl);

var p = document.getElementById("test");

//sword.base = Math.floor(sword.base + (100 * 0.005));

//p.innerHTML = "I changed this in javascript!"

p.innerHTML = (character.name + " making an " + 
sword.name + " with a Smithing Level of " + character.smithlvl + " means an Effective Skill of " + eskill + 
", a Quality Level of " + qlvl + " and a Rating Bonus of " + ratbo + ", making the total damage be " + (ratbo + sword.base));


//p.innerHTML = effectiveskill(character.smithlvl, character.smithperk, character.ench, character.pot);