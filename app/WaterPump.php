<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaterPump extends Model
{
    public function waterPumpInfra()
    {
        return $this->hasOne('App\WaterPumpInfrastructure');
    }
}
