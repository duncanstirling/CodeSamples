<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NnmarketplacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data   = ["antiques", "appliances", "arts+crafts", "atv/utv/sno", "auto parts", "aviation", "baby+kid", "beauty+hlth", "bike parts", "bikes", "boat parts", "boats", "books", "caravn+mtrhm", "cars+vans", "cds/dvd/vhs", "clothes+acc", "collectibles", "computer parts", "computers", "electronics", "farm+garden", "free", "furniture", "garage sale", "general", "heavy equip", "household", "jewellery", "materials", "mobile phones", "motorbike parts", "motorbike", "music instr", "photo+video", "pet accessories", "sporting", "tickets", "tools", "toys+games", "trailers", "video gaming", "wanted", "wheels+tires"];

		foreach ($data as $cat) {
			// business finder is 1
			$row = [
				'searchtype_id'   => '3',			
				'market_category' => $cat
			];			
			DB::table('nnmarketplaces')->insert($row);
		}
    }
}
