<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function dishStructures(): HasMany
    {
        return $this->hasMany(DishStructure::class);
    }
    public function supplies(): HasMany
    {
        return $this->hasMany(Supply::class);
    }
    public function remains(): HasMany
    {
        return $this->hasMany(Remain::class);
    }
    public function operations(): HasMany
    {
        return $this->hasMany(Operation::class);
    }
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function alcoholDetail(): HasOne
    {
        return $this->hasOne(AlcoholDetail::class, 'product_id');
    }
    public function liquidMilkDetail(): HasOne
    {
        return $this->hasOne(LiquidMilkDetail::class, 'product_id');
    }
    public function solidDairyDetail(): HasOne
    {
        return $this->hasOne(SolidDairyDetail::class, 'product_id');
    }
    public function meatPoultryDetail(): HasOne
    {
        return $this->hasOne(MeatPoultryDetail::class, 'product_id');
    }
    public function fishSeafoodDetail(): HasOne
    {
        return $this->hasOne(FishSeafoodDetail::class, 'product_id');
    }
    public function vegetablesFruitsDetail(): HasOne
    {
        return $this->hasOne(VegetablesFruitsDetail::class, 'product_id');
    }
    public function groceryDetail(): HasOne
    {
        return $this->hasOne(GroceryDetail::class, 'product_id');
    }
    public function frozenDetail(): HasOne
    {
        return $this->hasOne(FrozenDetail::class, 'product_id');
    }
    public function bakeryDetail(): HasOne
    {
        return $this->hasOne(BakeryDetail::class, 'product_id');
    }
    public function beveragesDetail(): HasOne
    {
        return $this->hasOne(BeveragesDetail::class, 'product_id');
    }
    public function saucesSpicesDetail(): HasOne
    {
        return $this->hasOne(SaucesSpicesDetail::class, 'product_id');
    }
    public function confectioneryDetail(): HasOne
    {
        return $this->hasOne(ConfectioneryDetail::class, 'product_id');
    }
    public function eggsDetail(): HasOne
    {
        return $this->hasOne(EggsDetail::class, 'product_id');
    }
    public function oilsFatsDetail(): HasOne
    {
        return $this->hasOne(OilsFatsDetail::class, 'product_id');
    }
}
