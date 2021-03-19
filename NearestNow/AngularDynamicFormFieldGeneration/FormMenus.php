<?php
namespace App;

use App\Nncountry;
use App\Nninternationalcity;
use App\Nnmarketplace;
use App\Nnsearchparentcategory;
use App\Nnsearchchildcategory;

class FormMenus
{
    private $menusRequired;

    function __construct($menusRequired)
    {
        $this->menusRequired = $menusRequired;
    }

    public function getMenus()
    {
        $menus = [];
        if (
            in_array("business", $this->menusRequired) ||
            in_array("community", $this->menusRequired)
        ) {
            $businessAndCommunity = Nnsearchchildcategory::select(
                'nnsearchchildcategories.id as childID',
                'nnsearchparentcategories.id as parentID',
                'nnsearchparentcategories.searchparentcategory_name',
                'nnsearchparentcategories.searchparentcategory_title',
                'nnsearchparentcategories.searchparentcategory_icon',
                'nnsearchparentcategories.searchtype_id',
                'nnsearchchildcategories.searchchildcategory_name',
                'nnsearchchildcategories.searchparentcategory_id'
            )
                ->join(
                    'nnsearchparentcategories',
                    'nnsearchchildcategories.searchparentcategory_id',
                    '=',
                    'nnsearchparentcategories.id',
                    'right outer'
                )
                ->orderBy(
                    'nnsearchparentcategories.searchparentcategory_name',
                    'ASC'
                )
                ->orderBy(
                    'nnsearchchildcategories.searchchildcategory_name',
                    'ASC'
                )
                ->paginate(200);

            $businessFinderArr = [];
            $communityFinderArr = [];
            foreach ($businessAndCommunity as $category) {
                $parentTitle = $category->searchparentcategory_title;
                $parentName = $category->searchparentcategory_name;
                $parentID = $category->parentID;
                $childID = $category->childID;
                $childName = $category->searchchildcategory_name;

                if ($category->searchtype_id == 1) {
                    $businessFinderArr[$parentID]['parent'][
                        'parentName'
                    ] = $parentName;
                    $businessFinderArr[$parentID]['parent'][
                        'parentTitle'
                    ] = $parentTitle;
                    $businessFinderArr[$parentID]['child'][
                        $childID
                    ] = $childName;
                } elseif ($category->searchtype_id == 2) {
                    $communityFinderArr[$parentID] = $parentName;
                }
            }
            $menus['businessFinderJsonEncoded'] = json_encode(
                (object) $businessFinderArr
            );
            $menus['communityFinderJsonEncoded'] = json_encode(
                (object) $communityFinderArr
            );
        }
        //###########################################################################
        if (in_array("cities", $this->menusRequired)) {
            $internationalcities = Nninternationalcity::select(
                'nninternationalcities.id',
                'nncountries.country_name',
                'nncountries.country_description',
                'nncountries.country_code',
                'nninternationalcities.city_name',
                'nninternationalcities.country_id'
            )
                ->join(
                    'nncountries',
                    'nninternationalcities.country_id',
                    '=',
                    'nncountries.id'
                )
                ->orderBy('nncountries.country_name', 'ASC')
                ->orderBy('nninternationalcities.city_name', 'ASC')
                ->paginate(200);

            $cities = [];
            foreach ($internationalcities as $city) {
                $cityID = $city->id;
                $cityName = $city->city_name;
                $countryID = $city->country_id + 0;
                $countryName = $city->country_name;

                if ($city->country_id == 23) {
                    //UK
                    // Rest of the world
                    $cities[23]['cities'][$cityID] = $cityName;
                    $cities[23]['countryName'] = $countryName;
                } else {
                    // Rest of the world
                    $cities[$countryID]['cities'][$cityID] = $cityName;
                    $cities[$countryID]['countryName'] = $countryName;
                }
            }
            $menus['citiesJsonEncoded'] = json_encode((object) $cities);
        }
        //###########################################################################
        if (in_array("market", $this->menusRequired)) {
            $marketplaces = Nnmarketplace::all();

            $marketplaceArr = [];
            foreach ($marketplaces as $category) {
                $marketID = $category->id;
                $marketplaceArr[$marketID] = $category->market_category;
            }
            $menus['marketplaceJsonEncoded'] = json_encode($marketplaceArr);
        }
        //###########################################################################
        if (in_array("searchtype", $this->menusRequired)) {
            $searchtypes = Nnsearchtype::all();

            $searchtypesArr = [];
            foreach ($searchtypes as $type) {
                $searchtypesArr[$type->id] = $type->searchtypes_description;
            }
            $menus['searchtypesJsonEncoded'] = json_encode(
                (object) $searchtypesArr
            );
        }
        //###########################################################################
        return $menus;
    }
}