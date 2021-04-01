                        LARAVEL CODE SAMPLE: USE OF VUE.JS

Please note nearestnow.com is a work in progress, it is at prototype stage however basic functionality does work. If you would like to employ me as a full stack Laravel 
developer, email me at dgstirling@yahoo.co.uk, see duncanstirling.com. During recent months I have been working with Laravel7, Angular.js and Vue.js. 

Code samples are taken directly from the project however much of the code from each sample has been removed to enable you to focus on the more interesting parts.
This project implements Laravel 7.11, Vue.js, Angular.js, JQuery, ES6, Bootstrap, CSS, MySQL and PHPUnit (test examples provided).
-------------------------------------------------------------
# VUE.JS USAGE

Vue.js has been used to create menus that are present on the first page. A list of menu categories are supplied to the blade directly fromt he controller.
The menu options for each category are supplied to the Vue.js class. When an instance of the class is taken these are supplied to the code within the relevant div,
where the menus are dynamically generated. Menu options show the menu name and v-binding has also been used so set a menu value in the menu link.
When the menu options is clicked a listener extracts the data from the link and sets it in the form at the top of the home page as well as a hidden variable 
holding country and city id's.