# SM: Setup & recommendations
1. Clone from github, don't download the zip. You lose git functionality otherwise.
2. Install php, mysql, yarn. Use a package manager (brew on mac, apt on ubuntu etc)
3. Run 'yarn install'. It installs js dependencies listed in package.json.
4. For accessing the mysql database my recommendation is to use separate software, eg Datagrip, MySql Workbench etc. phpMyAdmin sucks IMO and is an outdated technology.
5. Use an IDE: Visual Studio Code, PhpStorm, etc.

## Database
1. Create a mysql database 'game'
2. Via mysql console create user 'root' with password 'parole123!'. TODO: move the db connection configuration to a single place, currently it's set multiple times in separate files.
2. Run sql in the maindatabase.sql file to create tables





# JurmalaStreets3d
3d web browser game
FLAWS SO FAR: MULTIPLAYER DOES NOT WORK DUE FACT, PLAYER COORDINATES GET UPDATED BY TELEPORTATION FUNCTION, AND THAT CREATES STUTTERING AND DELAY.
PHYSICS DON'T HAVE WALKING ON STAIRS ANIMATIONS, SITTING ON CHAIR ANIMATIONS, AND ALMOST NOTHING FANCY. 3D MAP IS UNDEVELOPED AND PLAIN.

DEMO PAGE - http://jurmalastreets.bounceme.net/game.php

LOGIN PAGE - http://jurmalastreets.bounceme.net/

PSeUDO VERSION - http://jurmalastreets.bounceme.net/gamenew.php

CODE - http://jurmalastreets.bounceme.net/code.txt

PROJECT DOCUMENTATION - http://mytechservinginternetmeals.blogspot.com/2022/02/video-game-development-4.html

PROJECT FILES ON DROPBOX - https://www.dropbox.com/s/r1m2ulne03jfmdp/www_MAZITIS.zip?dl=0

game.sql sample database - https://drive.google.com/file/d/1nBp6Zc8jyJ2-Xuyy4oQj6Em4GvTSlDbT/view?usp=sharing

Install webserver and mysql database server. Configuration files are in .php under ./db 

3d models can be found under ./assets/glb/ if You want to help the project contact me due email - r.mazitis@gmail.com and maybe You have any particular work You would like to share with us.

Used technologies so far: Enable3d - http://enable3d.io
ThreeJs - http://threejs.org
JQuery = http://jquery.com/
Javascript - https://www.javascript.com/
PHP - https://www.php.net/
NodeJS - https://nodejs.org/
https://www.mysql.com/

<img src="https://i.ibb.co/bRtM2fX/20220706-163202.jpg"></img>


Characters can be made and found on mixamo.com  and https://nilooy.github.io/character-animation-combiner/
For development of map - https://www.blender.org/
