<?php

namespace App\Http\Controllers;
use App\User;
use App\Interest;
use Illuminate\Http\Request;
use Auth;
class SearchController extends Controller
{
    public function getSearchResults(Request $request){

      $username = Auth::user()->getUsername();
      $findFriends = $request->input('findFriends');
      $friendSearchResult = User::where('name', 'LIKE', "%{$findFriends}%")->get();
      return view('results.search')->with([
         'findFriends'=> $friendSearchResult,
         'username' => $username
       ]);
    }

    public function getSearchPage(){

      $user = Auth::user();
      $interest = Interest::all();
      return view('home')->with([
         'user'=> $user,
         'interest' => $interest
       ]);
    }
}
