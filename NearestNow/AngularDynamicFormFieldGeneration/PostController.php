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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Posts::where('active', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $title = 'Latest Posts';
        return view('home')
            ->withPosts($posts)
            ->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $formMenus = new FormMenus([
            'business',
            'community',
            'cities',
            'market',
            'searchtype',
        ]);
        $menuOptions = $formMenus->getMenus();

        if ($request->user()->can_post()) {
            return view('posts.create')->withMenuOptions($menuOptions);
        } else {
            return redirect('/')->withErrors(
                'You have not sufficient permissions for writing post'
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostFormRequest $request)
    {
        $post = new Posts();
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = Str::slug($post->title);
        $post->adverttype = explode(":", $request->get('searchType'))[1] ?? '';
        $post->advertparentcategory =
            $request->get('bfParent') ??
            ($request->get('comParent') ?? $request->get('marketParent'));
        $post->advertparentcategory =
            explode(":", $post->advertparentcategory)[1] ?? '';
        $post->advertchildcategory =
            explode(":", $request->get('bfChild'))[1] ?? '';
        $post->country_id =
            explode(":", $request->get('internationalCountryID'))[1] ?? '23';
        $post->city_id =
            explode(":", $request->get('internationalCityID'))[1] ??
            (explode(":", $request->get('UKCItyID'))[1] ?? '');

        $duplicate = Posts::where('slug', $post->slug)->first();
        if ($duplicate) {
            return redirect('new-post')
                ->withErrors('Title already exists.')
                ->withInput();
        }

        $post->author_id = $request->user()->id;
        if ($request->has('save')) {
            $post->active = 0;
            $message = 'Post saved successfully';
        } else {
            $post->active = 1;
            $message = 'Post published successfully';
        }
        $post->save();
        return redirect('edit/' . $post->slug)->withMessage($message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request, $slug)
    {
        $post = Posts::where('slug', $slug)->first();
        $formMenus = new FormMenus([
            'business',
            'community',
            'cities',
            'market',
            'searchtype',
        ]);
        $menuOptions = $formMenus->getMenus();

        if (
            $post &&
            ($request->user()->id == $post->author_id ||
                $request->user()->is_admin())
        ) {
            return view('posts.edit')
                ->with('post', $post)
                ->with('menuOptions', $menuOptions);
        } else {
            return redirect('/')->withErrors(
                'you have not sufficient permissions'
            );
        }
    }
}
