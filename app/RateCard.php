<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateCard extends Model
{
    protected $fillable = ['from', 'to', 'amount'];
}
