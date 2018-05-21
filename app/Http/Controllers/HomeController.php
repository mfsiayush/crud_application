<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile(){
        // print_r(Auth::user()->id);
        if(Auth::user()->id){
            $user=new User();
            $userDetails=$user->getDetails(Auth::user()->id);
            // print_r($userDetails);
            return view('profile')->with(compact('userDetails'));   
        }

    }
}
