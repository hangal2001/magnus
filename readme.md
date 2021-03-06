# Galleries
## Setup
* clone the repo
* run `composer update` to install all the composer packages
* run `npm install` to install all NPM assets. So far all of the npm modules used are just for development purposes.
* run `php artisan migrate --seed` to run the migrations and seed the tables
* run `gulp` to compile bootstrap LESS and concatenate vendor js script files
* You're good to go!

#### Composer Packages Used
 * `"laravel/framework": "5.2.*",`
 * `"intervention/image": "^2.3",`
 * `"laravelcollective/html": "5.2.*"`

#### NPM Dev Dependencies
* `"gulp": "^3.8.8",`
* `"gulp-concat": "*",`
* `"gulp-less": "*",`
* `"babelify": "*",`
* `"browserify": "^13.0.0",`
* `"watchify": "^3.1.0",`
* `"gulp-jsbeautifier": "*",`
* `"gulp-phpcbf": "*",`
* `"gulp-watchify": "*",`
* `"strictify": "^0.2.0"`

Bootstrap 3, AngularJS and its modules, CropperJS and JQuery are included in the vendor files. Run gulp to generate them.

## Screens
![home-page](http://i.imgur.com/MAsE6sA.png)
* All images used as seed and test data shown are copyright their original creator or owner 

## Laravel Shoutout

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
