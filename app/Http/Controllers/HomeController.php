<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
     *    public function index()
     *     {
     *     return view('home');
     *     }
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(Auth::check()){

         $username = Auth::user()->getUsername();

         return redirect()->action(
           'ProfileController@getProfile', array( $username, $username));
       }
        return view('welcome');
    }
}
