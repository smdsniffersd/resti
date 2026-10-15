<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Remain extends Model
{
    public $timestamps = false;

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function location(): BelongsTo{
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function supply(): BelongsTo{
        return $this->belongsTo(Supply::class, 'supplies_id');
    }
}
