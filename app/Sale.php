<?php

namespace App;

use App\Boat;
use App\Customer;
use App\Collections\SaleCollection;
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

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param  array  $models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function newCollection(array $models = [])
    {
        return new SaleCollection($models);
    }

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
