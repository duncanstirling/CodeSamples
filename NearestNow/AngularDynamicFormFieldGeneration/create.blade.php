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
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
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
<form action="{{ url('/new-post') }}" method="post">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <div class="form-group">
      <input required="required" value="{{ old('title') }}" placeholder="Enter title here" type="text" name="title" class="form-control" />
   </div>
   <div ng-app="myApp" ng-controller="myCtrl">
      <h3>Select the UK or abroad</h3>
      <select name="region" ng-model="user.region">
         <option value="" >select</option>
         <option value="international">International</option>
         <option value="UK">UK</option>
      </select>
      <div ng-show="user.region == 'international'">
         <h3>%%user.region%% locations</h3>
         <select name="internationalCountryID" ng-model="user.selectedcountry" 
            ng-options="k as v.countryName for (k, v) in cities"></select>	
      </div>
      <div ng-show="user.region == 'international' && user.selectedcountry">
         <h4>Select a city in %%cities[user.selectedcountry]['countryName']%%</h4>
         <select ng-selected="'5'" name="internationalCityID" ng-model="user.selectLocationInt" ng-options="k as v for (k , v) in cities[user.selectedcountry]['cities']">
         </select> 	   
      </div>
      <div ng-show="user.region == 'UK'">
         <h3>%%user.region%% locations</h3>
         <select name="UKCItyID" ng-model="user.selectLocationUK" ng-options="k as v for (k , v) in cities['23']['cities']">
         </select> 
      </div>
      <div ng-show="user.selectLocationInt || user.selectLocationUK">
         <h3 ng-show="user.region == 'UK'">You have selected%%cities['23']['cities'][user.selectLocation]%%</h3>
         <h3 ng-show="user.region != 'UK'">You have selected %%cities[user.selectedcountry]['cities'][user.selectLocation]%%</h3>
         <h4>Select a search type</h4>
         <select name="searchType" ng-model="user.searchTypeSelected" ng-options="k as v for (k , v) in searchType"> </select>
      </div>
      <div ng-if="user.searchTypeSelected == '1'">
         <div ng-show="user.searchTypeSelected">
            <h3>You have selected %%searchType[user.searchTypeSelected]%%</h3>
            <h4>Select a category</h4>
            <select name="bfParent" ng-model="user.bfParent" ng-options="k as v['parent']['parentName'] for (k, v) in businessFinder">
            </select>
         </div>
         <div ng-app="" ng-if="user.bfParent">
            <div ng-show="user.bfParent">
               <h4>Select a sub category in %%businessFinder[user.bfParent]['parent']['parentName']%%</h4>
               <select name="bfChild" ng-model="user.bfChild" ng-options="k as v for (k , v) in businessFinder[user.bfParent]['child']">
               </select>  
            </div>
         </div>
      </div>
      <div ng-if="user.searchTypeSelected == '2'">
         <div ng-show="user.searchTypeSelected">
            <h3>You have selected %%searchType[user.searchTypeSelected]%%</h3>
            <h4>Select a category</h4>
            <select name="comParent" ng-model="user.comParent" ng-options="k as v for (k , v) in communityFinder"></select>		
         </div>
      </div>
      <div ng-if="user.searchTypeSelected == '3'">
         <div ng-show="user.searchTypeSelected">
            <h3>You have selected %%searchType[user.searchTypeSelected]%%</h3>
            <h4>Select a category</h4>
            <select name="marketParent" ng-model="user.marketParent" ng-options="k as v for (k , v) in marketplace">
            </select>  		
         </div>
      </div>
   </div>
   <br /><br />
   <div class="form-group">
      <textarea name='body' class="form-control">{{ old('body') }}</textarea>
   </div>
   <input type="submit" name='publish' class="btn btn-success" value="Publish" />
   <input type="submit" name='save' class="btn btn-default" value="Save Draft" />
</form>
<script>
   var app = angular.module('myApp', []);  
   
   app.config(function($interpolateProvider) {
	   $interpolateProvider.startSymbol('%%');
	   $interpolateProvider.endSymbol('%%');
   });
   
   app.controller('myCtrl', function($scope) {  
	   $scope.cities          = <?php echo $menuOptions['citiesJsonEncoded'] ?>;		   
	   $scope.searchType      = <?php echo $menuOptions['searchtypesJsonEncoded'] ?>;		
	   $scope.businessFinder  = <?php echo $menuOptions['businessFinderJsonEncoded'] ?>;
	   $scope.communityFinder = <?php echo $menuOptions['communityFinderJsonEncoded'] ?>;
	   $scope.marketplace     = <?php echo $menuOptions['marketplaceJsonEncoded'] ?>;
	   
	   var oldInternationalCountryID = ("{{ old('internationalCountryID') }}".split(":"))[1];
	   var oldInternationalCityID    = ("{{ old('internationalCityID') }}".split(":"))[1];
	   var oldUKCItyID = ("{{ old('UKCItyID') }}".split(":"))[1];
	   var oldSearchType = ("{{ old('searchType') }}".split(":"))[1];
	   var oldBfParent = ("{{ old('bfParent') }}".split(":"))[1];
	   var oldBfChild  = ("{{ old('bfChild') }}".split(":"))[1];
	   var oldComParent  = ("{{ old('comParent') }}".split(":"))[1];
	   var oldMarketParent  = ("{{ old('marketParent') }}".split(":"))[1];
	   
	   $scope.master = {
		   region:"{{ old('region') }}", 
		   selectedcountry:oldInternationalCountryID,
		   selectLocationInt:oldInternationalCityID,
		   selectLocationUK:oldUKCItyID,
		   searchTypeSelected:oldSearchType,
		   bfParent:oldBfParent,
		   bfChild:oldBfChild,
		   comParent:oldComParent,
		   marketParent:oldMarketParent
	   };
	   $scope.reset = function() {
		   $scope.user = angular.copy($scope.master);
	   };
	   $scope.reset();
   });
</script>
@endsection