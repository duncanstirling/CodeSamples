<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Nncountry;
use App\Nncity;
use App\Nninternationalcity;
use App\Nnmarketplace;
use App\Nnsearchparentcategory;
use App\Nnsearchchildcategory;

class HomepageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
		$childcategories = Nnsearchchildcategory::select('nnsearchchildcategories.id', 'nnsearchparentcategories.searchparentcategory_name', 'nnsearchparentcategories.searchparentcategory_title',
		'nnsearchparentcategories.searchparentcategory_icon',
		'nnsearchchildcategories.searchchildcategory_name', 'nnsearchchildcategories.searchparentcategory_id')
                 ->join('nnsearchparentcategories', 'nnsearchchildcategories.searchparentcategory_id', '=', 'nnsearchparentcategories.id')
                 ->orderBy('nnsearchparentcategories.searchparentcategory_name', 'ASC')
				 ->orderBy('nnsearchchildcategories.searchchildcategory_name', 'ASC')
                 ->paginate(200);
				 
		//--------------------------------------------------	
		
		$cities = Nncity::select('nncities.id', 'nncountries.country_name', 'nncountries.country_code', 'nncities.city_name', 'nncities.country_id')
                 ->join('nncountries', 'nncities.country_id', '=', 'nncountries.id')
                 ->orderBy('nncountries.country_name', 'ASC')
				 ->orderBy('nncities.city_name', 'ASC')
                 ->paginate(100);
		
		$ukcitiesArr = array();
		foreach($cities as $city)
		{
			$ukcitiesArr['cities'][$city->id] = $city->city_name;
			$ukcitiesArr['country_name']      = $city->country_name;
			$ukcitiesArr['country_code']      = $city->country_code;
			$ukcitiesArr['country_id']        = $city->country_id;			
		}
		
		//--------------------------------------------------	
		
		$worldwide = Nninternationalcity::select('nninternationalcities.id', 'nncountries.country_name', 'nncountries.country_code', 'nninternationalcities.city_name', 'nninternationalcities.country_id')
                 ->join('nncountries', 'nninternationalcities.country_id', '=', 'nncountries.id')
                 ->orderBy('nncountries.country_name', 'ASC')
				 ->orderBy('nninternationalcities.city_name', 'ASC')
                 ->paginate(200);		/////////////////////
		
		$internationalcitiesArr = array();
		foreach($worldwide as $city)
		{
			$internationalcitiesArr[$city->country_name]['cities'][$city->id] = $city->city_name;
			$internationalcitiesArr[$city->country_name]['country_code']      = $city->country_code;
			$internationalcitiesArr[$city->country_name]['country_id']        = $city->country_id;			
		}		
		
		//--------------------------------------------------	
		
		$marketplaces = Nnmarketplace::all();

        return view('welcome')
		->withUkcities($ukcitiesArr)
		->withInternationalcities($internationalcitiesArr)
		->withMarketplaces($marketplaces)
		->withChildcategories($childcategories);	
    }
	
	// and many more functions...
}
