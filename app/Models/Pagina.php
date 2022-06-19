<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model{
     
  protected $table = "pagina";
  public $timestamps = false;

  public function user(){
    return $this->belongsTo('App/Models/User');
  }
}

