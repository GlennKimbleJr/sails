<?php

namespace Tests\Feature;

use App\Sale;
use App\User;
use App\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewSaleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->sale = factory(Sale::class)->create();
        $this->route = route('sales.show', $this->sale);
    }

    /** @test */
    public function guests_cannot_view_the_sale_page()
    {
        $this->get($this->route)->assertRedirect(route('login'));
    }

    /** @test */
    public function users_can_view_the_sale_page()
    {
        $user = factory(User::class)->create();
        $customer = factory(Customer::class)->create();
        $boat = $this->sale->boat;
        $this->sale->for([$customer->id]);

        $this->actingAs($user)->get($this->route)
            ->assertStatus(200)
            ->assertSee($boat->year)
            ->assertSee($boat->make)
            ->assertSee($boat->model)
            ->assertSee($this->sale->price_in_dollars)
            ->assertSee(ucwords($this->sale->status))
            ->assertSee($customer->full_name)
            ->assertSee($this->sale->created_at);
    }
}
