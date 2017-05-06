<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function getProfile($userUsername, $friendUsername){

      $user = User::where('username', $userUsername)->first();
      if(!$user){
        echo "User not found!";
      }

      $friend = User::where('username', $friendUsername)->first();
      if(!$friend){
        echo "User not found!";
      }

      return view('user.profile')->with([
        'user'=> $user,
        'friend'=> $friend
      ]);
    }
}
