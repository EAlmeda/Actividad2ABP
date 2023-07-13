<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'surname_1',
        'surname_2',
        'team',
        'phone',
        'email',
        'work_shift',
        'bank_account',
        'address'
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
