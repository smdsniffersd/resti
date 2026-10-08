<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    const UPDATED_AT = null;

    public function tempZone(): BelongsTo{
        return $this->belongsTo(TemperatureZone::class, 'temp_zone_id');
    }
    public function remains(): HasMany{
        return $this->hasMany(Remain::class, 'location_id');
    }
    public function dishes(): HasMany{
        return $this->hasMany(Dish::class, 'warehouse_id');
    }
    public function operationsTo(): HasMany{
        return $this->hasMany(Operation::class, 'to_location_id');
    }
    public function operationsFrom(): HasMany{
        return $this->hasMany(Operation::class, 'from_location_id');
    }
    public function responsiblePerson(): BelongsTo{
        return $this->belongsTo(Personal::class, 'responsible_person_id', 'user_id');
    }
}
