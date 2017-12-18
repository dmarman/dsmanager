<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\User;

class File extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'dataset_id', 'deleted_at', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function dataset()
    {
        return $this->belongsTo('App\Dataset');
    }

}
