<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NnsearchtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {		
		$data   = [];
		$data[] = ['searchtypes_name' => 'business'];
		$data[] = ['searchtypes_name' => 'community'];
		$data[] = ['searchtypes_name' => 'marketplace'];
		
		foreach ($data as $row) {
			DB::table('nnsearchtypes')->insert($row);
		}
    }
}
