<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDish extends Model
{
    public $timestamps = false;
    public function order(): BelongsTo{
        return $this->belongsTo(Order::class);
    }
    public function dish(): BelongsTo{
        return $this->belongsTo(Dish::class);
    }

}
