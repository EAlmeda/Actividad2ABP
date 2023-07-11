<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'booker_name',
        'booker_phone',
        'booker_email',
        'people_quantity',
        'date',
        'time',
    ];

    public function Customer():BelongsToMany
    {
        return $this->belongsToMany(Customer::class,'does');
    }
}
