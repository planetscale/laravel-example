<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Constellation extends Model
{

    protected $fillable = [
        'name',
    ];

    // Get all stars in a constellation
    public function stars()
    {
        return $this->hasMany(Star::class);
    }

}
