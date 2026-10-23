<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dish extends Model
{

    public function dishStructures(): HasMany{
        return $this->hasMany(DishStructure::class);
    }
    public function workshop(): BelongsTo{
        return $this->belongsTo(Workshop::class);
    }
    public function warehouse(): BelongsTo{
        return $this->belongsTo(Location::class, 'warehouse_id');
    }
    public function unit(): BelongsTo{
        return $this->belongsTo(Unit::class);
    }
    public function menu(): HasOne{
        return $this->hasOne(Menu::class);
    }
    public function orderDishes(): HasMany{
        return $this->hasMany(OrderDish::class);
    }
}
