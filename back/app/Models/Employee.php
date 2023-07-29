<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'password',
        'work_shift',
        'bank_account',
        'address'
    ];

    public function onlineOrders():HasMany
    {
        return $this->hasMany(OnlineOrder::class);
    }

    public function kitchenOrders():HasMany
    {
        return $this->hasMany(KitchenOrder::class);
    }

    public function boards():HasMany
    {
        return $this->hasMany(Board::class);
    }

}
