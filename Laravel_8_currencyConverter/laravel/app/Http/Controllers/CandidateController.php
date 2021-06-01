<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\CurrencyApi;

use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Http;
//use GuzzleHttp\Client;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = auth()->user()->candidates();		

        return view('dashboard', compact('candidates'));
    }
    public function add()
    {
    	return view('add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
        $this->validate($request, [
            'currency' => 'required'
        ]);		
        $this->validate($request, [
            'rate' => 'required'
        ]);
		
    	$candidate = new Candidate();
    	$candidate->description = $request->description;
		$candidate->currency    = $request->currency;
		$candidate->rate        = $request->rate;
    	$candidate->user_id     = auth()->user()->id;
		
    	$candidate->save();
    	return redirect('/dashboard'); 
    }

    public function edit(Candidate $candidate)
    {
    	if (auth()->user()->id == $candidate->user_id)
        {            
			return view('edit', compact('candidate'));
        }           
        else {
			return redirect('/dashboard');
		}            	
    }

    public function convertcurrency(Request $request)
    {
		$this->validate($request, [
			'oldCurrency' => 'required',
			'newCurrency' => 'required',
			'rate'        => 'required',				
		]);

		$oldCurrency      = $request->oldCurrency;
		$newCurrency      = $request->newCurrency;
		$oldCandidateRate = $request->rate;	
		
		$currencyAPI      = new CurrencyApi();
		$response         = $currencyAPI->getCurrentRatesFromApi();
		$status           = $response->getStatusCode();
				
		if($status != 200 || config('app.currencyapi') == 'remote'){
			//remote API unvailable, use fixed stored rates
			$response         = $currencyAPI->getFixedDefaultRates();
			$fixedRates       = json_decode($response);
			$conversionFactor = $fixedRates->{$oldCurrency}->{$newCurrency};
		    $newCandidateRate = floatval($conversionFactor) * floatval($oldCandidateRate);
			echo number_format($newCandidateRate, 2);			
		}else{
			// remote driver to current rates
			$remote_tmp = json_decode($response->getBody());
			$remote     = $remote_tmp->rates;			

			// EUR based conversionFactor
			// convert first old currency to euros then to new currency
			$oldCurrencyRate = $remote->{$oldCurrency};
			$newCurrencyRate = $remote->{$newCurrency};
					
			$newCandidateRate = floatval($oldCandidateRate)/floatval($oldCurrencyRate)*floatval($newCurrencyRate);	
			echo number_format($newCandidateRate, 2);			
		}
		exit;
	}

    public function update(Request $request, Candidate $candidate)
    {
    	if(isset($_POST['delete'])) {
    		$candidate->delete();
    		return redirect('/dashboard');
    	}
    	else
    	{
            $this->validate($request, [
                'description' => 'required'
            ]);
			
            $this->validate($request, [
                'currency' => 'required'
            ]);			
			
            $this->validate($request, [
                'rate' => 'required'
            ]);			
    		$candidate->description = $request->description;
    		$candidate->currency    = $request->currency;
    		$candidate->rate        = $request->rate;			
	    	$candidate->save();
	    	return redirect('/dashboard'); 
    	}    	
    }
}