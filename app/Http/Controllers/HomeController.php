<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()){
            $posts = Post::all();
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user'){
                return view('components.home.homepage', compact('posts'));
            }
            elseif($usertype == 'admin'){
                return view('components.admin.adminhome');
            }
            else{
                return redirect()->back();
            }
        }
    }

    public function homepage()
    {
        $posts = Post::all();
        return view('components.home.homepage', compact('posts'));
    }

}
