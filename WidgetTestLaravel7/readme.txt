# READ ME </br>

# WIDGET BATCH SIZE CALCULATOR 	
This is an API that calculates the minimum number of orders to fullfill a batch  

# API AVAILABLE VIA POST OR GET  
GET - BROWSER ACCESS 
https://nearestnow.com/widgetapi/[5000,2000,1000,500,250]/12001
  
POST EXAMPLE 
https://nearestnow.com/widgettest <br />

# CSRF<br />
To host this in Laravel create a route exception in VerifyCsrfToken.php to enable curl to post.<br /><br />

# ROUTES<br />
Route::get('widgetapi/{range}/{n}',   'WidgetController@widgetapi');<br />
Route::post('widgetapi',  'WidgetController@widgetapi');<br />
Route::get('widgettest',  'WidgetController@index');<br />
Route::post('widgettest', 'WidgetController@index');<br /><br />

# FURTHER WORK<br />
Additional security could be provided creating a signed payload and comparing hashed payload and secret<br />
i.e. 'hash_hmac('sha256', \$payload, \$secret, \$raw = true)'<br /><br />