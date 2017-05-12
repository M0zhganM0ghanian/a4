<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class PictureController extends Controller
{
  public function update(Request $request){
      $user = Auth::user();
      $username = Auth::user()->getUsername();

      if($request->hasFile('picture')){
        $file = $request->file('picture');
        $fileName = time() . $username . '-' . $file->getClientOriginalExtension();
        Image::make($file)->resize(200,250)->save( public_path('uploads/pictures/' .$fileName));
        $user->picture = $fileName;
        $user->save();
      }
      return redirect()->action(
        'ProfileController@getProfile', ['username' => $username]);
  }
}
