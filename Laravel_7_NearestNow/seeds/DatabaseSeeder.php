<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
		$this->call(NnsearchtypeTableSeeder::class);
		$this->call(NnsearchparentcategoriesTableSeeder::class);
		$this->call(NnsearchchildcategoriesTableSeeder::class);
		$this->call(NnmarketplacesTableSeeder::class);
		$this->call(NncountriesTableSeeder::class);	
		$this->call(NninternationalcitiesTableSeeder::class);			
    }
}
