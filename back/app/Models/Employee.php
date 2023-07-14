<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
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

    public function onlineOrders():BelongsToMany
    {
        return $this->belongsToMany(OnlineOrder::class,'delivers');
    }

    public function kitchenOrders():BelongsToMany
    {
        return $this->belongsToMany(KitchenOrder::class,'cook');
    }

    public function boards():BelongsToMany
    {
        return $this->belongsToMany(Board::class,'serves');
    }

}
