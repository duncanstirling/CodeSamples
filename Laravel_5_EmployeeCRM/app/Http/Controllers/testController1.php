<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController1 extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
		
		echo "inside show function";
		
        //return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}
