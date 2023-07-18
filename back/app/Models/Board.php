<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'capacity',
        'available',
    ];

    public function kitchenOrders():HasMany
    {
        return $this->hasMany(KitchenOrder::class,'to');
    }

    public function employees():BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

}
