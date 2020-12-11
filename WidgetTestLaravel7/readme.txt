################################################################################
#                                  READ ME 
################################################################################
# WIDGET BATCH SIZE CALCULATOR 	
This is an API that calculates the minimum number of orders to fullfill a batch  

# GET EXAMPLE
https://nearestnow.com/widgetapi/[5000,2000,1000,500,250]/12001
  
# POST EXAMPLE 
https://nearestnow.com/widgettest 

# CSRF
To host this in Laravel create a route exception in VerifyCsrfToken.php to enable curl to post

# ROUTES
Route::get('widgetapi/{range}/{n}',   'WidgetController@widgetapi');
Route::post('widgetapi',  'WidgetController@widgetapi');
Route::get('widgettest',  'WidgetController@index');
Route::post('widgettest', 'WidgetController@index');

# FURTHER WORK
Additional security could be provided creating a signed payload and comparing hashed payload and secret
i.e. 'hash_hmac('sha256', \$payload, \$secret, \$raw = true)'