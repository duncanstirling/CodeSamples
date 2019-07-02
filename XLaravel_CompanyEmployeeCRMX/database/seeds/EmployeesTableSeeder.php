<?php
// /database/migrations/seeds/CompaniesTableSeeder.php
 
use Illuminate\Database\Seeder;
 
class EmployeesTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('employees')->delete();
 
        $employees = array(
			['id' => 1, 'firstName' => 'duncan1', 'lastName' => 'stirling1','slug' => 'employee-1', 'company_id' => '2', 'email' => 'dgstirling@yahoo.co.uk', 'phone' => '123456', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 2, 'firstName' => 'duncan2', 'lastName' => 'stirling2','slug' => 'employee-2', 'company_id' => '1', 'email' => 'dgstirling@yahoo.co.uk', 'phone' => '123456', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 3, 'firstName' => 'duncan3', 'lastName' => 'stirling3','slug' => 'employee-3', 'company_id' => '3', 'email' => 'dgstirling@yahoo.co.uk', 'phone' => '123456', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 4, 'firstName' => 'duncan4', 'lastName' => 'stirling4','slug' => 'employee-4', 'company_id' => '2', 'email' => 'dgstirling@yahoo.co.uk', 'phone' => '123456', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 5, 'firstName' => 'duncan5', 'lastName' => 'stirling5','slug' => 'employee-5', 'company_id' => '1', 'email' => 'dgstirling@yahoo.co.uk', 'phone' => '123456', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 6, 'firstName' => 'duncan6', 'lastName' => 'stirling6','slug' => 'employee-66', 'company_id' => '2', 'email' => 'dgstirling@yahoo.co.uk', 'phone' => '123456', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 7, 'firstName' => 'duncan7', 'lastName' => 'stirling7','slug' => 'employee-7', 'company_id' => '1', 'email' => 'dgstirling@yahoo.co.uk', 'phone' => '123456', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 8, 'firstName' => 'duncan8', 'lastName' => 'stirling8','slug' => 'employee-8', 'company_id' => '3', 'email' => 'dgstirling@yahoo.co.uk', 'phone' => '123456', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 9, 'firstName' => 'duncan9', 'lastName' => 'stirling9','slug' => 'employee-9', 'company_id' => '2', 'email' => 'dgstirling@yahoo.co.uk', 'phone' => '123456', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 10, 'firstName' => 'duncan10', 'lastName' => 'stirling10','slug' => 'employee-10', 'company_id' => '1', 'email' => 'dgstirling@yahoo.co.uk', 'phone' => '123456', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 11, 'firstName' => 'duncan11', 'lastName' => 'stirling11','slug' => 'employee-11', 'company_id' => '2', 'email' => 'dgstirling@yahoo.co.uk', 'phone' => '123456', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['id' => 12, 'firstName' => 'duncan12', 'lastName' => 'stirling12','slug' => 'employee-12', 'company_id' => '1', 'email' => 'dgstirling@yahoo.co.uk', 'phone' => '123456', 'created_at' => new DateTime, 'updated_at' => new DateTime]
		);
 
        // Uncomment the below to run the seeder
        DB::table('employees')->insert($employees);
    }
}