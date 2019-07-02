<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call('CompaniesTableSeeder');		
		$this->call('EmployeesTableSeeder');		
		$this->call('UsersTableSeeder');		
    }
}

/*
User@LAPTOP-FSJD1IQS c:\xampp\htdocs\vue1
# php artisan make:migration create_companies_and_employees_tables
make sure the file above is complete, i.e. write the migration

# php artisan migrate
Nothing to migrate.

User@LAPTOP-FSJD1IQS c:\xampp\htdocs\vue1
# php composer.phar dump-autoload
Generating autoload filesWarning: Ambiguous class resolution, "CreateCompaniesAGenerated autoload files containing 548 classes

User@LAPTOP-FSJD1IQS c:\xampp\htdocs\vue1
# php artisan migrate:refresh --seed
Rolling back: 2019_04_12_125402_create_companies_and_employees_tables
Rolled back:  2019_04_12_125402_create_companies_and_employees_tables
Migrating: 2019_04_12_125402_create_companies_and_employees_tables
Migrated:  2019_04_12_125402_create_companies_and_employees_tables
Seeding: CompaniesTableSeeder
Seeding: EmployeesTableSeeder

User@LAPTOP-FSJD1IQS c:\xampp\htdocs\vue1
#


*/