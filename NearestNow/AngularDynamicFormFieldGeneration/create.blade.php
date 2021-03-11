@extends('layouts.app')
@section('title')
Create an Advert
@endsection
@section('content')
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
   tinymce.init({
   selector: "textarea",
   plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
   });
</script>
<form action="{{ url('/new-post') }}" method="post">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <div class="form-group">
      <input required="required" value="{{ old('title') }}" placeholder="Enter title here" type="text" name="title" class="form-control" />
   </div>
   <style>
      button, input, select, textarea {
      font-family: inherit;
      font-size: inherit;
      line-height: inherit;
      display: block;
      width: 100%;
      height: 34px;
      padding: 6px 12px;
      font-size: 14px;
      line-height: 1.42857143;
      color: #555;
      background-color: #fff;
      background-image: none;
      border: 1px solid #ccc;
      border-radius: 4px;
      }
   </style>
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
   <div ng-app="myApp" ng-controller="myCtrl">
      <h3>Select the UK or abroad</h3>
      <select name="region" ng-model="user.myVar">
      <option value=""  {{ old('region') == '' ? 'selected' : '' }}>select</option>
      <option value="International"  {{ old('region') == 'International' ? 'selected' : '' }}>International</option>
      <option value="UK" {{ old('region') == 'UK' ? 'selected' : '' }}>UK</option>
      </select> 
      <div ng-show="user.myVar == 'International'">
         {{ old('internationalCountry') }}	
         <h3>%%user.myVar%% locations</h3>
         <select name="internationalCountryID" ng-model="selectedcountry" ng-options="k as v.countryName for (k , v) in cities"></select>
      </div>
      <div ng-show="selectedcountry">
         <h4>Select a city in %%cities[selectedcountry]['countryName']%%</h4>
         <select name="internationalCityID" ng-model="selectLocation" ng-options="k as v for (k , v) in cities[selectedcountry]['cities']">
         </select> 	   
      </div>
      <div ng-show="user.myVar == 'UK'">
         <h3>%%myVar%% locations</h3>
         <select name="UKCIty" ng-model="selectLocation" ng-options="k as v for (k , v) in cities['23']['cities']">
         </select> 
      </div>
      <div ng-show="selectLocation">
         <h3 ng-show="user.myVar == 'UK'">
            You have selected %%cities['23']['cities'][selectLocation]%%
         </h3>
         <h3 ng-show="user.myVar != 'UK'">
            You have selected %%cities[selectedcountry]['cities'][selectLocation]%%
         </h3>
         <h4>Select a search type</h4>
         <select name="searchType" ng-model="searchTypeSelected" ng-options="k as v for (k , v) in searchType"> </select>
      </div>
      <div ng-show="searchTypeSelected == 1">
         <div ng-show="searchTypeSelected">
            <h3>You have selected %%searchType[searchTypeSelected]%%</h3>
            <h4>Select a category</h4>
            <select name="bfParentCat" ng-model="bfParentCat" ng-options="k as v['parent']['parentName'] for (k , v) in businessFinder"></select>
         </div>
         <div ng-app="" ng-if=category=bfParentCat>
            <div ng-show="bfParentCat">
               <h4>Select a sub category in %%businessFinder[bfParentCat]['parent']['parentName']%%</h4>
               <select name="bfinderChildCategory" ng-model="bfChildCat" ng-options="k as v for (k , v) in businessFinder[bfParentCat]['child']">
               </select>  
            </div>
         </div>
      </div>
      <div ng-show="searchTypeSelected == '2'">
         <div ng-show="searchTypeSelected">
            <h3>You have selected %%searchType[searchTypeSelected]%%</h3>
            <h4>Select a category</h4>
            <select name="communityParentCategory" ng-model="comParentCat" ng-options="k as v for (k , v) in communityFinder"></select>		
         </div>
      </div>
      <div ng-show="searchTypeSelected == '3'">
         <div ng-show="searchTypeSelected">
            <h3>You have selected %%searchType[searchTypeSelected]%%</h3>
            <h4>Select a category</h4>
            <select name="marketParentCategory" ng-model="marketParentCat" ng-options="k as v for (k , v) in marketplace">
            </select>  		
         </div>
      </div>
      <!-- ########################################################## -->     
   </div>
   <?php
      $cities = array(); 
      ?>
   @foreach ($internationalcities as $city)	
   <?php 	
      $cityID      = $city->id;
      $cityName    = $city->city_name;
      $countryID   = $city->country_id;
      $countryName = $city->country_name;	
      
      if($city->country_id == 23){
      //UK
      // Rest of the world
      $cities[23]['cities'][$cityID] = $cityName;			
      $cities[23]['countryName']     = $countryName;			
      }else{
      // Rest of the world
      $cities[$countryID]['cities'][$cityID] = $cityName;			
      $cities[$countryID]['countryName']     = $countryName;				
      }
      ?>
   @endforeach	 
   <?php 
      $citiesJsonEncoded = json_encode((object)$cities);			
      $searchtypesArr = array(); 
      ?>
   @foreach ($searchtypes as $type)	
   <?php 		
      $searchtypesArr[$type->id] = $type->searchtypes_description;		
      ?>
   @endforeach	 
   <?php 	
      $searchtypesJsonEncoded = json_encode((object)$searchtypesArr);	
      $businessFinderArr = array();
      $communityFinderArr = array();
      ?>
   @foreach ($businessAndCommunity as $category)	
   <?php 
      $parentTitle = $category->searchparentcategory_title;
      $parentName  = $category->searchparentcategory_name;	
      $parentID    = $category->parentID;
      $childID     = $category->childID;
      $childName   = $category->searchchildcategory_name;	
      
      if($category->searchtype_id == 1){	
      $businessFinderArr[$parentID]['parent']['parentName']  = $parentName;	
      $businessFinderArr[$parentID]['parent']['parentTitle'] = $parentTitle;				
      $businessFinderArr[$parentID]['child'][$childID]	   = $childName;				
      }else if($category->searchtype_id == 2){	
      $communityFinderArr[$parentID] = $parentName;
      }			
      ?>
   @endforeach	 
   <?php 
      $businessFinderJsonEncoded  = json_encode((object)$businessFinderArr);	
      $communityFinderJsonEncoded = json_encode((object)$communityFinderArr);	
      $marketplaceArr = array();
      ?>
   @foreach ($marketplaces as $category)	
   <?php 
      $marketID = $category->id;
      $marketplaceArr[$marketID] = $category->market_category;			
      ?>
   @endforeach	 
   <?php 
      $marketplaceJsonEncoded = json_encode($marketplaceArr);
      ?>
   <script>
      var app = angular.module('myApp', []);
      
      app.config(function($interpolateProvider) {
      $interpolateProvider.startSymbol('%%');
      $interpolateProvider.endSymbol('%%');
      });
      
      app.controller('myCtrl', function($scope) {
      
      $scope.cities          = <?php echo $citiesJsonEncoded ?>;	
      $scope.searchType      = <?php echo $searchtypesJsonEncoded ?>;		
      $scope.businessFinder  = <?php echo $businessFinderJsonEncoded ?>;
      $scope.communityFinder = <?php echo $communityFinderJsonEncoded ?>;
      $scope.marketplace     = <?php echo $marketplaceJsonEncoded;?>;
      
      $scope.master = {myVar:"{{ old('region') }}", selectedcountry:"{{ old('internationalCountry') }}"};
      $scope.reset = function() {
      $scope.user = angular.copy($scope.master);
      };
      $scope.reset();
      
      });
   </script>
   <br /><br />  
   <div class="form-group">
      <textarea name='body' class="form-control">{{ old('body') }}</textarea>
   </div>
   <input type="submit" name='publish' class="btn btn-success" value="Publish" />
   <input type="submit" name='save' class="btn btn-default" value="Save Draft" />
</form>
@endsection