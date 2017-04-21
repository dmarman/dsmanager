<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    protected $hidden = [
        'deleted_at', 'container_id'
    ];

    public function container()
    {
        return $this->belongsTo('App\Container');
    }

    public function files(){
        return $this->hasMany('App\File');
    }

    public function tests(){
        return $this->hasMany('App\Test');
    }

    public function channels(){
        return $this->hasMany('App\Channel');
    }

//    public function container(){
//        return $this->belongsTo('App\Container');
//    }
}
