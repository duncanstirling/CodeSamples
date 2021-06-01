<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class CurrencyApi extends Model
{
    use HasFactory;

    public function getCurrentRatesFromApi()
    {
		$client = new Client([
			'base_uri' => 'http://api.exchangeratesapi.io/v1/',
		]);
		
		$response = $client->request('GET', 'latest', [
			'query' => [
			'access_key' => '690acd5a709d7ef967e54403ae5ef36b',			
			'base' => 'EUR',
			'symbols' => 'USD,GBP,EUR'
			]
		]);	
		return $response;	
	}

    public function getFixedDefaultRates()
    {
		return Storage::get('/info.txt');
	}
}
