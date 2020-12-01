<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class WidgetController extends Controller
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
	* Instructions on using the widget API.
	*
	* @param 
	* @return Sample response and readme
	*/
	public function index(Request $request)
    {	
		// specify batch sizes widgets will be sold in
		// and total number of widgets purchased
		$range = array(5000, 2000, 1000, 500, 250);		
		$n     = 12345678912;
		
		// call api to determine minimum amount of batches to fullfill order
		$data      = array('range' => $range, 'n' => $n);
		$data_json = json_encode($data);
		$url       = "https://nearestnow.com/widgetapi";
		$ch        = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$response = json_decode($response);
		curl_close($ch);
		
		//---------------------------------------------
		// Present the data to the user
		
		echo 'Batch sizes:'.print_r($range, 1).'<br />
		Quantity required: '.$n.'<br /><br />
		Quantities of each batch required:<br /><br />';
		
		foreach($response as $key => $value){
			echo 'Batch size: '.$key.', quantity: '.$value.'<br />';
		}
		
		$i     = 0;
		$total = 0;
		
		echo '<br />Check the total:<br />';
		foreach($response as $key => $value){
			if($i > 0)echo ' + ';
			echo $key.'*'.$value;
			$i++;
			$total = $total + $key*$value;
		}		
		echo ' = '.$total.'<br />';
		
		$this->readme();
		return;
	}
	
	private function readme(){
		echo "<br />#################################################</br>
		# READ ME<br /></br>
		
		# WIDGET BATCH SIZE CALCULATOR<br />	
		This test is hosted at https://nearestnow.com/widgettest<br />		
		This is a programming test to calculate the minimum number of orders to fullfill 
		a batch.<br /><br />

		# CSRF<br />
		To host this in Laravel create a route exception in VerifyCsrfToken.php to enable curl to post.<br /><br />

		# ROUTES<br />
		Route::post('widgetapi',  'WidgetController@widgetapi');<br />
		Route::get('widgettest',  'WidgetController@index');<br />
		Route::post('widgettest', 'WidgetController@index');<br /><br />
		
		# FURTHER WORK<br />
		Additional security could be provided creating a signed payload and comparing hashed payload and secret<br />
		i.e. 'hash_hmac('sha256', \$payload, \$secret, \$raw = true)'<br /><br />		
		";
	}
	
	/**
	* Calculates the minimum amount of batches to fullfill an order
	*
	* @param  int  $n, array $range
	* @return quantities of each batch to fullfill request
	*/
    public function widgetapi(Request $request)
    {	// extract quantity and batch sizes from request
		// calculate quantities of each batch size
		$range  = $request->range;
		$n      = $request->n;		
		$result = $this->calculator($n, $range);
		echo json_encode($result);				
    }
	
	private function calculator($n, $range){
		$result = array();
		rsort($range);
		foreach ($range as $value) {
			$quantity       = floor($n/$value);
			$result[$value] = $quantity;
			$n              = $n - $quantity*$value;			
		}
		if($n > 0){
			$result["$value"] = $result["$value"] + 1;
		}
		return $result;
	}
}
