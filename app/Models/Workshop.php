<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workshop extends Model
{
    public $timestamps = false;

    public function dishes(): HasMany{
        return $this->hasMany(Dish::class);
    }
}
