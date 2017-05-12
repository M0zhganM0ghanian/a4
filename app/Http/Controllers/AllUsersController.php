<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AllUsersController extends Controller
{
  public function getAllUsers(){
    $users = User::orderBy('created_at', 'desc')
    ->get();

    return view('public.allUsers')->with('users', $users);
  }
}
