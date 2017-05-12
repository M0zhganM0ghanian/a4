<?php

namespace App\Http\Controllers;
use App\User;
use App\Interest;
use App\Status;
use Illuminate\Http\Request;
use Auth;
class SearchController extends Controller
{
    public function getSearchResults(Request $request){

      $username = Auth::user()->getUsername();
      $findFriends = $request->input('findFriends');
      $friendSearchResult = User::where('name', 'LIKE', "%{$findFriends}%")
                                ->orWhere('username', 'LIKE', "%{$findFriends}%")->get();
      return view('results.search')->with([
         'findFriends'=> $friendSearchResult,
         'username' => $username
       ]);
    }

    public function getStatusSearchResults(Request $request){

      $user = Auth::user();
      $username = Auth::user()->getUsername();
      $followingsId = $user->getFollowing()->pluck('id');
      $userId = Auth::user()->id;
      $userAndFollowingId = $followingsId->merge($userId);

      $keyword = $request->input('findStatus');
      $statusSearchResult = Status::where('text', 'LIKE', "%{$keyword}%")->whereIn('user_id', $userAndFollowingId)->get();
      return view('results.statusSearch')->with([
         'statusSearchResult'=> $statusSearchResult,
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
