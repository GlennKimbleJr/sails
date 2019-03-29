<?php

namespace App;

use App\Boat;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    public function boats()
    {
        return $this->belongsToMany(Boat::class);
    }
}
