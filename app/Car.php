<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContainerDescription;

class Car extends Model
{
    protected $hidden = [
        'updated_at', 'created_at', 'deleted_at'
    ];

    public function containerDescription()
    {
        return $this->hasMany('App\ContainerDescription');
    }
}
