<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    public $timestamps = false;
    public function table(): BelongsTo{
        return $this->belongsTo(RTable::class, 'table_id');
    }
    public function waiter(): BelongsTo{
        return $this->belongsTo(Personal::class, 'waiter_id', 'user_id');
    }
    public function orderDishes(): HasMany{
        return $this->hasMany(OrderDish::class);
    }

}
