<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function renters()
    {
        return $this->hasMany('App\Models\Renter');
    }
}
