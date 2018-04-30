# Skyrim Combat Skills Planner
Developed: May 6, 2018

Developers: Megan Petruso and Hayden Grindstaff


## Abstract
The Skyrim Combat Planner allows users to calculate proposed weapon and armor ratings. These calculations are based on the user’s skills and perks for Smithing, One-Handed, Two-Handed, Light Armor, Heavy Armor, and Archery. Our objective was to address the confusion between what a skill perk is and how the skill perk can directly benefit the player. We started with basic database functionality, creating a database full of all basic weapons and armor in *The Elder Scrolls V: Skyrim*. Utilizing MAMP, we were able to access our database information through simple php files. Stretching out to new techniques and tools, Laravel came into play when we had to address the over abundance of php files we created. We sought to consolidate these files into one simple, sleek framework. Gradually adding more advanced functionality over time, and finally CSS, we created a functional calculator. Our results were fairly successful, with only a standard deviation of 3 for each of the calculated totals. This is due to the reverse engineering of equations from the game, as well as the inconsistent rounding the game has when it comes to calculations. We concluded that our calculator sufficiently address players’ needs to directly visualize how change in skills, perks, potions, and effects can affect any weapon or armor improvement in *The Elder Scrolls V: Skyrim*. 
#### Keywords
- Skyrim
- The Elder Scrolls
- Calculator
- Combat
- Melee
- Planner


## Table of Contents



## Introduction and Project Overview

#### Background, Problem, and Objective
*The Elder Scrolls V: Skyrim* is a role-playing video game created by Bethesda. In the game, the player can create a character and travel around the world of Skyrim to complete quests through various means, one of these being through melee combat. As the player advances through the game, he or she is able to level up skills and gain perks in order to increase their weapon damage and, or armor rating. The game provides a small description of what each skill perk will provide for the player, but does not show a proposed calculation of how the skill perk will affect any armor or weapons the player uses. Once the player chooses a skill perk, he or she is unable to remove the skill perk without using console commands. Similarly, the player has the opportunity to enhance their improvement rating through effects via standing stones, stones around Skyrim that allow the user to enhance various skills, and potions. Our tool, The Skyrim Combat Planner, allows users to calculate proposed weapon and armor ratings based on the user’s skills and perks for Smithing, One-Handed, Two-Handed, Light Armor, Heavy Armor, and Archery. Similar versions of a Skyrim Combat Planner allow the user to view a description of a perk, but fails to demonstrate how the perk can affect an item’s rating. Our objective was to address the confusion between what a skill perk is and how the skill perk can directly benefit the player by creating a calculator that directly shows how the user can choose any weapon or armor, input their skills, perks, and effects, and visually see how the item rating can be improved or altered through their change in skills, perks, and effects.

#### Similar Works
There are three similar products to our calculator. However, all of the products do not allow the user to keep a character inventory or observe the numerical change in weapon damage and armor defense while manipulating skill levels and perks. Similarly, our product focuses on weapons and armor, while the latter products include all possible skill trees, encompassing arcana and magic. More specifically, our website does not model a social media site, like the **Skyrim Calculator**. We designed a website geared towards each user, not for the communication between them. Likewise, the product by **IGN** is more for visualizing and learning about perks; while our website planned to do this, our end product works more towards calculating the numerical values from these skill perks instead of just education about the perks. The product by the **Reddit** user was not intuitive by any means. One would have to switch between spreadsheets to determine what was happening and changing for the character. Our website is be an improvement from this product because allows users to freely experiment with skill levels, perks, and effects to see the direct numerical change in weapon damage and armor defense without having to change screens or menus.

#### Users
Users of The Skyrim Combat Planner are those who play or want to play Skyrim. These users may range from novice to expert. This tool is designed to aid any type of user in their Skyrim experience and adventure by visualizing how to build a melee-based character the player desires.

#### Benefits
Our product allows users to easily view how their character’s stats can affect an piece of weapon or armor in the game. This is something that the previously mentioned similar works failed to address. Our product is intuitive and allows the user to add items and adjust values of perks and effects with ease without obstructing the view of the “equipped” table. Similarly, the user does not have to struggle to lookup a specific item. We have provided a button that allows the user to search the database of available weapons and armor to calculate. This search page allows the user to search by both name and type of weapon. Our product is a valuable asset to the Skyrim community because of the frequent dilemma of wasting perks and skill points on an effect that would not have helped in the long run can now be easily avoided with our Skyrim Combat Planner.

