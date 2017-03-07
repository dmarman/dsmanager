<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function dataset(){
        return $this->hasOne('App\Dataset');
    }

    public function filters(){
        return $this->hasMany('App\Filter');
    }
}
