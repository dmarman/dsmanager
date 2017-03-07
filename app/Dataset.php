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
        return $this->hasOne('App\Container');
    }

    public function files(){
        return $this->hasMany('App\File');
    }
}
