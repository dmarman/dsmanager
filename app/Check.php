<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    public function test() {
        return $this->hasOne('App\Test');
    }
}
