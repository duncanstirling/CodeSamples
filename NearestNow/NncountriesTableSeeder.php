<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NncountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data   = [];	
		$data[] = [1, 'Australia', 'au', 'Australian'];
		$data[] = [2, 'Austria', 'fr', 'French'];
		$data[] = [3, 'Canada', 'ca', 'Canadian'];
		$data[] = [4, 'China', 'cn', 'Chinese'];
		$data[] = [5, 'Czech R', 'cz', 'Czech'];
		$data[] = [6, 'France', 'fr', 'French'];
		// and many more countries...

		foreach ($data as $key => $row) {
			
			$row2 = [
				'id'                  => $row[0],			
				'country_name'        => $row[1],
				'country_code'        => $row[2],
				'country_description' => $row[3],
			];
			
			DB::table('nncountries')->insert($row2);
		}
    }
}
