<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserDataController extends Controller
{

    public function index()
    {
        $usersList = User::orderBy('id', 'desc')
                        ->paginate(6);
  
        return Inertia::render('UserView', [
            'usersList' => $usersList
        ]);
    }

}