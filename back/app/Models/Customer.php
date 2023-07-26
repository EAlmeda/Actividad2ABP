<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'surname_1',
        'surname_2',
        'birth_date',
        'phone',
        'email',
        'address'
    ];

    public function onlineOrders():HasMany
    {
        return $this->hasMany(OnlineOrder::class);
    }

    public function bookings():HasMany
    {
        return $this->hasMany(Bookings::class);
    }

}
