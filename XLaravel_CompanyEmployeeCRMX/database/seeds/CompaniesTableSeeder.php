<?php
// /database/migrations/seeds/CompaniesTableSeeder.php
 
use Illuminate\Database\Seeder;
 
class CompaniesTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('companies')->delete();
 
        $companies = array(
			['id' => 1, 'name' => 'company 1', 'slug' => 'company-1', 'website' => 'abc.com', 'email' => 'dgstirling@yahoo.co.uk', 'logo' => 'duncanImage.jpg', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 2, 'name' => 'company 2', 'slug' => 'company-2', 'website' => 'abc.com', 'email' => 'dgstirling@yahoo.co.uk', 'logo' => 'duncanImage.jpg', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 3, 'name' => 'company 3', 'slug' => 'company-3', 'website' => 'abc.com', 'email' => 'dgstirling@yahoo.co.uk', 'logo' => 'duncanImage.jpg', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 4, 'name' => 'company 4', 'slug' => 'company-4', 'website' => 'abc.com', 'email' => 'dgstirling@yahoo.co.uk', 'logo' => 'duncanImage.jpg', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 5, 'name' => 'company 5', 'slug' => 'company-5', 'website' => 'abc.com', 'email' => 'dgstirling@yahoo.co.uk', 'logo' => 'duncanImage.jpg', 'created_at' => new DateTime, 'updated_at' => new DateTime],			
			['id' => 6, 'name' => 'company 6', 'slug' => 'company-6', 'website' => 'abc.com', 'email' => 'dgstirling@yahoo.co.uk', 'logo' => 'duncanImage.jpg', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 7, 'name' => 'company 7', 'slug' => 'company-7', 'website' => 'abc.com', 'email' => 'dgstirling@yahoo.co.uk', 'logo' => 'duncanImage.jpg', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 8, 'name' => 'company 8', 'slug' => 'company-8', 'website' => 'abc.com', 'email' => 'dgstirling@yahoo.co.uk', 'logo' => 'duncanImage.jpg', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 9, 'name' => 'company 9', 'slug' => 'company-9', 'website' => 'abc.com', 'email' => 'dgstirling@yahoo.co.uk', 'logo' => 'duncanImage.jpg', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 10, 'name' => 'company 10', 'slug' => 'company-10', 'website' => 'abc.com', 'email' => 'dgstirling@yahoo.co.uk', 'logo' => 'duncanImage.jpg', 'created_at' => new DateTime, 'updated_at' => new DateTime],			
			['id' => 11, 'name' => 'company 11', 'slug' => 'company-11', 'website' => 'abc.com', 'email' => 'dgstirling@yahoo.co.uk', 'logo' => 'duncanImage.jpg', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 12, 'name' => 'company 12', 'slug' => 'company-12', 'website' => 'abc.com', 'email' => 'dgstirling@yahoo.co.uk', 'logo' => 'duncanImage.jpg', 'created_at' => new DateTime, 'updated_at' => new DateTime]
		);
 
        // Uncomment the below to run the seeder
        DB::table('companies')->insert($companies);
    }
}


