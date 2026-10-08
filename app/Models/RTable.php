<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RTable extends Model
{
    public $timestamps = false;

    public function orders(): HasMany{
        return $this->hasMany(Order::class, 'table_id');
    }
    public function reservations(): HasMany{
        return $this->hasMany(Reservation::class, 'table_id');
    }
}
