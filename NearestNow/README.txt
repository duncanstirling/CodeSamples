                        LARAVEL CODE SAMPLE FROM NEARESTNOW.COM 

Please note nearestnow.com is a work in progress, it is not yet finished, it is at a prototype stage and it is currently not PSR compliant, 
many modifications are planned, time permitting as my priority at the moment is to find a new job. If you would like to employ me as a full stack Laravel 
developer, email me at dgstirling@yahoo.co.uk, see duncanstirling.com 

This example is the most advanced Laravel project I have worked on, i.e. take this none-perfect example as representative of what I have to offer.
-------------------------------------------------------------
# LARAVEL EXAMPLE
This example includes code samples taken from nearestnow.com, my personal project.

-------------------------------------------------------------
# DATABASSE
All tables are prefixed with nn for nearestnow becuase the tables are in a database shared with other applications.

The code sample includes:
1. migrations to create the database tables 
2. Eloquent models to interact with the database
2. seeding to populate the database

-------------------------------------------------------------
# CONTROLLER
Laravel Eloquent models are used to obtain the data from a local MySQL database to create the menus seen on the homepage.

-------------------------------------------------------------
# BLADE
Menus are created directly using foreach loops working with data inserted into the blade from the controller. Menus are also created using Vue.js