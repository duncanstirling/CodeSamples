# READ ME

# VIEW WORKING EXAMPLE
https://nearestnow.com/widgettest

# WIDGET BATCH SIZE CALCULATOR API	
This test is hosted at https://nearestnow.com/widgettest 		
This is a programming test to calculate the minimum number of orders to fullfill 
a batch.  

# CSRF 
To host this in Laravel create a route exception in VerifyCsrfToken.php to enable curl to post.  

# ROUTES 
Route::post('widgetapi',  'WidgetController@widgetapi'); 
Route::get('widgettest',  'WidgetController@index'); 
Route::post('widgettest', 'WidgetController@index');  

# FURTHER WORK 
Additional security could be provided creating a signed payload and comparing hashed payload and secret 
i.e. 'hash_hmac('sha256', \$payload, \$secret, \$raw = true)'  		
