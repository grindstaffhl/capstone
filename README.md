# Skyrim Combat Skills Planner
Developers: Megan Petruso and Hayden Grindstaff


## Setup
#### MAMP
Go to the following url [here](https://www.mamp.info/en/) and download MAMP. MAMP Pro is not required for this project. Follow the prompts to install MAMP. Once MAMP is properly installed, open the application and click "Start Servers". The Apache server and MySQL server will start to connect and run. The Apache Port is 80 and MySQL Port is 3306 by default. If you already have a different application running through those ports, you can change where apache and mysql runs through by clicking "Preferences->Ports". Likewise, you can view and change where the files for your web server will be saved on you computer by going to "Preferences->Web Server".

Once both the Apache and MySQL severs are up and running, you can select "Open start page". This will take you to your MAMP server home page. You can now download or clone the files in this repository to the directory where your MAMP web server points to on your computer. After the files have been downloaded, navigate back to your MAMP home page and select "My Website". This takes you to the directory of the files your web server points to on your computer. Clicking on each specific php file will display the contents in the database for that item. To view the database, navigate back to your MAMP home page and select "Tools->phpMyAdmin". This is where the database is located.


#### phpMyAdmin
In order to create the tables within the database, download the 4 CSV files in the respository. In phpMyAdmin, create a new database called "capstone". Then create a new table called "skyrim_armor". The table will have 6 columns: name, defense, weight, price, id, and type. The types and sizes are varchar(50), int(3), int(3), int(4), varchar(50), varchar(10), respectively. Click "save" to create the table. You will then go to "Import", select the CSV file called "skyrim_armor.csv", and import the file into the table. You will then have your database of Skyrim Armor. You will repeat the following steps for the remaining 3 CSV files. The skyrim_effects table has 4 columns: effect- varchar(50), id- varchar(20), description- varchar(500), and extra- varchar(500). The skyrim_perks table has 7 columns: perk- varchar(50), rank- int(1), description- varchar(200), id- varchar(20), skill_req- varchar(20), perk_req0 varchar(20), and tree- varchar(15). Lastly, the skyrim_weapons table has 6 columns: name- varchar(50), damage- int(3), weight- int(3), price- int(4), id- varchar(10), and type- varchar(20).

Once you have all of desired files from the repository downloaded, MAMP installed, and the CSV files imported into your database in phpMyAdmin, you are ready to edit and experiement with the Skyrim Combat Skills Planner.

