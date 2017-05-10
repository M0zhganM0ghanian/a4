<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Status;
use Auth;

class ProfileController extends Controller
{
    public function getProfile($userUsername, $friendUsername = 'userUsername'){

      #user
      $user = Auth::user();
      $userId = Auth::user()->id;

      #find the page owener(the profile which is visiting)
      $friend = User::where('username', $friendUsername)->first();
      if(!$friend){
        echo "User not found!";
      }

      #statuses for profile
      $friendId = User::where('username', $friendUsername)->pluck('id');
      $pageOwnerStatuses = Status::where('user_id', '=', $friendId)
      ->orderBy('created_at', 'desc')
      ->get();

      #for timeline
      $followingsId = $user->getFollowing()->pluck('id');
      echo $userId;
      echo $friendId;
      echo $followingsId;
      $friendsStatuses = Status::whereIn('user_id', $followingsId)
      ->orderBy('created_at', 'desc')
      ->get();

      return view('user.profile')->with([
        'user'=> $user,
        'friend'=> $friend,
        'friendsStatuses' => $friendsStatuses,
        'pageOwnerStatuses' => $pageOwnerStatuses
      ]);
    }
}
