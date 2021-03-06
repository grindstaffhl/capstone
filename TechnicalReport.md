# Skyrim Combat Skills Planner
Developed: May 6, 2018

Developers: Megan Petruso and Hayden Grindstaff


## Abstract
The Skyrim Combat Skills Planner allows users to calculate proposed weapon and armor ratings. These calculations are based on the user’s skills and perks for Smithing, One-Handed, Two-Handed, Light Armor, Heavy Armor, and Archery. Our objective was to address the confusion between what a skill perk is and how the skill perk can directly benefit the player. We started with basic database functionality, creating a database full of all basic weapons and armor in *The Elder Scrolls V: Skyrim*. Utilizing MAMP, we were able to access our database information through simple php files. Stretching out to new techniques and tools, Laravel \[2\] came into play when we had to address the over abundance of php files we created. We sought to consolidate these files into one simple, sleek framework. Gradually adding more advanced functionality over time, and finally CSS, we created a functional calculator. For our results, we were able to create a coherent website that allows the use to add and remove items he or she wishes to calculate. The user can then adjust the smithing, one-handed, two-handed, heavy armor, light armor, and archery skills to the user’s character’s levels in-game. Similarly, the user is able to select which perks the character has. For simplicity, our results only had perks that actually pertain to the rating equations. The user is also able to add and remove potions and effects to the calculation. Finally, the user can calculate the items and the unimproved and improved item’s ratings will be displayed in an “equipped” table. Our results were fairly successful, with only a standard deviation of 3 for each of the calculated totals. This is due to the reverse engineering of equations from the game, as well as the inconsistent rounding the game has when it comes to calculations. We concluded that our calculator sufficiently address players’ needs to directly visualize how change in skills, perks, potions, and effects can affect any weapon or armor improvement in *The Elder Scrolls V: Skyrim*. 
#### Keywords
- Skyrim
- The Elder Scrolls
- Calculator
- Combat
- Melee
- Planner


