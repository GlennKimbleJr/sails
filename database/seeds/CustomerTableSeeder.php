<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class)->create([
            'first_name' => 'Glenn',
            'last_name' => 'Kimble',
            'email' => 'glenn@glennkimble.me',
            'phone' => 8138675309,
            'address' => '123 Main St',
            'city' => 'Tampa',
            'state' => 'FL',
            'country' => 'US',
            'postal_code' => 33624,
        ]);
    }
}
