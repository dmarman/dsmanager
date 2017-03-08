<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delay extends Model
{
    protected $hidden = [
        'channel_id', 'deleted_at'
    ];

    public function channel() {
        return $this->hasOne('App\Channel');
    }
}
