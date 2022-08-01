<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{

    protected $fillable = [
        'name',
        'constellation_id',
    ];

    public function constellation()
    {
        return $this->belongsTo(Constellation::class);
    }
}
