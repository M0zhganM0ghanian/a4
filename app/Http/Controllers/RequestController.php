<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\User;
use Auth;

class RequestController extends Controller
{
    public function followRequest( $friendUsername){

      $username = Auth::user()->getUsername();
      $user = User::where('username', $username)->first();
      if(!$user){
        echo "User not found!";
      }

      $friend = User::where('username', $friendUsername)->first();
      if(!$friend){
        echo "User not found!";
      }
      $user->following()->attach($friend);
      return redirect()->action(
      'ProfileController@getProfile', ['friendUsername' => $friendUsername]);
    }

    public function unfollowRequest($friendUsername){
      $username = Auth::user()->getUsername();

      $user = User::where('username', $username)->first();
      if(!$user){
        echo "User not found!";
      }

      $friend = User::where('username', $friendUsername)->first();
      if(!$friend){
        echo "User not found!";
      }
      $user->following()->detach($friend);
      return redirect()->action(
      'ProfileController@getProfile', ['friendUsername' => $friendUsername]);

    }
}
