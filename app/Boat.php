<?php

namespace App;

use App\Sale;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function generateQuote($price)
    {
        return $this->sales()->create([
            'status' => 'quoted',
            'price' => dollar_to_integer($price),
        ]);
    }
}
