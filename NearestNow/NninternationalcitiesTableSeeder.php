<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NninternationalcitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data   = [];	
		$data[] = [1, 'Sydney'];
		$data[] = [1, 'Melbourne'];
		$data[] = [1, 'Brisbane'];
		$data[] = [1, 'Perth'];
		$data[] = [1, 'Adelaide'];

		$data[] = [2, 'Vienna'];
		$data[] = [2, 'Graz'];
		$data[] = [2, 'Linz'];
		$data[] = [2, 'Salzburg'];
		$data[] = [2, 'Innsbruck'];
		$data[] = [2, 'Klagenfurt'];

		$data[] = [3, 'Toronto'];
		$data[] = [3, 'Montreal'];
		$data[] = [3, 'Calgary'];
		$data[] = [3, 'Ottawa'];
		$data[] = [3, 'Vancouver'];

		// and many more cities...


		foreach ($data as $key => $row) {
			
			$row2 = [		
				'country_id' => $row[0],
				'city_name'  => $row[1],
			];
			
			DB::table('nninternationalcities')->insert($row2);
		}
    }
}
