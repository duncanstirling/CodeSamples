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
		// specify widget batch sizes and total number purchased
		$range = array(5000, 2000, 1000, 500, 250);		

		// call api to determine minimum amount of batches to fullfill order
		#----------------------------------------
		$n        = 1;
		$data     = array('range' => $range, 'n' => $n);
		$response = $this->callAPI($data);
		$this->showResult($response, $range, $n);
		#----------------------------------------
		$n        = 250;
		$data     = array('range' => $range, 'n' => $n);
		$response = $this->callAPI($data);
		$this->showResult($response, $range, $n);		
		#----------------------------------------
		$n        = 251;
		$data     = array('range' => $range, 'n' => $n);
		$response = $this->callAPI($data);
		$this->showResult($response, $range, $n);		
		#----------------------------------------
		$n        = 501;
		$data     = array('range' => $range, 'n' => $n);
		$response = $this->callAPI($data);
		$this->showResult($response, $range, $n);
		#----------------------------------------
		$n        = 12001;
		$data     = array('range' => $range, 'n' => $n);
		$response = $this->callAPI($data);
		$this->showResult($response, $range, $n);
		#----------------------------------------
		$this->readme();
		return;
	}
	
	private function showResult($response, $range, $n){
		echo "<br />#################################################</br>
		# UNIT TESTING AGAINST VALID OUTCOME<br /></br>";
		
		echo 'Batch sizes:'.print_r($range, 1).'<br />
		Quantity required: '.$n.'<br /><br />
		Quantities of each batch required:<br /><br />';		
		foreach($response as $key => $value){
			echo 'Batch size: '.$key.', quantity: '.$value.'<br />';
		}
		
		$i     = 0; // just to prevent unnecessary '+'
		$total = 0;
		
		echo '<br />Check the total:<br />';
		foreach($response as $key => $value){
			if($i > 0)echo ' + ';
			echo $key.'*'.$value;
			$i++;
			$total = $total + $key*$value;
		}		
		echo ' = '.$total.'<br />';
	}	
	
	private function callAPI($data){
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
		return $response;
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

		// fullfill remainder with one larger batch or two smaller batches
		$value         = $range[count($range)-1];
		$previousValue = $range[count($range)-2];
		
		if($n > 0){	
			// if quantity of smallest batch is 1
			// and need to order another batch to fullfill remainder
			// and two small batches greater than or equal to 1 bigger batch
			// and 1 small batch plus remainder is <= 1 bigger batch
			// just order 1 bigger batch
			if ($result[$value] == 1 
			&& $value*2 >= $previousValue
			&& $value + $n <= $previousValue
			){
				$result[$previousValue] = $result[$previousValue] + 1;
				$result[$value]         = 0;
			}else{
				# order another small batch
				$result[$value] = $result[$value] + 1;
			}
		}
		return $result;
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
		Route::get('widgetapi',  'WidgetController@widgetapi');<br />
		Route::post('widgetapi',  'WidgetController@widgetapi');<br />		
		Route::get('widgettest',  'WidgetController@index');<br />
		Route::post('widgettest', 'WidgetController@index');<br /><br />
		
		# FURTHER WORK<br />
		Additional security could be provided creating a signed payload and comparing hashed payload and secret<br />
		i.e. 'hash_hmac('sha256', \$payload, \$secret, \$raw = true)'<br /><br />		
		";
	}
}
