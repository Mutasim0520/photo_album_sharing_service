<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = FALSE;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->hasMany('App\Photo');
    }
    public function comment(){
        return $this->hasMany('App\Comment');
    }
    public function star(){
        return $this->hasMany('App\Star');
    }

}
