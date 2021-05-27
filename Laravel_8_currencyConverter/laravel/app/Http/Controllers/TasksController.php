<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks();		
//============================= 				
		$contents = Storage::get('/info.txt');		
		echo $contents;		
//============================= 
		$client = new Client([
			'base_uri' => 'http://api.exchangeratesapi.io/v1/',
		]);
		$response = $client->request('GET', 'latest', [
			'query' => [
			'access_key' => '690acd5a709d7ef967e54403ae5ef36b',			
			'base' => 'EUR',
			'symbols' => 'USD,GBP,EUR'
			]
		]);
		echo $response->getBody();	
//============================= 	
//var_dump($request);
//dd($response);		
		
        return view('dashboard', compact('tasks'));
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
    	$task = new Task();
    	$task->description = $request->description;
    	$task->user_id = auth()->user()->id;
    	$task->save();
    	return redirect('/dashboard'); 
    }

    public function edit(Task $task)
    {

    	if (auth()->user()->id == $task->user_id)
        {            
                return view('edit', compact('task'));
        }           
        else {
             return redirect('/dashboard');
         }            	
    }

    public function update(Request $request, Task $task)
    {
    	if(isset($_POST['delete'])) {
    		$task->delete();
    		return redirect('/dashboard');
    	}
    	else
    	{
            $this->validate($request, [
                'description' => 'required'
            ]);
    		$task->description = $request->description;
	    	$task->save();
	    	return redirect('/dashboard'); 
    	}    	
    }
}