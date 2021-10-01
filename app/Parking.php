<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $fillable = [
        'user_id', 'consignmentno', 'vehicle_no', 'checkin', 'checkout',
        'hours', 'amount', 'date'
    ];
}
