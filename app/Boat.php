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

    public function generateQuote()
    {
        return $this->sales()->create([
            'status' => 'quoted',
        ]);
    }
}
