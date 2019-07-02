<?php
// /database/migrations/seeds/CompaniesTableSeeder.php
 
use Illuminate\Database\Seeder;
 
class UsersTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();
 
        $users = array(
			['id' => 1, 'name' => 'Admin', 'email' => 'admin@abc.com', 'password' => '$2y$10$8Tfu6qdGetJJrRev8iV.7.vj0mmEGkZxARSqpQMg5yvKyjfVl7TKS', 'created_at' => new DateTime, 'updated_at' => new DateTime],			
		);
 
        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
}


