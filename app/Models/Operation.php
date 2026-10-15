<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Operation extends Model
{
    public $timestamps = false;

    public function product():BelongsTo{
        return $this->belongsTo(Product::class);
    }
    public function fromLocation(): BelongsTo{
        return $this->belongsTo(Location::class, 'from_location_id');
    }
    public function toLocation(): BelongsTo{
        return $this->belongsTo(Location::class, 'to_location_id');
    }
    public function supply(): BelongsTo{
        return $this->belongsTo(Supply::class, 'supplies_id');
    }
    public function debitReason() :BelongsTo{
        return $this->belongsTo(DebitReason::class);
    }
    public function createdBy(): BelongsTo{
        return $this->belongsTo(Personal::class, 'created_by_id', 'user_id');
    }
}
