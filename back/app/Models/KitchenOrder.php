<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class KitchenOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'begin_date',
        'end_date',
        'status'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'kitchen_order_contains');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }
}
