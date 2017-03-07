<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public function channel() {
        return $this->hasOne('App\Channel');
    }
}
