<?php

namespace Tests\Feature;

use App\Boat;
use App\User;
use App\Equipment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewBoatsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_view_the_boats_index()
    {
        $this->get(route('boats.index'))->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_cannot_view_individual_boats()
    {
        $boat = factory(Boat::class)->create();
        $this->get(route('boats.show', $boat))->assertRedirect(route('login'));
    }

    /** @test */
    public function users_can_view_the_boats_index()
    {
        $user = factory(User::class)->create();

        $boat = factory(Boat::class)->create([
            'year' => 2006,
            'make' => 'Boston Whaler',
            'model' => '205 Conquest',
            'list_price' => '2890000',
        ]);

        $this->actingAs($user)->get(route('boats.index'))
            ->assertStatus(200)
            ->assertSee('2006')
            ->assertSee('Boston Whaler')
            ->assertSee('205 Conquest')
            ->assertSee('$28,900.00');
    }

    /** @test */
    public function users_can_view_individual_boats()
    {
        $user = factory(User::class)->create();

        $boat = factory(Boat::class)->create([
            'year' => 2006,
            'make' => 'Boston Whaler',
            'model' => '205 Conquest',
            'list_price' => '2890000',
            'serial_number' => 'ABCD1234',
            'stock_number' => 'EFG45678',
        ]);

        $equipment = factory(Equipment::class)->create(['name' => 'Anchor']);

        $boat->equipment()->attach($equipment);

        $this->actingAs($user)->get(route('boats.show', $boat))
            ->assertStatus(200)
            ->assertSee('2006')
            ->assertSee('Boston Whaler')
            ->assertSee('205 Conquest')
            ->assertSee('$28,900.00')
            ->assertSee('Anchor');
    }
}
