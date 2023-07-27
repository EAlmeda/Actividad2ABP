<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlineOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'amount',
        'date',
        'expected_date',
        'address',
        'status',
        'type',
        'name',
        'customer_id'
    ];

    public function Products():BelongsToMany
    {
        return $this->belongsToMany(Product::class,'online_order_contains');
    }

    public function employees():BelongsToMany
    {
        return $this->belongsToMany(Employee::class,'delivers');
    }

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
