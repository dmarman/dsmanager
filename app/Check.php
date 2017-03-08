<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $hidden = [
        'test_id', 'updated_at', 'deleted_at'
    ];

    public function test() {
        return $this->hasOne('App\Test');
    }
}
