<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function reservations(): HasMany{
        return $this->hasMany(Reservation::class, 'client_id');
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
