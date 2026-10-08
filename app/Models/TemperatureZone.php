<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TemperatureZone extends Model
{
    public $timestamps = false;

    public function locations(): HasMany{
        return $this->hasMany(Location::class, 'temp_zone_id');
    }
}
