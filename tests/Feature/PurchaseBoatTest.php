<?php

namespace Tests\Feature;

use App\Boat;
use App\Sale;
use App\User;
use App\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PurchaseBoatTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->boat = factory(Boat::class)->create();
        $this->customer = factory(Customer::class)->create();
        $this->getRoute = route('sales.create', $this->boat);
        $this->postRoute = route('sales.store', $this->boat);
    }

    private function validParams($override = [])
    {
        return array_merge([
            'price' => '$25.00',
            'customers' => [$this->customer->id],
        ], $override);
    }

    /** @test */
    public function guests_cannot_purchase_a_boat()
    {
        $this->get($this->getRoute)->assertRedirect(route('login'));
        $this->post($this->postRoute)->assertRedirect(route('login'));
        $this->assertEmpty(Sale::get());
    }

    /** @test */
    public function users_can_purchase_a_boat()
    {
        $this->actingAs($this->user)->get($this->getRoute)->assertStatus(200);

        $this->actingAs($this->user)->post($this->postRoute, $this->validParams())->assertStatus(302);

        $this->assertCount(1, $sales = Sale::get());

        $sale = $sales->first();
        $this->assertEquals(2500, $sale->price);
        $this->assertCount(1, $sale->customers);
        $this->assertTrue($sale->customers->first()->is($this->customer));
    }

    /** @test */
    public function a_price_is_required_to_purchase_a_boat()
    {
        $this->actingAs($this->user)->post($this->postRoute, $this->validParams([
            'price' => null,
        ]))->assertSessionHasErrors('price');

        $this->assertEmpty(Sale::get());
    }

    /** @test */
    public function customers_is_required_to_purchase_a_boat()
    {
        $this->actingAs($this->user)->post($this->postRoute, $this->validParams([
            'customers' => null,
        ]))->assertSessionHasErrors('customers');

        $this->assertEmpty(Sale::get());
    }

    /** @test */
    public function customers_must_be_an_array_to_purchase_a_boat()
    {
        $this->actingAs($this->user)->post($this->postRoute, $this->validParams([
            'customers' => $this->customer->id,
        ]))->assertSessionHasErrors('customers');

        $this->assertEmpty(Sale::get());
    }

    /** @test */
    public function customers_must_contain_valid_ids_to_purchase_a_boat()
    {
        $this->actingAs($this->user)->post($this->postRoute, $this->validParams([
            'customers' => ['not-a-customer-id'],
        ]))->assertSessionHasErrors('customers.*');

        $this->assertEmpty(Sale::get());
    }

    /** @test */
    public function multiple_customers_can_be_attached()
    {
        $otherCustomer = factory(Customer::class)->create();

        $this->actingAs($this->user)->post($this->postRoute, $this->validParams([
            'customers' => [
                $this->customer->id,
                $otherCustomer->id,
            ]
        ]))->assertStatus(302);

        $this->assertCount(1, $sales = Sale::get());

        $sale = $sales->first();
        $this->assertCount(2, $sale->customers);
        $this->assertTrue($sale->customers->first()->is($this->customer));
        $this->assertTrue($sale->customers->last()->is($otherCustomer));
    }
}
