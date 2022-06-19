<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
     
    protected $primaryKey = 'username';
    protected $autoIncrement = false;
    protected $keyType = 'string';
    public $timestamps = false;


    public function canzone(){
        return $this->belongsToMany(Canzone::class,'album','user_id','track');
    }

    public function pagina(){
        return $this->hasMany('App/Models/Pagina', "user");
    }
}

