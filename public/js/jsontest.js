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
	//return ((effskill + 38) * (3/103));
}

/*
 * Finds how much dmg/def to add to item depending on quality level
 * part = what body part of armor or weapon, non chest pieces and weapons get half bonus
 */
function ratingbonus(part, qlevel)
{
	rbo = (3.6 * qlevel - 1.6);
	if (part == "Chest")
		return Math.ceil(rbo);
	else
		return Math.ceil(rbo/2);
}

var formnum = 0;
var skilltrees = ['Smithing', 'One-Handed', 'Two-Handed', 'Archery',
					'Light Armor', 'Heavy Armor'];

function makePotionForm()
{
	formnum++;


	var potionform = document.getElementById('potionform');

	var typelabel = document.createElement('label');
	typelabel.setAttribute('for', 'potiontype' + formnum);
	typelabel.innerHTML = 'Potion Type:';

	var potiontype = document.createElement('select');
	potiontype.setAttribute('id', 'potiontype' + formnum);
	
	for (var i = 0; i < skilltrees.length; i++)
	{
		var option = document.createElement('option');
		option.value = skilltrees[i];
		option.text = skilltrees[i];
		potiontype.appendChild(option);
	}

	var br = document.createElement('br');

	var effectlabel = document.createElement('label');
	effectlabel.setAttribute('for', 'potioneffect' + formnum);
	effectlabel.innerHTML = 'Potion Effect (%):';

	var potioneffect = document.createElement('input');
	potioneffect.setAttribute('id', 'potioneffect' + formnum);
	potioneffect.setAttribute('type', 'number');

	potionform.appendChild(typelabel);
	potionform.appendChild(potiontype);
	potionform.appendChild(br);
	potionform.appendChild(effectlabel);
	potionform.appendChild(potioneffect);
	potionform.appendChild(br);
	potionform.appendChild(br);
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
	return Math.round(wpndmg);
	//return wpndmg;
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
	basedef = parseInt(basedef);
	ratbo = parseInt(ratbo);
	armslevel = parseInt(armslevel);
	armoracteff = parseInt(armoracteff);
	unisonperk = parseInt(unisonperk);
	armorperk = parseInt(armorperk);
	
	return Math.floor((basedef + ratbo) * (1 + 0.4 * (armslevel + armoracteff)/100))
	* (1 + unisonperk) * (1 + matchset) * (1 + (armorperk/5));
}	

/* 
 * basedef = base defense of shield
 * ratbo = rating bonus of improved shield, 0 if unimproved shield
 * armslevel = block skill level
 * armorperk = perk bonus for relevant tree, from 0 to 5 (Shield Wall)
 * itemeff = enhancements/active effects that increase blocking
 * potioneff = potion effects that increase blocking
 * seekmight = 1 if Seeker of Might is active, 0 if not
 */
function shielddefense(basedef, ratbo, shieldlevel, shieldperk, itemeff, potioneff, seekmight)
{
	shieldlevel = parseInt(shieldlevel);
	shieldperk = parseInt(shieldperk);

	var block = (((basedef + ratbo) * (1 + (shieldlevel/100)) * (1 + (shieldperk * 0.2))
			* (1 + (itemeff/100)) * (1 + (potioneff/100)) * (1 + (seekmight/10))));

	return Math.ceil(block);
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

	var bllvl = parseInt(data['bllvl']);
	var blperk = parseInt(data['blperk']);
	
	var potions = {'Smithing': 0, 'One-Handed': 0, 'Two-Handed': 0, 'Archery': 0, 'Light': 0, 'Heavy': 0};

	for (var i = 1; i <= formnum; i++)
	{
		var key = document.getElementById('potiontype' + i);

		var val = document.getElementById('potioneffect' + i);

		potions[key.value] = parseInt(val.value);

		console.log(potions);
	}

	

	var effskill = effectiveskill(smithlvl, smithperk, 0, potions['Smithing']);
	var qlevel = qualitylvl(effskill);
	
	var ratbo = ratingbonus(data[0][0].part, qlevel);
	
	var baserating,improvedrating = 0;
	var itemname, ratingtype = "";

	// calculates weapon damage or armor defense depending on the item
	switch(data[0][0].type)
	{
		case "One-Handed":
			baserating = weapondamage(data[0][0].rating, 0, onelvl, oneperk, 0, potions['One-Handed'], 0);
			improvedrating = weapondamage(data[0][0].rating, ratbo, onelvl, oneperk, 0, potions['One-Handed'], 0);
			itemname = "weapon";
			ratingtype = "damage";
			break;
		case "Two-Handed":
			baserating = weapondamage(data[0][0].rating, 0, twolvl, twoperk, 0, potions['Two-Handed'], 0);
			improvedrating = weapondamage(data[0][0].rating, ratbo, twolvl, twoperk, 0, potions['Two-Handed'], 0);
			itemname = "weapon";
			ratingtype = "damage";
			break;
		case "Archery":
			baserating = weapondamage(data[0][0].rating, 0, arlvl, arperk, 0, potions['Archery'], 0);
			improvedrating = weapondamage(data[0][0].rating, ratbo, arlvl, arperk, 0, potions['Archery'], 0);
			break;
		case "Light":
			if(data[0][0].part == "Shield")
			{
				baserating = shielddefense(data[0][0].rating, 0, bllvl, blperk, 0, 0, 0);
				improvedrating = shielddefense(data[0][0].rating, ratbo, bllvl, blperk, 0, 0, 0);
				itemname = "armor";
				ratingtype = "defense";
				break;
			} 
			else
			{
				baserating = armordefense(data[0][0].rating, 0, lalvl, 0, 0, 0, laperk);
				improvedrating = armordefense(data[0][0].rating, ratbo, lalvl, 0, 0, 0, laperk);
				itemname = "armor";
				ratingtype = "defense";
				break;
			}
		case "Heavy":
			if(data[0][0].part == "Shield")
			{
				baserating = shielddefense(data[0][0].rating, 0, bllvl, blperk, 0, 0, 0);
				improvedrating = shielddefense(data[0][0].rating, ratbo, bllvl, blperk, 0, 0, 0);
				itemname = "armor";
				ratingtype = "defense";
				break;
			} 
			else
			{
				baserating = armordefense(data[0][0].rating, 0, halvl, 0, 0, 0, haperk);
				improvedrating = armordefense(data[0][0].rating, ratbo, halvl, 0, 0, 0, haperk);
				itemname = "armor";
				ratingtype = "defense";
				break;
			}
		default:
			break;
	}
	
	// adds text to the screen after calculations are done
	var para = document.getElementById("test");
	para.innerHTML = ("Assuming your character has no active effects, " 
	+ data[0][0].name + "'s base " + ratingtype + " is " + baserating
	+ ". It can be improved to have " + improvedrating + " " + ratingtype + ".");
	

	//para.innerHTML = bllvl + " " + blperk;

	//para.innerHTML = data[0][0].rating + " " + baserating + " " + improvedrating + " " + effskill + " " + ratbo;

}