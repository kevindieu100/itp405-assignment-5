<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    //
    public function tweets()
    {
      return $this->hasMany('App\Song');
    }
}
