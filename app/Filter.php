<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $hidden = [
        'channel_id', 'updated_at', 'deleted_at'
    ];

    public function channel() {
        return $this->hasOne('App\Channel');
    }
}
