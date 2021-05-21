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
		//---------------------------------------------------
		// business finder is searchtype_id 1
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
		//---------------------------------------------------
		// community is searchtype_id 2
		
		$data2[] = ["Activity & Sport Clubs", "sport", "fas fa-hiking"];
		$data2[] = ["Allotments & Gardening", "gardening", "fas fa-spa"];
		$data2[] = ["Art & Hobby Classes", "hobbies", "fas fa-palette"];
		$data2[] = ["Artists & Creators", "artists", "fas fa-palette"];
		$data2[] = ["Car Pools", "carshare", "fas fa-car"];
		$data2[] = ["Child & Parent Groups", "parentchild", "fas fa-baby"];
		$data2[] = ["Cultural & Regligious Groups", "cultural", "fas fa-icons"];
		$data2[] = ["Dating", "dating", "far fa-heart"];
		$data2[] = ["Dog Walkers", "dogs", "fas fa-dog"];
		$data2[] = ["Events & Shows", "events", "fas fa-theater-masks"];
		$data2[] = ["Farm Produce", "farmproduce", "fas fa-tractor"];
		$data2[] = ["Finding Friends", "friends", "fas fa-user-friends"];
		$data2[] = ["Help Offered", "helpoffered", "fas fa-hands-helping"];
		$data2[] = ["Help Wanted", "helpwanted", "fas fa-hands-helping"];
		$data2[] = ["Kids clubs", "kidsclub", "fas fa-child"];
		$data2[] = ["Lost & Found", "lostfound", "fas fa-people-arrows"];
		$data2[] = ["Musicians & Bands", "musicians", "fas fa-guitar"];
		$data2[] = ["Senior Groups", "seniors", "fas fa-users"];
		$data2[] = ["Tutoring & Classes", "tutoring", "fas fa-chalkboard-teacher"];
		$data2[] = ["Volunteers & Charities", "volunteers", "fas fa-hand-holding-heart"];

		foreach ($data2 as $row) {
			
			$row2 = [
				'searchtype_id'              => '2',			
				'searchparentcategory_title' => $row[0],
				'searchparentcategory_name'  => $row[1],
				'searchparentcategory_icon'  => $row[2]
			];
			
			DB::table('nnsearchparentcategories')->insert($row2);
		}
	}		
}
