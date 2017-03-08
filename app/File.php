<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $hidden = [
        'dataset_id', 'deleted_at'
    ];

    public function dataset(){
        return $this->hasOne('App\Dataset');
    }
}
