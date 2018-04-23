/*
*****************************************************
| 	CREATED BY: Hayden Grindstaff and Megan Petruso |
|	DATE: 4/18/2018									|
|	SKYRIM COMBAT SKILLS CHARACTER PLANNER			|
|	CAPSTONE PROJECT 2018							|
*****************************************************
	This file runs all calculations and validations
	for the items input into the forms.
*/

/* GLOBAL VARIABLES*/

var potionnum = 0; //number of potions
var effectnum = 0; //number of effects
var itemnum = 1; //number of item inputs
var skilltrees = ['Smithing', 'One-Handed', 'Two-Handed', 'Archery',
					'Light', 'Heavy']; //array of the different skill trees
var parts = ['Head', 'Chest', 'Hands', 'Feet', 'Shield', 'Weapon']; //array of the different parts associated with items in DB

var listPotions = []; //list of all the potions the user added to equation
var listEffects = []; //list of all the effects the user added to equation

/* GLOBAL VARIABLES*/


/* 
 * Finds your effective skill for smithing
 * baseskill = skill in smithing tree
 * perk = 1 if you have relevent smithing perk, 0 if not
 * enchantments = value of total enchantments ex: 2 10% fortify smithing would give value of "20"
 * potions = works like enchantments except for fortify smithing potions
 */
