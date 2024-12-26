<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function car_detail()
    {
        return $this->belongsTo('App\Models\CarDetail');
    }
}
