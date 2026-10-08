<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supply extends Model
{
    const UPDATED_AT = null;

    public function operations(): HasMany{
        return $this->hasMany(Operation::class, 'supplies_id');
    }
    public function remains(): HasMany{
        return $this->hasMany(Remain::class, 'supplies_id');
    }
    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }
    public function supplier(): BelongsTo{
        return $this->belongsTo(Supplier::class);
    }
}
