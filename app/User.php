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
        'name', 'email', 'password', 'username', 'picture',
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

    public function getPicture(){
      return $this->picture;
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

    public function statuses() {
      return $this->hasMany('App\Status', 'user_id');
    }

    public function getFollowing(){
      return $this->following()->get();
    }

    public function getFollower(){
      return $this->follower()->get();
    }

    public function interests()
    {
        return $this->belongsToMany('App\Interest')->withTimestamps();
    }

    public function getInterests()
    {
        return $this->interests()->get();
    }
    public function edit($id = null) {
        $user = User::with('follower')->find($id);
        $followersForThisUser = [];
        foreach($user->follower as $f) {
            $followersForThisUser[] = $f->name;
        }

        return view('public.interests')
            ->with([
                'user' => $user,
                'followersForThisUser' => $followersForThisUser,
            ]);

      }
}
