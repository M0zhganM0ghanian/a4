<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Status;

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
    echo $userId;
    echo $followingsId;
    $friendsStatuses = Status::whereIn('user_id', $followingsId)
                    ->get();
    #I dont need these lines)

    return redirect()->action(
      'ProfileController@getProfile', array( $username, $username));
  }
}
