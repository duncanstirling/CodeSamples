<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Posts;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\FormMenus;

class PostController extends Controller
{
    /**
     * THIS IS PART OF THE POST CONTROLLER, THIS EXTRACT FOCUSES ON CREATING A NEW ADVERT 
	 * MENU OPTIONS ARE CREATED IN THE FormMenus.php MODEL
	 * THESE MENU OPTIONS ARE PASSED TO THE BLADE TO ENABLE A NEW ADVERT TO BE CREATED
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $formMenus = new FormMenus();
        $menuOptions = $formMenus->getMenus();
        if ($request->user()->can_post()) {
            return view('posts.create')->withMenuOptions($menuOptions);
        } else {
            return redirect('/')->withErrors('You have not sufficient permissions for writing post');
        }
    }
}