#### Problem Scope
The main problem we addressed in our product is how a set of skills, perks, and effects can affect an item in the game. We were not able to educate the user on what each perk does for the user’s character. This is mostly due to only one set of perks in a skill tree directly affecting the rating value of armor and weapons. Therefore, information about other perks in the tree yielded unnecessary for us to explain because they do not contribute to the weapon and armor rating equation. Additionally, users have to input the entire name of an item because the bar does not utilize smart search on the database of weapons and armor. To help the user with this issue, we provided a page that allows the user to search the database of weapons and armor based on name or type of item. We also planned to set apart our product from similar Skyrim calculators by allowing users to create an account, authenticate themselves, and save character builds. We were not able to do this because of time constraints and novice knowledge of Laravel. Similarly, our calculator is only functional on items that have not been improved. Again, we planned to implement a feature that allows the user to improve an already improved item; however, the math associated with this function was not as consistent as originally thought. Therefore, we had to forgo this idea and add a disclaimer that addresses both our accuracy and type of items that can be calculated.

#### Features
Users are able to input a weapon or armor piece in to a text box. If the user would like to add more than one item to the “equipped” table, the user can add another item; however, if the user does not insert anything into one of the item boxes, the POST request will not go through and the website will throw an error. To avoid this, the user must delete any boxes that he or she will not use. After typing one or more items that the user wishes to calculate, the user can then edit their characters smithing level and selecting if the character has the perk for the armor and, or the weapon. Likewise, the user can fill out similar information for One-Handed, Two-handed, Light Armor, Heavy Armor, and Archery skills. The user can adjust however many perks, out of five, his or her character has for each of the combat skills. Finally, the user can add any potions, with potency, and effects, with percentage to their equation. The user may add or delete any potions or effects. If a potion or effect is left unfilled, it is defaults to zero. Users then click the “Calculate” button to add the items to the “equipped” table. The user is able to see the name of the item, the part of the body it is worn, the original rating, the upgraded rating, and the quality level it will improve. Additionally, the total seen at the bottom of the “equipped” table is the original armor rating and the upgraded armor rating. These totals do not add weapons. Next to the “Calculate” button, the user is able to search the database for weapons he or she can choose to calculate with. The search bar searches the database on name or type of item.


## Design, Development, and Test

#### Design

#### Development

#### Test


## Results


## Conclusion and Future Work
Similar Skyrim calculators failed to address the calculated values each skill perk, potion, and effect has on a specific weapon or armor piece in the game. Our product allows the user to do just that, calculate the rating value of weapon and armor pieces from the game based on the user’s character’s skill and perk values. We were able to accomplish our objective through a database of weapons and armor hosted by MAMP and a sleek, concise archive of our code via Laravel. We concluded that firstly, the math and calculations within the game The Elder Scrolls V: Skyrim are not always accurate. Second, we concluded that prior knowledge of a web framework, especially the one we are using, is incredibly helpful with development and will not set production back two weeks. Our results are not everything we wanted or planned for in our product; however, our results are enough for the user to have a positive user experience as well as achieve our main objective. For future work, we hope to extend our calculator to encompass all of the components we were not able to implement due to time constraints, including, but not limited to: smart search, user authentication, and csv import and export functionality. Furthermore, we plan to incorporate the arcana and spellcasting aspect of Skyrim so that all types of character builds can utilize our tool.


## References
- Rasmus Lerdorf. PHP. 7.0.x. Library. http://php.net/.
- MAMP. MAMP 4 for Windows. Application. https://www.mamp.info/en/.
- Taylor Otwell. Laravel. 5.6. Library. https://laravel.com/docs/5.6/installation.
- Ajax. Library. https://api.jquery.com/category/ajax/.
- Brendan Eich. JavaScript. Library. https://www.w3schools.com/jsref/default.asp
- Taylor Otwell. Laravel-Blade Templates. 5.6. Library. https://laravel.com/docs/5.6/blade.
- Tobias. Ratschiller. phpMyAdmin. 4.8. Application. https://www.phpmyadmin.net/.
- Jon Skinner, Will Bond. Sublime Text. v3. Text Editor. https://www.sublimetext.com/.
- CSS. Library. https://www.w3schools.com/cssref/default.asp.
- HTML. Library. https://www.w3schools.com/tags/default.asp.
- “Weapons (Skyrim)”. The Elder Scrolls Wiki. FANDOM. http://elderscrolls.wikia.com/wiki/Weapons_(Skyrim).
- “Armor (Skyrim)”. The Elder Scrolls Wiki. FANDOM. http://elderscrolls.wikia.com/wiki/Armor_(Skyrim)
- “Skyrim:Weapons”. The Unofficial Elder Scrolls Pages. The UESPWiki. http://en.uesp.net/wiki/Skyrim:Weapons.
- “Skyrim:Armor”. The Unofficial Elder Scrolls Pages. The UESPWiki. http://en.uesp.net/wiki/Skyrim:Armor.
