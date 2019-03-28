<?php

namespace Tests\Feature;

use App\Boat;
use App\Sale;
use App\User;
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
        $this->getRoute = route('sales.create', $this->boat);
        $this->postRoute = route('sales.store', $this->boat);
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
        $this->actingAs($this->user)->post($this->postRoute, [
            'price' => '$25.00',
        ])->assertStatus(200);

        $sales = Sale::get();
        $this->assertCount(1, $sales);
        $this->assertEquals(2500, $sales->first()->price);
    }

    /** @test */
    public function a_price_is_required_to_purchase_a_boat()
    {
        $this->actingAs($this->user)->post($this->postRoute, [
            'price' => null,
        ])->assertSessionHasErrors('price');

        $this->assertEmpty(Sale::get());
    }
}
