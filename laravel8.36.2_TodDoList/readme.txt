
Laravel Framework 8.36.2 Example - To Do List
==============================================

This is a basic prototype to demonstrate some awareness of Laravel 8.

# composer require laravel/jetstream
# php artisan jetstream:install livewire
# php composer.phar require livewire/livewire

Composure is used to install the dependencies, i.e. Jetstream and Livewire. I think Jetstream was supposed to install livewire, 
it didn't so I installed that dependency seperately. Laravel mix is also used which helps webpack create Laravel applications.
---------------------------------------------------------------------------
# Please install "npm install && npm run dev" to build your assets

npm is an online repository for the publishing of open-source Node.js projects and a command-line utility for interacting with 
the repository that aids in package installation, version management, and dependency management. npm dev combines JavaScript 
files into a browser friendly combined file.
Migrations and models were created to specify the database and enable interactions with it.
---------------------------------------------------------------------------
# php artisan migrate 

This creates the database. In this case it wasn't seeded. 
Controllers and views (blade templates) were created. Routing was creating in Web.php.
---------------------------------------------------------------------------
# php artisan serve 

Finally, running this command enables the application to run locally on the php development server. I can't demonstrate 
this as I can't have reserved port numbers in shared hosting so the screen capture in this directory shows what you would see.





