<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getName(){
      return $this->name;
    }

    public function getUsername(){
      return $this->username;
    }

    public function following(){
      return $this->belongsToMany('App\User', 'follower_user', 'user_id', 'friend_id')->withTimestamps();
    }

    public function follower(){
      return $this->belongsToMany('App\User', 'follower_user', 'friend_id', 'user_id')->withTimestamps();
    }

    public function getFollowing(){
      return $this->following()->get();
    }

    public function getFollower(){
      return $this->follower()->get();
    }
}
