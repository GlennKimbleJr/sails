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

    /** @test */
    public function list_price_in_dollars_returns_the_list_price_in_dollars()
    {
        $boat = factory(Boat::class)->create(['list_price' => 2500000]);

        $this->assertEquals('$25,000.00', $boat->list_price_in_dollars);
    }

    /** @test */
    public function name_returns_the_boats_year_make_and_model_concatenated()
    {
        $boat = factory(Boat::class)->create([
            'year' => 2008,
            'make' => 'Ford',
            'model' => 'Ranger',
        ]);

        $this->assertEquals('2008 Ford Ranger', $boat->name);
    }
}
