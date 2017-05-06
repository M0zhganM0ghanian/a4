<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\User;

class RequestController extends Controller
{
    public function followRequest($userUsername, $friendUsername){


      $user = User::where('username', $userUsername)->first();
      if(!$user){
        echo "User not found!";
      }

      $friend = User::where('username', $friendUsername)->first();
      if(!$friend){
        echo "User not found!";
      }
      $user->following()->save($friend);
      return redirect()->action(
      'ProfileController@getProfile', array( $userUsername, $friendUsername));
    }
}
