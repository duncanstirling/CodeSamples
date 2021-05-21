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

		$data[] = [4, 'Shanghai'];
		$data[] = [4, 'Guangzhou'];
		$data[] = [4, 'Beijing'];
		$data[] = [4, 'Shenzhen'];
		$data[] = [4, 'Wuhan'];
		$data[] = [4, 'Hong Kong'];

		$data[] = [5, 'Prague'];
		$data[] = [5, 'Brno'];
		$data[] = [5, 'Ostrava'];
		$data[] = [5, 'Pilsen'];

		$data[] = [6, 'Paris'];
		$data[] = [6, 'Lyon'];
		$data[] = [6, 'Marseille'];
		$data[] = [6, 'Toulouse'];
		$data[] = [6, 'Lille–Roubaixv'];
		$data[] = [6, 'Bordeaux'];
		$data[] = [6, 'Nice'];

		$data[] = [7, 'New York'];
		$data[] = [7, 'Los Angeles'];
		$data[] = [7, 'Chicago'];
		$data[] = [7, 'Houston'];
		$data[] = [7, 'Phoenix'];
		$data[] = [7, 'Texas'];

		$data[] = [8, 'Athens'];
		$data[] = [8, 'Thessaloniki'];
		$data[] = [8, 'Patras'];
		$data[] = [8, 'Heraklion'];
		$data[] = [8, 'Ioannina'];
		$data[] = [8, 'Larissa'];
		$data[] = [8, 'Rhodes'];
		$data[] = [8, 'Chania'];
		$data[] = [8, 'Agrinio'];
		$data[] = [8, 'Volos'];

		$data[] = [9, 'Amsterdam'];
		$data[] = [9, 'Rotterdam'];
		$data[] = [9, 'The Hague'];
		$data[] = [9, 'Utrecht'];
		$data[] = [9, 'Eindhoven'];

		$data[] = [10, 'Budapest'];
		$data[] = [10, 'Debrecen'];
		$data[] = [10, 'Szeged'];
		$data[] = [10, 'Miskolc'];
		$data[] = [10, 'Pécs'];
		$data[] = [10, 'Győr'];
		$data[] = [10, 'Nyíregyháza'];
		$data[] = [10, 'Kecskemét'];
		$data[] = [10, 'Szabadka'];

		$data[] = [11, 'Jakarta'];
		$data[] = [11, 'Surabaya'];
		$data[] = [11, 'Bandung'];
		$data[] = [11, 'Medan'];
		$data[] = [11, 'Semarang'];
		$data[] = [11, 'Palembang'];


		$data[] = [12, 'Rome'];
		$data[] = [12, 'Milan'];
		$data[] = [12, 'Naples'];
		$data[] = [12, 'Turin'];
		$data[] = [12, 'Palermo'];
		$data[] = [12, 'Florence'];

		$data[] = [13, 'Tokyo'];
		$data[] = [13, 'Yokohama'];
		$data[] = [13, 'Osaka'];
		$data[] = [13, 'Nagoya'];
		$data[] = [13, 'Sapporo'];

		$data[] = [14, 'Riga'];
		$data[] = [14, 'Daugavpils'];
		$data[] = [14, 'Liepāja'];
		$data[] = [14, 'Jelgava'];

		$data[] = [15, 'Auckland'];
		$data[] = [15, 'Wellington'];
		$data[] = [15, 'Christchurch'];
		$data[] = [15, 'Hamilton'];

		$data[] = [16, 'Warsaw'];
		$data[] = [16, 'Lodz'];
		$data[] = [16, 'Krakow'];
		$data[] = [16, 'Wroclaw'];
		$data[] = [16, 'Poznan'];
		$data[] = [16, 'Gdansk'];

		$data[] = [17, 'Bucharest'];
		$data[] = [17, 'Constanta'];
		$data[] = [17, 'Brasov'];

		$data[] = [18, 'Moscow'];
		$data[] = [18, 'St. Petersburg'];
		$data[] = [18, 'Novosibirsk'];
		$data[] = [18, 'Yekaterinburg'];

		$data[] = [19, 'Madrid'];
		$data[] = [19, 'Barcelona'];
		$data[] = [19, 'Valencia'];
		$data[] = [19, 'Sevilla'];
		$data[] = [19, 'Bilbao'];
		$data[] = [19, 'Malaga'];
		$data[] = [16, 'Oviedo'];
		$data[] = [19, 'Alicante'];
		$data[] = [19, 'Las Palamas'];
		$data[] = [19, 'Zaragoza'];

		$data[] = [20, 'Stockholm'];
		$data[] = [20, 'Gothenburg'];
		$data[] = [20, 'Malmö'];

		$data[] = [21, 'Zürich'];
		$data[] = [21, 'Geneva'];
		$data[] = [21, 'Basel'];
		$data[] = [21, 'Lausanne'];
		$data[] = [21, 'Bern'];
		$data[] = [21, 'Winterthur'];
		$data[] = [21, 'Lucerne'];

		$data[] = [22, 'Bangkok'];
		$data[] = [22, 'Chiang Mai'];
		$data[] = [22, 'Phuket'];



		$data[] = [23, 'Aberdeen'];
		$data[] = [23, 'Armagh'];
		$data[] = [23, 'Bangor'];
		$data[] = [23, 'Bath'];
		$data[] = [23, 'Belfast'];
		$data[] = [23, 'Birmingham'];
		$data[] = [23, 'Bradford'];
		$data[] = [23, 'Brighton'];
		$data[] = [23, 'Bristol'];
		$data[] = [23, 'Cambridge'];
		$data[] = [23, 'Canterbury'];
		$data[] = [23, 'Cardiff'];
		$data[] = [23, 'Carlisle'];
		$data[] = [23, 'Chester'];
		$data[] = [23, 'Chichester'];
		$data[] = [23, 'Coventry'];
		$data[] = [23, 'Derby'];
		$data[] = [23, 'Dundee'];
		$data[] = [23, 'Durham'];
		$data[] = [23, 'Edinburgh'];
		$data[] = [23, 'Ely'];
		$data[] = [23, 'Exeter'];
		$data[] = [23, 'Glasgow'];
		$data[] = [23, 'Gloucester'];
		$data[] = [23, 'Hereford'];
		$data[] = [23, 'Hull'];
		$data[] = [23, 'Inverness'];
		$data[] = [23, 'Lancaster'];
		$data[] = [23, 'Leeds'];
		$data[] = [23, 'Leicester'];
		$data[] = [23, 'Lichfield'];
		$data[] = [23, 'Lincoln'];
		$data[] = [23, 'Lisburn'];
		$data[] = [23, 'Liverpool'];
		$data[] = [23, 'London'];
		$data[] = [23, 'Londonderry'];
		$data[] = [23, 'Manchester'];
		$data[] = [23, 'Newcastle'];
		$data[] = [23, 'Newport'];
		$data[] = [23, 'Newry'];
		$data[] = [23, 'Norwich'];
		$data[] = [23, 'Nottingham'];
		$data[] = [23, 'Oxford'];
		$data[] = [23, 'Peterborough'];
		$data[] = [23, 'Plymouth'];
		$data[] = [23, 'Portsmouth'];
		$data[] = [23, 'Preston'];
		$data[] = [23, 'Ripon'];
		$data[] = [23, 'Salford'];
		$data[] = [23, 'Salisbury'];
		$data[] = [23, 'Sheffield'];
		$data[] = [23, 'Southampton'];
		$data[] = [23, 'St Albans'];
		$data[] = [23, 'St Davids'];
		$data[] = [23, 'Stirling'];
		$data[] = [23, 'Stoke-on-Trent'];
		$data[] = [23, 'Sunderland'];
		$data[] = [23, 'Swansea'];
		$data[] = [23, 'Truro'];
		$data[] = [23, 'Wakefield'];
		$data[] = [23, 'Wells'];
		$data[] = [23, 'Westminster'];
		$data[] = [23, 'Winchester'];
		$data[] = [23, 'Wolverhampton'];
		$data[] = [23, 'Worcester'];
		$data[] = [23, 'York'];




		$data[] = [24, 'Kiev'];
		$data[] = [24, 'Kharkiv'];
		$data[] = [24, 'Odessa'];

		$data[] = [25, 'New York'];
		$data[] = [25, 'Los Angeles'];
		$data[] = [25, 'Chicago'];
		$data[] = [25, 'Houston'];
		$data[] = [25, 'Phoenix'];


		foreach ($data as $key => $row) {
			
			$row2 = [		
				'country_id' => $row[0],
				'city_name'  => $row[1],
			];
			
			DB::table('nninternationalcities')->insert($row2);
		}
    }
}
