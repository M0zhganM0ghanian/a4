<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearchResults(Request $request, $username){
      echo $username;
      $user = User::where('username', $username)->first();
      if(!$user){
        echo "User not found!";
      }
      $findFriends = $request->input('findFriends');
      $friendSearchResult = User::where('name', 'LIKE', "%{$findFriends}%")->get();
      return view('results.search')->with([
         'findFriends'=> $friendSearchResult,
         'username' => $username
       ]);
    }
}
