<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class DishStructure extends Model
{
    const UPDATED_AT = null;
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function dish(): BelongsTo
    {
        return $this->belongsTo(Dish::class);
    }
}
