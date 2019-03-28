<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HelperTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dollar_to_integer_will_convert_a_dollar_amount_string_to_an_integer_value()
    {
        $this->assertEquals(250000, dollar_to_integer('$2,500.00'));
    }

    /** @test */
    public function dollar_to_integer_will_remove_non_numeric_values()
    {
        $this->assertEquals(2500, dollar_to_integer('$a25.00b'));
    }
}