## Table of Contents
- [Introduction and Project Overview](#intro)
  * [Background, Problem, and Objective](#Background-Problem-and-Objective)
  * [Similar Works](#Similar-Works)
  * [Users](#Users)
  * [Benefits](#Benefits)
  * [Problem Scope](#Problem-Scope)
  * [Features](#Features)
- [Design, Development, and Test](#DDT)
  * [Design](#Design)
  * [Development](#Development)
  * [Test](#Test)
- [Results](#Results)
- [Conclusion and Future Work](#Conclusion)
- [References](#References)


## Introduction and Project Overview <a name="intro"></a>

#### Background, Problem, and Objective <a name="Background-Problem-and-Objective"></a>
*The Elder Scrolls V: Skyrim* is a role-playing video game created by Bethesda. In the game, the player can create a character and travel around the world of Skyrim to complete quests through various means, one of these being through melee combat. As the player advances through the game, he or she is able to level up skills and gain perks in order to increase their weapon damage and, or armor rating. The game provides a small description of what each skill perk will provide for the player, but does not show a proposed calculation of how the skill perk will affect any armor or weapons the player uses. Once the player chooses a skill perk, he or she is unable to remove the skill perk without using console commands. Similarly, the player has the opportunity to enhance their improvement rating through effects via standing stones, stones around Skyrim that allow the user to enhance various skills, and potions. Our tool, The Skyrim Combat Skills Planner, allows users to calculate proposed weapon and armor ratings based on the user’s skills and perks for Smithing, One-Handed, Two-Handed, Light Armor, Heavy Armor, and Archery. Similar versions of a Skyrim Combat Skills Planner allow the user to view a description of a perk, but fails to demonstrate how the perk can affect an item’s rating. Our objective was to address the confusion between what a skill perk is and how the skill perk can directly benefit the player by creating a calculator that directly shows how the user can choose any weapon or armor, input their skills, perks, and effects, and visually see how the item rating can be improved or altered through their change in skills, perks, and effects.

#### Similar Works <a name="Similar-Works"></a>
There are three similar products to our calculator. However, all of the products do not allow the user to keep a character inventory or observe the numerical change in weapon damage and armor defense while manipulating skill levels and perks. Similarly, our product focuses on weapons and armor, while the latter products include all possible skill trees, encompassing arcana and magic. More specifically, our website does not model a social media site, like the [Skyrim Calculator](https://skyrimcalculator.com/plan). We designed a website geared towards each user, not for the communication between them. Likewise, the product by [IGN](http://www.ign.com/builds/the-elder-scrolls-5-skyrim/create) is more for visualizing and learning about perks; while our website planned to do this, our end product works more towards calculating the numerical values from these skill perks instead of just education about the perks. The product by the [Reddit user](https://www.reddit.com/r/skyrim/comments/50d750/skyrim_character_planning_spreadsheet/) was not intuitive by any means. One would have to switch between spreadsheets to determine what was happening and changing for the character. Our website is be an improvement from this product because allows users to freely experiment with skill levels, perks, and effects to see the direct numerical change in weapon damage and armor defense without having to change screens or menus.

#### Users <a name="Users"></a>
Users of The Skyrim Combat Skills Planner are those who play or want to play Skyrim. These users may range from novice to expert. This tool is designed to aid any type of user in their Skyrim experience and adventure by visualizing how to build a melee-based character the player desires.

#### Benefits <a name="Benefits"></a>
Our product allows users to easily view how their character’s stats can affect an piece of weapon or armor in the game. This is something that the previously mentioned similar works failed to address. Our product is intuitive and allows the user to add items and adjust values of perks and effects with ease without obstructing the view of the “equipped” table. Similarly, the user does not have to struggle to lookup a specific item. We have provided a button that allows the user to search the database of available weapons and armor to calculate. This search page allows the user to search by both name and type of weapon. Our product is a valuable asset to the Skyrim community because of the frequent dilemma of wasting perks and skill points on an effect that would not have helped in the long run can now be easily avoided with our Skyrim Combat Skills Planner.

#### Problem Scope <a name="Problem-Scope"></a>
The main problem we addressed in our product is how a set of skills, perks, and effects can affect an item in the game. We were not able to educate the user on what each perk does for the user’s character. This is mostly due to only one set of perks in a skill tree directly affecting the rating value of armor and weapons. Therefore, information about other perks in the tree yielded unnecessary for us to explain because they do not contribute to the weapon and armor rating equation. Additionally, users have to input the entire name of an item because the bar does not utilize smart search on the database of weapons and armor. To help the user with this issue, we provided a page that allows the user to search the database of weapons and armor based on name or type of item. We also planned to set apart our product from similar Skyrim calculators by allowing users to create an account, authenticate themselves, and save character builds. We were not able to do this because of time constraints and novice knowledge of Laravel. Similarly, our calculator is only functional on items that have not been improved. Again, we planned to implement a feature that allows the user to improve an already improved item; however, the math associated with this function was not as consistent as originally thought. Therefore, we had to forgo this idea and add a disclaimer that addresses both our accuracy and type of items that can be calculated. A few problems we did not choose to address were saving user’s characters, avoid retyping in information, and user logins. Other Skyrim calculators did not have these features. We hoped to implement csv import and export and user authentication. However, we were not able to do so due to time constraints and lack of knowledge of our web framework. Our plan and idea for The Skyrim Combat Skills Planner proved to big much too ambitious for our skill levels, especially when it came to learning a brand new tool, Laravel.

#### Features <a name="Features"></a>

| Implemented              | Did Not Implement      |
| ------------------------ | ---------------------- |
| Input 1+ Item            | User Authentication    |
| Change Smithing Level    | CSV Import/Export      |
| Change One-Handed Level  | Google Drive Link      |
| Change Two-Handed Level  | Character Saves        |
| Change Heavy Armor Level | Improve Improved Items |
| Change Light Armor Level | Same Armor Type Perk   |
| Change Archery Level     |                        |
| Change Skill Perks       |                        |
| Add 1+ Potion	           |                        |
| Add 1+ Effect            |                        |
| Search for Item          |                        |
| Equipped Table           |                        |
| Total Armor Defense      |                        |


## Design, Development, and Test <a name="DDT"></a>

#### Design <a name="Design"></a>
Overall, the design of our project is relatively straightforward. It mostly revolved around using Laravel v5.6 as our main framework. Neither of us had ever used any sort of framework before, and while it was very challenging, I would say it was extremely beneficial. Since we only used three webpages for our project, the design was very simple. FLOWCHART OF VIEWS, CONTROLLERS, ROUTES, ETC. Each webpage has its corresponding View, which is basically the HTML file with some Laravel Blade additions to it. Also, each URL has a Route specified. When the browser loads that specific URL, Laravel knows to call the specified Controller method in the Route. For instance, when the browser loads “localhost:8000”, it knows to load the “home” function in PageController. 
Hosting the site took only one other piece of software in conjunction with Laravel. We decided to use MAMP to help host the site and allow us to use database queries, something Laravel can’t natively do. MAMP built an Apache server and a MYSQL server on specific ports and changed the settings in Laravel to use this software. Then, we used Artisan, Laravel’s command-line interface, to host the site.
The code itself is primarily made up of PHP, HTML/Laravel Blade, JavaScript, and CSS. The heart and soul of the project is in the main JavaScript file, called “Calculations.js”. Here, we have the “readpage” function, which is called on a successful AJAX post request when the Submit button is clicked. The readpage function takes in the data delivered from the post request, sets some variables from the data that was just delivered, and calls helper methods that perform specific tasks.
The most important helper functions are as follows:

The effectiveskill function is a simple calculation that builds a variable important for other calculations. This function takes in the player’s smithing level, if they have the relevant smithing perk, and any enchantments or potions that improve a player’s smithing level. \[10\]

The qualitylvl function uses the effective skill from the previous function and builds a variable that determines what an item’s quality level will be when improved. \[10\]

The function ratingnonus takes in the quality level from the previous function and the Part associated with the item to be improved. This function determines how much of a rating bonus is added when the item is improved. If the item’s Part is “Chest”, then it gets double the bonus. In the game’s terms, if you are improved a piece of armor worn on the chest, you get a double rating bonus. \[10\]

Most importantly, the calculations of the previous functions come together into one of the rating calculation functions, depending on the type of item being improved. We found these functions on different Skyrim wiki sites and tweaked them (mostly changing rounding) to fit what ratings the actual game was giving us. Each function takes into account the base rating of the item, the level of the skill corresponding to the Type of the item, any perks that are associated with that skill tree, any potions or effects that alter their skill level, and, unless the item being improved is Light Armor, the Seeker of Might perk bonus. This perk gives a 10% bonus to all “combat” skills and functions slightly differently than other active effects, which is why it is separate from other skills. The values for the potions and effects are taken from an array that holds values for all of the combined effects in each skill tree. Code block for potions and effects arrays Each element of the arrays are initialized to 0 and are changed based on the correlating forms for potions or effects. \[8\] \[9\]

To add benefits to the players, potions and effects are incorporated into our calculations. We have simple drop-down forms correlating to the skill tree being altered and the effect of the potion or effect. This function creates HTML elements and adds them to the page and are given specific IDs that are all added together in an array under its specific skill tree, as mentioned previously. The ID holds the name of the form and a global variable, one for the number of forms for potions and one for effects, which is incremented when a new form is made. When deleting these forms, we also decrement the respective global variable to ensure the accurate number of forms is kept.

We also have input validation for forms where the user types a number. We need to ensure that the data being entered by the user falls within the acceptable range that Skyrim has, else the calculations become unattainable with the player’s current skill levels. If a skill or a perk is out of range, we have an alert that says which inputs are invalid and the correct range.

Finally, readpage makes different variables and then uses a large for loop and switch statement to set each variable for each item. The item and each of its properties is then placed into the table and, if the item is a piece of armor, the armor defense rating is added to the total at the bottom.


#### Development <a name="Development"></a>
First and foremost, we wanted to make sure that our formulas for calculating effective skill, quality level, rating bonus, and item rating were correct. We spent a lot of time tweaking these formulas throughout the course of the project to get it to be as accurate as we possibly could. In the first phase of the project, we knew we would not be able to learn how to get an AJAX request working before the due date, so we decided to hard code a One-Handed weapon, Two-Handed weapon, a full set of Light Armor, and full set of Heavy Armor. After that, we thought the next step would be to more intelligently implement Laravel into our code and then get a database up and working. Unfortunately, that took some time. Laravel has a bit of a high learning curve and we had a lot of issues with AJAX requests, so that probably took time we could have used to add new features. We then wanted to ensure adding potions and effects behaved as they should, which ate up more time than we expected. After that came functionality for performing calculations on more than one item at a time. Then it was code cleanup and finally CSS.

#### Test <a name="Test"></a>
Testing mostly involved someone with a copy of Skyrim and someone entering in the data on our project. We do not know how to run scripts that would do this for us in Skyrim, so our testing was manual. We knew it was important to test on a variety of characters and we made sure adding one component, such as a potion or extra perk, would not negatively affect the calculations. This lead to a lot of formula tweaking, but we were able to get a standard deviation of +- 3 for rating.

## Results
Overall, we are quite happy with how our project turned out. After lots and lots of testing on our own characters, friends’ characters, and characters we made for testing, we finally tweaked our code enough that our calculations were extremely close to what the game reports. In fact, we even tested a few times that the game’s reports were incorrect and ours was correct. We also got most of the features we wanted in the project implemented.

- [x] multiple items being improved at once
- [ ] implement autofill search bar
- [x] damage/armor rating formulas within acceptable deviation
- [ ] improving already improved items
- [x] database queries instead of hard-coded items
- [x] implement potions and effects
- [x] implement most important perks
- [ ] user profiles
- [ ] csv import/export
- [ ] total form validation
- [x] CSS styling

I think our biggest regret with the project is not being able to get everything validated. It mostly came down to time; we couldn’t feasibly make generalized functions that could be used for multiple forms and didn’t want to clutter up the code more than it already is. However, we were able to make sure that the item names and the number range with skill levels, skill perks, and potion and effects amounts were validated. We wanted to implement validation for having a high enough skill level for certain perks.
For example, in order to have 3 levels of the Juggernaut perk, your character’s Heavy Armor skill level would need to be at least 60. We also were not able to get some of the armor perks validated, namely Matched Set and the perk that gives a rating bonus if your character is wearing all Light or Heavy armor. However, we concluded that the project will work just fine without these features, because the person using our project will know that these things aren’t normally possible. If we were given another week or two with no other assignments to worry about, it is definitely possible that we could get these features implemented.

Aside from validation, there were two other ease-of-use features we weren’t able to implement. One of them is the search bar autofill. It’s kind of frustrating to have to search for an item and make sure it is spelled properly but given the time and the new framework we were using, we weren’t able to figure out how to make an autofill feature. 
To somewhat remedy this, we decided to implement the database search table that opens in a new tab. That way, the user could type in parts of the name of the item to find what they are looking for without having to run each function every time. The other feature we wanted to implement was improving an already improved item. This is possible in Skyrim and it is very likely that it will happen. Unfortunately, we found that there were too many variables in how previous calculations were made. Reverse engineering to figure out what a player’s skill levels were and if they had any potions or effects active is nearly impossible. Considering our project was more for planning out characters, this isn’t a huge problem because you can still see what your rating will be with your current stats and how changing your stats or adding potions or effects will change things.

Unfortunately, we couldn’t figure out how to add user profiles and login validation. We wanted for users to be able to save their characters so they wouldn’t have to reenter their information every time, but we could not figure out how to implement it, nor did we have time.

Nonetheless, we have a working project that we are proud of. We thankfully found formulas that are correct to up to within 3 points of rating. We were able to make our code a little cleaner with Laravel and Bootstrap and each form works exactly as intended. Most importantly, our project doesn’t take very long to run. It may take a few seconds to run the first time, but after that the results are almost instantaneous. Even though our project doesn’t have all the features we wanted, it still serves its main purpose without fail.  


## Conclusion and Future Work <a name="Conclusion"></a>
Similar Skyrim calculators failed to address the calculated values each skill perk, potion, and effect has on a specific weapon or armor piece in the game. Our product allows the user to do just that, calculate the rating value of weapon and armor pieces from the game based on the user’s character’s skill and perk values. We were able to accomplish our objective through a database of weapons and armor hosted by MAMP and a sleek, concise archive of our code via Laravel. We concluded that firstly, the math and calculations within the game The Elder Scrolls V: Skyrim are not always accurate. Second, we concluded that prior knowledge of a web framework, especially the one we are using, is incredibly helpful with development and will not set production back two weeks. Our results are not everything we wanted or planned for in our product; however, our results are enough for the user to have a positive user experience as well as achieve our main objective. For future work, we hope to extend our calculator to encompass all of the components we were not able to implement due to time constraints, including, but not limited to: smart search, user authentication, and csv import and export functionality. Furthermore, we plan to incorporate the arcana and spellcasting aspect of Skyrim so that all types of character builds can utilize our tool.


## References <a name="References"></a>
\[1\] MAMP. MAMP 4 for Windows. Application. https://www.mamp.info/en/.

\[2\] Taylor Otwell. Laravel. 5.6. Library. https://laravel.com/docs/5.6/installation.

\[3\] Taylor Otwell. Laravel-Blade Templates. 5.6. Library. https://laravel.com/docs/5.6/blade.

\[4\] Tobias. Ratschiller. phpMyAdmin. 4.8. Application. https://www.phpmyadmin.net/.

\[5\] Jon Skinner, Will Bond. Sublime Text. v3. Text Editor. https://www.sublimetext.com/.

\[6\] “Weapons (Skyrim)”. The Elder Scrolls Wiki. FANDOM. http://elderscrolls.wikia.com/wiki/Weapons_(Skyrim).

\[7\] “Armor (Skyrim)”. The Elder Scrolls Wiki. FANDOM. http://elderscrolls.wikia.com/wiki/Armor_(Skyrim).

\[8\] “Skyrim:Weapons”. The Unofficial Elder Scrolls Pages. The UESPWiki. http://en.uesp.net/wiki/Skyrim:Weapons.

\[9\] “Skyrim:Armor”. The Unofficial Elder Scrolls Pages. The UESPWiki. http://en.uesp.net/wiki/Skyrim:Armor.

\[10\] “Skyrim:Armor”. The Unofficial Elder Scrolls Pages. The UESPWiki. http://en.uesp.net/wiki/Skyrim:Smithing.

\[11\] "The Elder Scrolls V: Skyrim". \[Blu-Ray, DVD-ROM, Digital Download\]  Bethesda Game Studios. 2011. 
