<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{

    protected $table = 'interests';
    protected $fillable = [
        'name',
    ];
    public function users() {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function getName() {
        return $this->name;
    }

    public static function getInterestsForCheckboxes() {

        $interests = Interest::orderBy('name','ASC')->get();

        $interestsForCheckboxes = [];

        foreach($interests as $interest) {
            $interestsForCheckboxes[$interest['id']] = $interest->name;
        }

        return $interestsForCheckboxes;

    }

}
