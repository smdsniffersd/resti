<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class VegetablesFruitsDetail extends Model
{
     protected $primaryKey = 'product_id';
    public $incrementing = false;
   public $timestamps = false;
   protected $keyType = 'int';

   public function product(): BelongsTo{
    return $this->belongsTo(Product::class);
   }
}
