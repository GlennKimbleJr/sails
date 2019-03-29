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

    public function getListPriceInDollarsAttribute()
    {
        return '$' . number_format($this->list_price/100, 2);
    }

    public function generateQuote($price)
    {
        return $this->sales()->create([
            'status' => 'quoted',
            'price' => dollar_to_integer($price),
        ]);
    }
}
