<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    protected $hidden = [
        'deleted_at'
    ];

    public function description()
    {
        return $this->hasOne('App\ContainerDescription');
    }
}
