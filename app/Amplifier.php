<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amplifier extends Model
{
    protected $hidden = [
        'updated_at', 'created_at', 'deleted_at'
    ];

    public function container()
    {
        return $this->hasMany('App\Container');
    }
}
