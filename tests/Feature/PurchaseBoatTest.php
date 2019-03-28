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

        $this->boat = factory(Boat::class)->create();
    }

    /** @test */
    public function guests_cannot_purchase_a_boat()
    {
        $this->get(route('sales.create', $this->boat))->assertRedirect(route('login'));
        $this->post(route('sales.store', $this->boat))->assertRedirect(route('login'));
        $this->assertEmpty(Sale::get());
    }

    /** @test */
    public function users_can_purchase_a_boat()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->get(route('sales.create', $this->boat))->assertStatus(200);

        $this->actingAs($user)->post(route('sales.store', $this->boat))->assertStatus(200);

        $this->assertCount(1, Sale::get());
    }
}
