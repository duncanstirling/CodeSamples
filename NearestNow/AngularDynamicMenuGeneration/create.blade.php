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
      <select ng-model="myVar">
         <option value="International">international
         <option value="UK">UK
      </select>
      <div ng-show="myVar == 'International'">
         <h3>%%myVar%% locations</h3>
         <select ng-model="selectedcountry" ng-options="v as k for (k , v) in international"></select>
      </div>
      <div ng-show="selectedcountry">
         <h4>Select a city in %%selectedcountry.name%%</h4>
         <select name="internationalCountryID" ng-model="selectLocation" ng-options="x for x in selectedcountry.values">
         </select>    
      </div>
      <div ng-show="myVar == 'UK'">
         <h3>%%myVar%% locations</h3>
         <h4>Listing %%myVar%% locations</h4>
         <select  name="UKCountryID" ng-model="selectLocation" ng-options="x for x in UK">
         </select>     
      </div>
      <div ng-show="selectLocation">
         <h3>You have selected %%selectLocation%%</h3>
         <h4>Select business finder or community adverts</h4>
         <select name="advertType" ng-model="searchTypeSelected">
            <option ng-repeat="(key, value) in searchType" value="%%key%%">%%value%%</option>
         </select>
      </div>
      <div ng-show="searchTypeSelected == 'business'">
         <div ng-show="searchTypeSelected">
            <h3>You have selected %%searchTypeSelected%%</h3>
            <h4>Select a category</h4>
            <select name="businessFinderParentCategory" ng-model="bfindercatselected" ng-options="v as k for (k , v) in businessFinder"></select>
         </div>
         <div ng-app="" ng-if=category.list=bfindercatselected>
            <div ng-show="bfindercatselected">
               <h4>Select a sub category in %%category.list.name%%</h4>
               <select name="businessFinderChildCategory" ng-model="selectLocation" ng-options="x for x in category.list.values">
               </select>  
            </div>
         </div>
      </div>
      <div ng-show="searchTypeSelected == 'community'">
         <div ng-show="searchTypeSelected">
            <h3>You have selected %%searchTypeSelected%%</h3>
            <p>Select a category</p>
            <select name="businessFinderParentCategory" ng-model="selectLocation2" ng-options="v as k for (k , v) in communityFinder"></select>		
         </div>
      </div>
      <!-- ==================== 2 ====================== --> 
      <div ng-show="searchTypeSelected == 'marketplace'">
         <div ng-show="searchTypeSelected">
            <h3>You have selected %%searchTypeSelected%%</h3>
            <p>Select a category</p>
            <select name="marketplaceCategory" ng-model="selectLocation" ng-options="x for x in marketplace">
            </select>  		
         </div>
      </div>
   </div>
   <?php 
      $internationalCities = array();
      $UKCities = array(); 
      ?>
   @foreach ($internationalcities as $city)	
   <?php 		
      if($city->country_id == 23){
      	//UK
      	$UKCities[] = $city->city_name;
      }else{
      	// Rest of the world
      	$cityName    = $city->city_name;
      	$countryName = $city->country_name;	
      	$internationalCities[$countryName]['values'][] = $cityName;				
      }
      ?>
   @endforeach	 
   <?php 
      $UKCitiesJsonEncoded = json_encode((object)$UKCities);			
      $internationalJsonEncoded = json_encode((object)$internationalCities);

      $searchtypesArr = array(); 
      ?>
   @foreach ($searchtypes as $type)	
   @endforeach	 
   <?php 	
      $searchtypesJsonEncoded = json_encode((object)$searchtypesArr);			
      
      $internationalCities = array();
      $UKCities = array(); 
      ?>
   @foreach ($internationalcities as $city)	
   <?php 		
      if($city->country_id == 23){
      	//UK
      	$UKCities[] = $city->city_name;
      }else{
      	// Rest of the world
      	$cityName    = $city->city_name;
      	$countryName = $city->country_name;	
      	$internationalCities[$countryName]['values'][] = $cityName;				
      }
      ?>
   @endforeach	 
   <?php 
      $UKCitiesJsonENcoded = json_encode((object)$UKCities);			
      $internationalJsonENcoded = json_encode((object)$internationalCities);
      
      $businessFinderArr = array();
      $communityFinderArr = array();
      ?>
   @foreach ($businessAndCommunity as $category)	
   <?php 
      $parentTitle = $category->searchparentcategory_title;
      $parentName  = $category->searchparentcategory_name;	
      
      if($category->searchtype_id == 1){	
      	$businessFinderArr[$parentName]['values'][] = $category->searchchildcategory_name;	
      }else if($category->searchtype_id == 2){	
      	$communityFinderArr[$parentName] = $category->searchparentcategory_title;
      }			
      ?>
   @endforeach	 
   <?php 
      $businessFinderJsonEncoded  = json_encode((object)$businessFinderArr);	
      $communityFinderJsonEncoded = json_encode((object)$communityFinderArr);
      
      //dd($communityFinderJsonEncoded);
      ?>
   <script>
      var app = angular.module('myApp', []);
      
        app.config(function($interpolateProvider) {
          $interpolateProvider.startSymbol('%%');
          $interpolateProvider.endSymbol('%%');
        });
      
      app.controller('myCtrl', function($scope) {
      	$scope.UK              = <?php echo $UKCitiesJsonEncoded ?>;	
      	$scope.international   = <?php echo $internationalJsonEncoded ?>;	
      	$scope.searchType      = <?php echo $searchtypesJsonEncoded ?>;		
      	$scope.businessFinder  = <?php echo $businessFinderJsonEncoded ?>;
      	$scope.communityFinder  = <?php echo $communityFinderJsonEncoded ?>
      
      $scope.communityFinderXXX = ["Activity & Sport Clubs", "Allotments & Gardening", "Art & Hobby Classes", "Artists & Creators", "Car Pools", "Child & Parent Groups", "Cultural & Regligious Groups", "Dating", "Dog Walkers", "Events & Shows", "Farm Produce", "Finding Friends", "Help Offered", "Help Wanted", "Kids clubs", "Lost & Found", "Musicians & Bands", "Senior Groups", "Tutoring & Classes", "Volunteers & Charities"]; 
      
      $scope.marketplace  = [
      "antiques", "appliances", "arts+crafts", "atv/utv/sno", "auto parts", "aviation", "baby+kid", "beauty+hlth", "bike parts", "bikes", "boat parts", "boats", "books", "caravn+mtrhm", "cars+vans", "cds/dvd/vhs", "clothes+acc", "collectibles", "computer parts", "computers", "electronics", "farm+garden", "free", "furniture", "garage sale", "general", "heavy equip", "household", "jewellery", "materials", "mobile phones", "motorbike parts", "motorbike", "music instr", "photo+video", "pet accessories", "sporting", "tickets", "tools", "toys+games", "trailers", "video gaming", "wanted", "wheels+tires"]; 
      
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