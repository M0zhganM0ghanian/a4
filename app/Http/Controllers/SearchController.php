<?php

namespace App\Http\Controllers;
use App\User;
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
      return view('home');
    }
}
