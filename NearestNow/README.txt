                        LARAVEL CODE SAMPLE FROM NEARESTNOW.COM 


Please note nearestnow.com is a work in progress, it is at prototype stage however basic functionality does work. If you would like to employ me as a full stack Laravel 
developer, email me at dgstirling@yahoo.co.uk, see duncanstirling.com. During recent months I have been working with Laravel7, Angular.js and Vue.js. 

Code samples are taken directly from the project however much of the code from each sample has been removed to enable you to focus on the more interesting parts.
-------------------------------------------------------------
# DATABASSE
All tables are prefixed with nn for nearestnow becuase the tables are in a database shared with other applications.

The code sample includes:
1. migrations to create the database tables 
2. Eloquent models to interact with the database
3. seeding to populate the database
4. A blade template for creating a new advert which uses Angular to create further menu selections based on previous selections
5. Extracts from the home page blade which uses data inserted directly into foreach loops to create meunus and Vue.js to create and add menus to the page
   Using Vue.js is a more complicated approach however it will give more control over what is displayed in the browser
6.  Laravel Eloquent models are used to obtain the data from a local MySQL database to create the menus seen on the homepage
7. Controllers use Eloquent models to insert data into the page
