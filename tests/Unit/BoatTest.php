<?php

namespace Tests\Unit;

use App\Boat;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BoatTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function generate_quote_will_create_a_new_sale_with_a_status_of_quoted()
    {
        $boat = factory(Boat::class)->create();

        $this->assertEmpty($boat->sales);

        $quote = $boat->generateQuote('$25.00');

        $this->assertEquals('quoted', $quote->status);
        $this->assertEquals(2500, $quote->price);

        $this->assertCount(1, $boat->refresh()->sales);
    }
}
