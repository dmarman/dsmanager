<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Container extends Model
{
    use Searchable;

    protected $hidden = [
        'car_id', 'body_id', 'radio_id',
        'soundsystem_id', 'hand_id', 'deleted_at',
        'amplifier_id', 'container_id', 'created_at',
        'updated_at'
    ];

    public function toSearchableArray()
    {
        $completeModel = $this->load('car', 'radio', 'soundsystem',
                                'hand', 'amplifier', 'datasets.files', 'datasets.tests', 'datasets.tests.checks',
                                'datasets.channels', 'datasets.channels.filters', 'datasets.channels.delay');

        $completeModel->car->internalName = $this->car->brand . $this->car->platform . $this->car->generation . $this->car->bodywork;

        $array = $completeModel->toArray();
        
        

        return $array;
    }

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

    public function container()
    {
        return $this->belongsTo('App\Container');
    }

    public function datasets()
    {
        return $this->hasMany('App\Dataset')->orderBy('version');
    }
}
