# Blexr test task

## Couple words in advance
As I came from a Laravel and functional PHP programming background, I had never tried before to make an MVC application with Core OOP PHP programming. I had known a bit about Core OOP PHP but have never built an application with it. It was a hard and fun challenge trying to piece together everything from the basic MVC structure to how to make a Router, configuring my own webpack.config file for the first time, etc... I actually decided to make an SPA application with Vue.js and Vue Router, because it's very fast and it's modern, instead of going for view .php files and it has it's ups and downs as well.

I have to admit, that since I wrote my own router and basic authentication instead of using a library - because I thought that you'd probably be interested in whether I know how to sanitise data or prepare SQL statements - it's not the most secure application in the world. In fact, because there's not a secure cookie, CSRF-Token and proper checks for GET and POST route usage, every GET route can be accessed by URL from the browser if logged in. I tried to make a point in showing what my skills are full-stack wise but cyber security is not my biggest strength, although I did use prepared statements where there was a possibility for user input :)

Also, since I was experimenting with webpack.config while creating the project, I probably left in a couple dev dependencies in package.json so it might take a couple more seconds for the npm install. For that I'm sorry, but I was focusing more on the product that I'm going to give.

I hope you enjoy the application and I also hope it shows how much effort I tried to put in the project with the time I had.

## Structure
I went for a Laravel like structure for my controllers, models, resources, public, config and route files.

The `App` folder holds 3 things:
- Controllers
- Models
- Router

I tried to be as MVC as I could be, but I might not have did the best practice for all of them.

The config files are in the `config` folder which right now has 3 different files:
- config.sample.php
- database.sample.php
- mail.sample.php

All files have their properties well defined I think, all it needs just that the *.sample* parts are deleted from it :)

The `public` folder - since the project doesn't use any image - only holds the compiled js and css files.

The `resources` folder holds all the source files for the compiling the main.js and main.css files:
- The `css` folder has its main css file and the ones that are included in it
- the `js` folder has its main js file and all the components in the `components` folder

The `routes` folder only has a web.php file in it, which holds all the routes that can be accessed on the site
Every route is routed to `index.php` where the `Router` class detemines what type of route it is and which `Controller`'s what method should it use.

## Installation
1. Clone the project to a folder from terminal - `git clone https://github.com/Zh4rsiest/blexr.git`
2. Cd in the `blexr` folder
3. Create a database and import the `config/database.sql` file in it
4. Edit the `config/database.sample.php` and `config/mail.sample.php` files and delete de `.sample` part
5. Run `composer install` to install dependencies
6. Dump the composer's autoload file from the same folder - `composer dump-autoload`
7. Install all dependencies with npm - `npm install`
8. Build the application in either production mode or development mode - `npm run build` or `npm run dev` or `npm run watch` for watching files


## Access

*username:* admin@blexr.com
*password:* asd
