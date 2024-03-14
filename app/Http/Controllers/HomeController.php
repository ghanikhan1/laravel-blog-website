<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()){
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user'){
                return view('components.home.homepage');
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
        return view('components.home.homepage');
    }

}
