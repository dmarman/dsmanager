<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soundsystem extends Model
{
    protected $hidden = [
        'updated_at', 'created_at', 'deleted_at'
    ];

    public function containerDescription()
    {
        return $this->hasMany('App\ContainerDescription');
    }
}