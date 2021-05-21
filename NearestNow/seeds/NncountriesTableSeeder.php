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
		$data[] = [7, 'Germany', 'de', 'Germany'];
		$data[] = [8, 'Greece', 'gr', 'Greek'];
		$data[] = [9, 'Holland', 'nl', 'Dutch'];
		$data[] = [10, 'Hungary', 'hu', 'Hungarian'];
		$data[] = [11, 'Indonesia', 'id', 'Indonesian'];
		$data[] = [12, 'Italy', 'it', 'Italian'];
		$data[] = [13, 'Japan', 'jp', 'Japanese'];
		$data[] = [14, 'Latvia', 'lv', 'Latvian'];
		$data[] = [15, 'New Zealand', 'nz', 'Kiwi'];
		$data[] = [16, 'Poland', 'pl', 'Polish'];
		$data[] = [17, 'Romania', 'ro', 'Romanian'];
		$data[] = [18, 'Russia', 'ru', 'Russian'];
		$data[] = [19, 'Spain', 'es', 'Spanish'];
		$data[] = [20, 'Sweden', 'se', 'Swedish'];
		$data[] = [21, 'Switzerland', 'ch', 'Swiss'];
		$data[] = [22, 'Thailand', 'th', 'Thai'];
		$data[] = [23, 'UK', 'gb', 'British'];
		$data[] = [24, 'Ukraine', 'ua', 'Ukranian'];
		$data[] = [25, 'USA', 'us', 'American'];

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
