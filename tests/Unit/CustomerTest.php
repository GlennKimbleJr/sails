<?php

namespace Tests\Unit;

use App\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function full_name_returns_the_first_and_last_name_concatenated()
    {
        $customer = factory(Customer::class)->create([
            'first_name' => 'John',
            'last_name' => 'Smith',
        ]);

        $this->assertEquals('John Smith', $customer->full_name);
    }
}
