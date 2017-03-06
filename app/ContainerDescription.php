<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContainerDescription extends Model
{
    protected $hidden = [
        'car_id', 'body_id', 'radio_id',
        'soundsystem_id', 'hand_id', 'deleted_at',
        'amplifier_id', 'container_id'
    ];

    public function car()
    {
        return $this->belongsTo('App\Car');
    }

    public function body()
    {
        return $this->belongsTo('App\Body');
    }

    public function radio()
    {
        return $this->belongsTo('App\Radio');
    }

    public function soundsystem()
    {
        return $this->belongsTo('App\Soundsystem');
    }

    public function hand()
    {
        return $this->belongsTo('App\Hand');
    }

    public function amplifier()
    {
        return $this->belongsTo('App\Amplifier');
    }
}
