<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function dataset(){
        return $this->hasOne('App\Dataset');
    }
}
