<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $hidden = [
        'dataset_id', 'updated_at', 'deleted_at'
    ];

    public function dataset(){
        return $this->hasOne('App\Dataset');
    }

    public function checks() {
        return $this->hasMany('App\Check');
    }
}
