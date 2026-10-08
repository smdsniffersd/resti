<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    public $timestamps = false;

    public function reservations(): HasMany{
        return $this->hasMany(Reservation::class, 'client_id');
    }
}
