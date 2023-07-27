<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'available',
        'recipe',
        'image_path',
        'description',
        'type'
    ];

    public function ingredients():BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class,'made_with');
    }

    public function allergens():BelongsToMany
    {
        return $this->belongsToMany(Allergen::class,'has');
    }

    public function kitchenOrders():BelongsToMany
    {
        return $this->belongsToMany(KitchenOrder::class,'kitchen_order_contains');
    }

    public function onlineOrders():BelongsToMany
    {
        return $this->belongsToMany(OnlineOrder::class,'online_order_contains');
    }
}
