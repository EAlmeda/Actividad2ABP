<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'capacity',
        'available',
    ];

    public function kitchenOrders():BelongsToMany
    {
        return $this->belongsToMany(KitchenOrder::class,'to');
    }

    public function employees():BelongsToMany
    {
        return $this->belongsToMany(Employee::class,'serves');
    }

}
