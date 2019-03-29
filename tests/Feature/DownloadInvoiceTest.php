<?php

namespace Tests\Feature;

use App\Sale;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DownloadInvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->sale = factory(Sale::class)->create();
        $this->route = route('sales.invoice', $this->sale);
    }

    /** @test */
    public function guests_cannot_download_an_invoice()
    {
        $this->get($this->route)->assertRedirect(route('login'));
    }

    /** @test */
    public function users_can_download_an_invoice()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)->get($this->route)->assertStatus(200);
    }
}
