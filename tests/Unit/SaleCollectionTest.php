<?php

namespace Tests\Unit;

use App\Sale;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SaleCollectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function quoted_returns_only_sales_with_a_status_of_quoted()
    {
        $quoted = factory(Sale::class)->create(['status' => 'quoted']);
        $pending = factory(Sale::class)->create(['status' => 'pending']);
        $delivered = factory(Sale::class)->create(['status' => 'delivered']);
        $sales = Sale::get();

        $this->assertCount(1, $sales->quoted());
        $this->assertTrue($sales->quoted()->first()->is($quoted));
    }

    /** @test */
    public function pending_returns_only_sales_with_a_status_of_pending()
    {
        $quoted = factory(Sale::class)->create(['status' => 'quoted']);
        $pending = factory(Sale::class)->create(['status' => 'pending']);
        $delivered = factory(Sale::class)->create(['status' => 'delivered']);
        $sales = Sale::get();

        $this->assertCount(1, $sales->pending());
        $this->assertTrue($sales->pending()->first()->is($pending));
    }

    /** @test */
    public function delivered_returns_only_sales_with_a_status_of_delivered()
    {
        $quoted = factory(Sale::class)->create(['status' => 'quoted']);
        $pending = factory(Sale::class)->create(['status' => 'pending']);
        $delivered = factory(Sale::class)->create(['status' => 'delivered']);
        $sales = Sale::get();

        $this->assertCount(1, $sales->delivered());
        $this->assertTrue($sales->delivered()->first()->is($delivered));
    }
}
