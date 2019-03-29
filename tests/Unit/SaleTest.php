<?php

namespace Tests\Unit;

use App\Sale;
use App\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SaleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function for_associates_a_sale_with_a_given_customer()
    {
        $customer = factory(Customer::class)->create();
        $customer2 = factory(Customer::class)->create();
        $sale = factory(Sale::class)->create();
        $this->assertEmpty($sale->customers);

        $sale->for([$customer->id, $customer2->id]);

        $sale = $sale->refresh();
        $this->assertCount(2, $sale->customers);
        $this->assertTrue($sale->customers->first()->is($customer));
        $this->assertTrue($sale->customers->last()->is($customer2));
    }

    /** @test */
    public function price_in_dollars_returns_the_price_in_dollars()
    {
        $sale = factory(Sale::class)->create(['price' => 2500000]);

        $this->assertEquals('$25,000.00', $sale->price_in_dollars);
    }
}
