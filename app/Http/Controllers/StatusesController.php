<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use App\Status;
use App\Interest;
use Image;

class StatusesController extends Controller
{
  public function shareStatuse(Request $request){

    # add new status
    $status = $request->input('status');

    $this->validate($request, [
      'status' => 'required',
    ]);

    $user = Auth::user();
    $user->statuses()->create([
      'text' => $status
    ]);

    $username = Auth::user()->getUsername();

    #(i dont need these lines any more
    $userId = Auth::user()->id;
    $userStatuses = Status::where('user_id', '=', $userId)->get();
    $followingsId = $user->getFollowing()->pluck('id');
    $friendsStatuses = Status::whereIn('user_id', $followingsId)
                    ->get();
    #I dont need these lines)


    #for timeline just added
    $followingsId = $user->getFollowing()->pluck('id');
    $friendsStatuses = Status::whereIn('user_id', $followingsId)
    ->orderBy('created_at', 'desc')
    ->get();

    return redirect()->action(
      'ProfileController@getProfile', ['username' => $username]);
    }

    public function getFriendSharedStatuses(){

      $user = Auth::user();
      $userId = Auth::user()->id;
      $userStatuses = Status::where('user_id', '=', $userId);

      $interest = Interest::all();

      #for timeline just added
      $followingsId = $user->getFollowing()->pluck('id');
      $userAndFollowingId = $followingsId->merge($userId);

      $friendsStatuses = Status::whereIn('user_id', $userAndFollowingId)
      ->orderBy('created_at', 'desc')
      ->get();

      return view('home')->with([
        'user'=> $user,
        'friendsStatuses' => $friendsStatuses,
        'interest' => $interest
      ]);
    }
}