function effectiveskill(baseskill, perk, enchantments, potions)
{	
	return ((baseskill - 13.29) * (1 + perk) * (1 + (enchantments/100)) * 
			(1 + (potions/100)) + 13.29);
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
 * qlevel = quality level calculated by the qualitylvl() function
 */
function ratingbonus(part, qlevel)
{
	rbo = (3.6 * qlevel - 1.6);
	if (part == "Chest")
		return Math.ceil(rbo);
	else
		return Math.ceil(rbo/2);
}

/*
	Creates potions everytime the user clicks "Add Potion" button
	Adds potions to a list in order to validate the input of them later
	Keeps track of the number of potions made
*/
function makePotionForm()
{
	potionnum++;


	var potionform = document.getElementById('potionform');

	var panelbody = document.createElement('div');
	panelbody.setAttribute('class', 'panel-body');
	panelbody.setAttribute('id', 'potion-panel' + potionnum);

	var typelabel = document.createElement('label');
	typelabel.setAttribute('for', 'potiontype' + potionnum);
	typelabel.setAttribute('id', 'typelabel' + potionnum);
	typelabel.innerHTML = 'Potion Type:';

	var potiontype = document.createElement('select');
	potiontype.setAttribute('id', 'potiontype' + potionnum);
	potiontype.setAttribute('class', 'form-control');
	
	for (var i = 0; i < skilltrees.length; i++)
	{
		var option = document.createElement('option');
		option.value = skilltrees[i];
		option.text = skilltrees[i];
		potiontype.appendChild(option);
	}

	var br = document.createElement('br');

	var potionlabel = document.createElement('label');
	potionlabel.setAttribute('for', 'potioneffect' + potionnum);
	potionlabel.setAttribute('id', 'potionlabel' + potionnum);
	potionlabel.innerHTML = 'Potion Effect (%):';

	potioninput = document.createElement('input');
	potioninput.setAttribute('id', 'potioninput' + potionnum);
	potioninput.setAttribute('type', 'number' + potionnum);
	potioninput.setAttribute('value', 0);
	potioninput.setAttribute('class', 'form-control');

	//push to the listPotions array
	listPotions.push(potioninput);

	panelbody.appendChild(typelabel);
	panelbody.appendChild(potiontype);
	panelbody.appendChild(potionlabel);
	panelbody.appendChild(potioninput);

	potionform.appendChild(panelbody);
}

/*
	Deletes a potion from the form
	pops the potion off of the listPotions array
	reduces the number of potions by 1
*/
function deletePotionForm()
{
	$('#typelabel' + potionnum).remove();
	$('#potiontype' + potionnum).remove();
	$('#potionlabel' + potionnum).remove();
	$('#potioninput' + potionnum).remove();
	$('#potion-panel' + potionnum).remove();

	listPotions.pop();

	potionnum--;
}

/*
	Creates effects for users every time "Add Effect" button is clicked
	Adds all or any effects to a list in order to validate them later
	Keeps track of the number of effects made
*/
function makeEffectForm()
{
	effectnum++;


	var effectform = document.getElementById('effectform');

	var panelbody = document.createElement('div');
	panelbody.setAttribute('class', 'panel-body');
	panelbody.setAttribute('id', 'effect-panel' + effectnum);


	var typelabel = document.createElement('label');
	typelabel.setAttribute('for', 'effecttype' + effectnum);
	typelabel.setAttribute('id', 'typelabel' + effectnum);
	typelabel.innerHTML = 'Effect Type:';

	var effecttype = document.createElement('select');
	effecttype.setAttribute('id', 'effecttype' + effectnum);
	effecttype.setAttribute('class', 'form-control');
	
	for (var i = 0; i < skilltrees.length; i++)
	{
		var option = document.createElement('option');
		option.value = skilltrees[i];
		option.text = skilltrees[i];
		effecttype.appendChild(option);
	}

	var br = document.createElement('br');

	var effectlabel = document.createElement('label');
	effectlabel.setAttribute('for', 'effectinput' + effectnum);
	effectlabel.setAttribute('id', 'effectlabel' + effectnum);
	effectlabel.innerHTML = 'Effect (%):';

	var effectinput = document.createElement('input');
	effectinput.setAttribute('id', 'effectinput' + effectnum);
	effectinput.setAttribute('type', 'number');
	effectinput.setAttribute('value', 0);
	effectinput.setAttribute('class', 'form-control');

	//push to the listEffects array
	listEffects.push(effectinput);

	panelbody.appendChild(typelabel);
	panelbody.appendChild(effecttype);
	panelbody.appendChild(effectlabel);
	panelbody.appendChild(effectinput);

	effectform.appendChild(panelbody);
}

/*
	Deletes an Effect from the form
	pops the effect from the listEffects array
	reduces the number of effects by 1
*/
function deleteEffectForm()
{
	$('#typelabel' + effectnum).remove();
	$('#effecttype' + effectnum).remove();
	$('#effectlabel' + effectnum).remove();
	$('#effectinput' + effectnum).remove();
	$('#effect-panel' + effectnum).remove();

	listEffects.pop();

	effectnum--;
}

/*
	Creates items for users to add to total armor table
	Adds 1 to the number of items
*/
function makeItemForm()
{
	itemnum++;
	var itemform = document.getElementById('itemform');

	var br = document.createElement('br');

	var iteminput = document.createElement('input');
	iteminput.setAttribute('id', 'iteminput' + itemnum);
	iteminput.setAttribute('type', 'text');
	iteminput.setAttribute('class', 'form-control');
	iteminput.setAttribute('placeholder', 'Item Name');

	var errortext = document.createElement('p');
	errortext.setAttribute('id', 'errortext' + itemnum);
	errortext.setAttribute('style', 'display:none; color:red;');
	errortext.innerHTML = 'Item you chose is not valid. Please try again.';

	
	itemform.appendChild(iteminput);
	itemform.appendChild(errortext);
}
/*
	Deletes items from the form
	reduces the number of items by 1
	Must have at least 1 item to input, 
		so cannot delete the last (1) item
*/
function deleteItemForm()
{
	var form = document.getElementById('itemform');

	var iteminput = document.getElementById('iteminput' + itemnum);
	var errortext = document.getElementById('errortext' + itemnum);

	if (itemnum > 1)
	{
		$('#typelabel').remove();
		$('#itemtype').remove();
		form.removeChild(iteminput);
		form.removeChild(errortext);

		itemnum--;
	}
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
	basedam = parseInt(basedam);
	ratbo = parseInt(ratbo);
	wpnperk = parseInt(wpnperk);
	itemeff = parseInt(itemeff);
	potioneff = parseInt(potioneff);
	seekmight = parseInt(seekmight);

	var wpndmg = (((basedam + ratbo) * (1 + ((wpnslevel)/200)) * (1 + (wpnperk * 0.2)) * (1 + (itemeff/100))
			 * (1 + (potioneff/100)) * (1 + (seekmight/10))));
	return Math.round(wpndmg);
}

/* 
 * basedef = base defense of armor
 * ratbo = rating bonus of improved armor, 0 if unimproved armor
 * armslevel = heavy armor or light armor skill level
 * armoracteff = potions/enhancements/active effects that increase heavy or light armor
 * unisonperk = 1 if unison perk active, 0 if not (Well Fitted = heavy, Custom Fit = light)
 * matchset = 1 if Matching Set perk active, 0 if not
 * armorperk = perk bonus for relevant tree, from 0 to 5 (Juggernaut = heavy, Agile Defender = light)
 */
function armordefense(basedef, ratbo, armslevel, armoracteff, unisonperk, matchset, armorperk, seekmight)
{
	basedef = parseInt(basedef);
	ratbo = parseInt(ratbo);
	armslevel = parseInt(armslevel);
	armoracteff = parseInt(armoracteff);
	unisonperk = parseInt(unisonperk);
	armorperk = parseInt(armorperk);
	seekmight = parseInt(seekmight);
	
	return Math.round(Math.ceil((basedef + ratbo) * (1 + 0.4 * (armslevel + armoracteff)/100))
	* (1 + unisonperk/4) * (1 + matchset/4) * (1 + (armorperk/5)) * (1 + (seekmight/10)));
}	

/*
	Validate/error checking valid numbers in the:
		Skill text boxes
		Perk text boxes
		Potion text boxes
		Effect text boxes
*/
function validateInput(skillarray, perkarray)
{
	var badskillnames = '';
	var badperk = '';

	//check for valid skills
	for (skill in skillarray)
	{
		if (isNaN(skillarray[skill]) || skillarray[skill] > 100 || skillarray[skill] < 15)
			{
				badskillnames += ('- ' + skill.toString() + "\n");
			}
	}
	if (badskillnames != '')
		window.alert('ERROR: These skills are out of range. They must be between 15 and 100, inclusive.' + '\n\n' + badskillnames);

	//check for valid perks
	for(perk in perkarray)
	{
		if(perkarray[perk] > 5 || perkarray[perk] < 0 || isNaN(perkarray[perk]))
		{
			badperk += ("- " + perk.toString() + "\n");
		}
	}
	if(badperk != '')
		window.alert("ERROR! These perks are out of range. They must be between 0 and 5, inclusive." + "\n\n" + badperk);

	//don't run the math if the input is invalid
	if (badskillnames != '' || badperk != '')
		return false;

	//check for valid potions
	if(potionnum > 0)
	{
		for(var i = 0; i < potionnum; i++)
		{
			if(listPotions[i].value < 0 || listPotions[i].value == '')
			{
				window.alert("ERROR! Potion(s) are out of range. They must be greater than 0, inclusive.");
				return false;
			}
		}
		
	}

	//check for valid effects
	if(effectnum > 0)
	{
		for(var i = 0; i < effectnum; i++)
		{
			if(listEffects[i].value < 0 || listEffects[i].value == '')
			{
				window.alert("ERROR! Effect(s) are out of range. They must be greater than 0, inclusive.");
				return false;
			}
		}
		
	}

	//return true if everything is valid
	return true;
}

/*
	Name of quality that correlates to the quality level
		calculated from qualitylvl() function
	q = quality level
*/
function qualityName(q)
{
	switch (true) {
		case q == 0:
			return "Base";
			break;
		case q == 1:
			return "Fine";
			break;
		case q == 2:
			return "Superior";
			break;
		case q == 3:
			return "Exquisite";
			break;
		case q == 4:
			return "Flawless";
			break;
		case q == 5:
			return "Epic";
			break;
		case q >= 6:
			return "Legendary";
		default:
			return "Unknown";
			break;
	}
}

/* 
	****************************************************************
	MAIN FUNCTION THAT DOES ALL OF THE CALCULATION WHEN CLICK SUBMIT
	****************************************************************
 * data = array of data that contains key value pairs of form input
 * data[0][0] is json data from database query
 */
function readpage(data)
{
	//GATHER ALL INFO FROM THE USER INPUTS

	var smithlvl = parseInt(data['input'].smithlvl);
	var smithperk = parseInt(data['input'].smithperk);
	
	var onelvl = parseInt(data['input'].ohlvl);
	var oneperk = parseInt(data['input'].ohperk);
	
	var twolvl = parseInt(data['input'].thlvl);
	var twoperk = parseInt(data['input'].thperk);
	
	var lalvl = parseInt(data['input'].lalvl);
	var laperk = parseInt(data['input'].laperk);
	
	var halvl = parseInt(data['input'].halvl);
	var haperk = parseInt(data['input'].haperk);

	var arlvl = parseInt(data['input'].arlvl);
	var arperk = parseInt(data['input'].arperk);

	var bllvl = parseInt(data['input'].bllvl);
	var blperk = parseInt(data['input'].blperk);

	var skills = {'Smithing': smithlvl, 'Light Armor': lalvl, 'Heavy Armor': halvl, 'One-Handed': onelvl, 
					'Two-Handed': twolvl, 'Archery': arlvl};
	var perks = {"Smithing": smithperk, "Light Armor": laperk, "Heavy Armor": haperk, "One-Handed": oneperk, 
					"Two-Handed": twoperk, "Archery": arperk};

	//CHECK BOXES MARKED?

	var seekmight = 0;
	if (document.getElementById('seekmight').checked)
		seekmight = 1;

	var customfit = 0;
	if (document.getElementById('customfitperk').checked)
		customfit = 1;

	var wellfitted = 0;
	if (document.getElementById('wellfittedperk').checked)
		wellfitted = 1;

	var lmatchset = 0;
	if (document.getElementById('lmatchset').checked)
		lmatchset = 1;

	var hmatchset = 0;
	if (document.getElementById('hmatchset').checked)
		hmatchset = 1;

	//CHECK TO SEE IF THE INPUT IS VALID. IF NOT, DON'T DO ANY MATH
	if (!validateInput(skills, perks))
		return;	

	//DISPLAY AND PARSE POTIONS AND EFFECTS
	var potions = {'Smithing': 0, 'One-Handed': 0, 'Two-Handed': 0, 'Archery': 0, 'Light': 0, 'Heavy': 0};
	var effects = {'Smithing': 0, 'One-Handed': 0, 'Two-Handed': 0, 'Archery': 0, 'Light': 0, 'Heavy': 0};

	for (var i = 1; i <= potionnum; i++)
	{
		var key = document.getElementById('potiontype' + i);
		var val = document.getElementById('potioninput' + i);

		potions[key.value] += parseInt(val.value);
	}
	for (var i = 1; i <= effectnum; i++)
	{
		var ekey = document.getElementById('effecttype' + i);
		var eval = document.getElementById('effectinput' + i);

		effects[ekey.value] += parseInt(eval.value);
	}
	
	//ALL INPUT IS VALID...DO SOME MATH NOW!
	var effskill = effectiveskill(smithlvl, smithperk, effects['Smithing'], potions['Smithing']);
	var qlevel = parseInt(qualitylvl(effskill));
	var quality = qualityName(qlevel);
	
	var baserating,improvedrating = 0;
	var itemname, ratingtype = "";

	var basetotal = 0;
	var improvedtotal = 0;

	//CALCULATES WEAPON DAMAGE OR ARMOR DEFENSE BASED ON THE TYPE OF THE ITEM
	//ITERATES THROUGH THE LIST OF ITEMS USER INPUTS AND CALCULATES EACH
	for (var i = 0; i < data['names'].length; i++) 
	{
		var ratbo = parseInt(ratingbonus(data['names'][i][0].part, qlevel));

		switch(data['names'][i][0].type)
		{
			case "One-Handed":
				baserating = weapondamage(data['names'][i][0].rating, 0, onelvl, oneperk, effects['One-Handed'], potions['One-Handed'], seekmight);
				improvedrating = weapondamage(data['names'][i][0].rating, ratbo, onelvl, oneperk, effects['One-Handed'], potions['One-Handed'], seekmight);
				itemname = "weapon";
				ratingtype = "damage";
				break;
			case "Two-Handed":
				baserating = weapondamage(data['names'][i][0].rating, 0, twolvl, twoperk, effects['Two-Handed'], potions['Two-Handed'], seekmight);
				improvedrating = weapondamage(data['names'][i][0].rating, ratbo, twolvl, twoperk, effects['Two-Handed'], potions['Two-Handed'], seekmight);
				itemname = "weapon";
				ratingtype = "damage";
				break;
			case "Archery":
				baserating = weapondamage(data['names'][i][0].rating, 0, arlvl, arperk, effects['Archery'], potions['Archery'], seekmight);
				improvedrating = weapondamage(data['names'][i][0].rating, ratbo, arlvl, arperk, effskill['Archery'], potions['Archery'], seekmight);
				break;
			case "Light":
				itemname = "armor";
				ratingtype = "defense";
				
				if(data['names'][i][0].part == "Shield")
				{
					baserating = armordefense(data['names'][i][0].rating, 0, lalvl, effects['Light'] + potions['Light'], customfit, lmatchset, 0, 0);
					improvedrating = armordefense(data['names'][i][0].rating, ratbo, lalvl, effects['Light'] + potions['Light'], customfit, lmatchset, 0, 0);
				}
				else
				{
					baserating = armordefense(data['names'][i][0].rating, 0, lalvl, effects['Light'] + potions['Light'], customfit, lmatchset, laperk, 0);
					improvedrating = armordefense(data['names'][i][0].rating, ratbo, lalvl, effects['Light'] + potions['Light'], customfit, lmatchset, laperk, 0);
				}
				break;
			case "Heavy":
				itemname = "armor";
				ratingtype = "defense";
				if(data['names'][i][0].part == "Shield")
				{
					baserating = armordefense(data['names'][i][0].rating, 0, halvl, effects['Heavy'] + potions['Heavy'], wellfitted, hmatchset, 0, 0);
					improvedrating = armordefense(data['names'][i][0].rating, ratbo, halvl, effects['Heavy'] + potions['Heavy'], wellfitted, hmatchset, 0, 0);
				}
				else
				{
					baserating = armordefense(data['names'][i][0].rating, 0, halvl, effects['Heavy'] + potions['Heavy'], wellfitted, hmatchset, haperk, seekmight);
					improvedrating = armordefense(data['names'][i][0].rating, ratbo, halvl, effects['Heavy'] + potions['Heavy'], wellfitted, hmatchset, haperk, seekmight);
				}
				break;
			default:
				break;
		}

		//CREATE THE TABLE FOR THE ITEMS TO GO INTO		
		var tablepart = data['names'][i][0].part;

		document.getElementById(tablepart + '-name').innerHTML = data['names'][i][0].name;

		document.getElementById(tablepart + '-type').innerHTML = data['names'][i][0].type;

		document.getElementById(tablepart + '-base').innerHTML = baserating;
		document.getElementById(tablepart + '-improved').innerHTML = improvedrating;
		document.getElementById(tablepart + '-quality').innerHTML = quality;	
	}
	
	//ARMOR RATING ONLY TAKES INTO EFFECT ARMOR...NO WEAPONS ADDED TO TOTAL
	for(var i = 0; i < 5; i++)
	{
		Math.round(document.getElementById(parts[i] + '-base').innerHTML);
		Math.round(document.getElementById(parts[i] + '-improved').innerHTML);
		if (document.getElementById(parts[i] + '-base').innerHTML != '' && 
			document.getElementById(parts[i] + '-type').innerHTML != "Weapon")
		{
			basetotal += parseInt(document.getElementById(parts[i] + '-base').innerHTML);
			improvedtotal += parseInt(document.getElementById(parts[i] + '-improved').innerHTML);
		}
	}
	//DISPLAY THE FINAL BASE TOTAL AND IMPROVED TOTAL FOR EACH ITEM
	document.getElementById('total-base').innerHTML = basetotal;
	document.getElementById('total-improved').innerHTML = improvedtotal;
}