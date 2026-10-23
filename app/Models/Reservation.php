<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    public $timestamps = false;
    public function client():BelongsTo{
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function table():BelongsTo{
        return $this->belongsTo(RTable::class, 'table_id');
    }
    public function waiter():BelongsTo{
        return $this->belongsTo(Personal::class, 'waiter_id', 'user_id');
    }
}
