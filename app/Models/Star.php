<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{

    protected $fillable = [
        'name',
        'constellation',
    ];
}
