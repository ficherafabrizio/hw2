<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Canzone extends Model{

  protected $primaryKey = "track";
  protected $autoIncrement = false;
  protected $table = "canzone";
  protected $keyType = 'string';
  public $timestamps = false;

  public function user(){
    return $this->belongsToMany('App/Models/User','album','track','user_id');
  }

}

