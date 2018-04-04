<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = FALSE;

    public function album(){
        return $this->belongsTo('App\Album');
    }
}
