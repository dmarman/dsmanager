<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $hidden = [
        'dataset_id', 'deleted_at', 'deleted_at'
    ];

    public function dataset(){
        return $this->hasOne('App\Dataset');
    }

    public function filters(){
        return $this->hasMany('App\Filter');
    }

    public function delay(){
        return $this->hasOne('App\Delay');
    }
}
