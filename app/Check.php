<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $hidden = [
        'test_id', 'updated_at', 'deleted_at'
    ];

    public function test()
    {
        return $this->belongsTo('App\Test');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
