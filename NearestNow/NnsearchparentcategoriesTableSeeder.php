<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NnsearchparentcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data   = [];			
		$data[] = ["Automotive", "automotive", "fas fa-car"];
		$data[] = ["Business", "business", "fas fa-percent"];
		$data[] = ["Computers & IT", "computers", "fas fa-tv"];
		$data[] = ["Construction", "construction", "fas fa-door-open"];
		$data[] = ["Education", "education", "fas fa-book-reader"];
		$data[] = ["Employment", "employment", "fas fa-user-tie"];
		$data[] = ["Entertainment", "entertainment", "fas fa-theater-masks"];
		$data[] = ["Law", "law", "fas fa-balance-scale"];
		$data[] = ["Health & Beauty", "health", "fas fa-medkit"];
		$data[] = ["Home & Garden", "home", "fas fa-leaf"];
		$data[] = ["Engineering", "engineering", "fas fa-wrench"];
		$data[] = ["Internet", "internet", "fas fa-wifi"];
		$data[] = ["Property", "property", "fas fa-sign"];
		$data[] = ["Shopping", "shopping", "fas fa-tags"];
		$data[] = ["Science & Env", "science", "fas fa-atom"];
		$data[] = ["Small Business", "smallbusiness", "fas fa-fax"];
		$data[] = ["Society & Culture", "society", "fas fa-globe"];
		$data[] = ["Sports & Fitness", "sport", "fas fa-running"];
		$data[] = ["Telecomms", "telecomms", "fas fa-phone-square-alt"];
		$data[] = ["Travel & Tourism", "travel", "fas fa-luggage-cart"];

		foreach ($data as $row) {
			// business finder is 1
			$row2 = [
				'searchtype_id'              => '1',			
				'searchparentcategory_title' => $row[0],
				'searchparentcategory_name'  => $row[1],
				'searchparentcategory_icon'  => $row[2]
			];
			
			DB::table('nnsearchparentcategories')->insert($row2);
		}
    }
}
