<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Menu extends Model
{

public $timestamps = false;
    public function dish(): BelongsTo
    {
        return $this->belongsTo(Dish::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }
}
