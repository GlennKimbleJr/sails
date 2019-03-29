<?php

namespace App;

use App\Boat;
use App\Customer;
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

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function getPriceInDollarsAttribute()
    {
        return '$' . number_format($this->price/100, 2);
    }

    public function for(array $customer_ids)
    {
        $this->customers()->sync($customer_ids);

        return $this;
    }
}
