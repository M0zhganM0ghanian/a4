<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

  protected $table = 'statuses';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'text'
  ];

  public function user(){
      return $this->belongsTo('App\User', 'user_id');
  }

  public function getText(){
      return $this->text;
  }

}
