<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaterPumpInfrastructure extends Model
{
    public function waterPump()
    {
        return $this->belongsTo('App\WaterPump');
    }
}
