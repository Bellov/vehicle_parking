<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class AvtoParking extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'user_id',
        'car_number',
        'vehicle_type',
        'contact_name',
        'parking_spots',
        'phone',
        'created_at',
        'updated_at',
        'deleted_ats'
    ];

    const PARKING_SPOTS = 20;
    const CAR = 1;
    const TRUCK = 3;

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
