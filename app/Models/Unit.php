<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Unit extends Model
{
    public $timestamps = false;

    public function baseUnit(): BelongsTo{
        return $this->belongsTo(Unit::class, 'base_unit_id');
    }

    public function derivedUnits():HasMany{
        return $this->hasMany(Unit::class, 'base_unit_id');
    }
}
