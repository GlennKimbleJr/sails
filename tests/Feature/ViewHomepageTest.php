<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewHomepageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_view_the_homepage()
    {
        $this->get(route('home'))->assertRedirect(route('login'));
    }

    /** @test */
    public function users_can_view_the_homepage()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)->get(route('home'))->assertStatus(200);
    }
}
