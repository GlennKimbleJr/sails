<?php

namespace App;

use App\Boat;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price',
        'status',
    ];

    public function boat()
    {
        return $this->belongsTo(Boat::class);
    }
}
