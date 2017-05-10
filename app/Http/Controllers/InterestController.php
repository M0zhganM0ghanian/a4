<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Interest;

class InterestController extends Controller
{
    public function getInterestsForm(Request $request){

      $user = Auth::user();
      $userId = Auth::user()->id;

      $sport = $request->input('sport');
      $reading = $request->input('reading'); # Boolean
      $movie = $request->input('movie'); # Boolean
      $writing = $request->input('writing'); # Boolean
      $games = $request->input('games'); # Boolean
      $socialActivities = $request->input('socialActivities'); # Boolean
      $Music = $request->input('music'); # Boolean

      $interests =[
          'Sport' => $sport,
          'Reading' => $reading,
          'Movie' => $movie,
          'Writing' => $writing,
          'Games' => $games,
          'Social activities' => $socialActivities,
          'Music' => $Music
      ];

      foreach($interests as $interestName => $result) {

          if($result){
            echo $interestName;
            $interest = Interest::where('name','LIKE',$interestName)->first();
            $user->interests()->attach($interest);
          }
      }
      return view('public.interests')->with('user', $user);
    }

    public function removeInterests($interestName){

        $user = Auth::user();

        $interest = Interest::where('name', $interestName)->first();
        if(!$interest){
          echo "User not found!";
        }
        $user->interests()->detach($interest);

        return redirect()->action(
        'SearchController@getSearchPage');
        
        #return view('public.interests')->with('user', $user);
    }

    public function getInterests($interestName){

        $user = Auth::user();

        $interest = Interest::where('name', $interestName)->first();
        if(!$interest){
          echo "User not found!";
        }
        $user->interests()->attach($interest);

        return redirect()->action(
        'SearchController@getSearchPage');


        #return view('public.interests')->with('user', $user);
    }
}
