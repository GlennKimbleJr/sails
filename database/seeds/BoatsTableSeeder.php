<?php

use App\Boat;
use App\Equipment;
use Illuminate\Database\Seeder;

class BoatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anchor = factory(Equipment::class)->create(['name' => 'Anchor']);
        $ladder = factory(Equipment::class)->create(['name' => 'Ladder']);
        $equipmentList = [$anchor->id, $ladder->id];

        factory(Boat::class)->create([
            'year' => 2018,
            'make' => 'Blackfin',
            'model' => '272CC Center Console',
            'list_price' => '16490000',
        ])->equipment()->sync($equipmentList);

        factory(Boat::class)->create([
            'year' => 2000,
            'make' => 'Boston Whaler',
            'model' => '18 Dauntless',
            'list_price' => '1490000',
        ])->equipment()->sync($equipmentList);

        factory(Boat::class)->create([
            'year' => 2006,
            'make' => 'Boston Whaler',
            'model' => '205 Conquest',
            'list_price' => '2890000',
        ])->equipment()->sync($equipmentList);

        factory(Boat::class)->create([
            'year' => 2006,
            'make' => 'Boston Whaler',
            'model' => '240 Outrage',
            'list_price' => '4990000',
        ])->equipment()->sync($equipmentList);

        factory(Boat::class)->create([
            'year' => 2013,
            'make' => 'Boston Whaler',
            'model' => '320 Outrage',
            'list_price' => '17990000',
        ])->equipment()->sync($equipmentList);

        factory(Boat::class)->create([
            'year' => 2007,
            'make' => 'Bryant',
            'model' => '240 Bowrider',
            'list_price' => '2490000',
        ])->equipment()->sync($equipmentList);

        factory(Boat::class)->create([
            'year' => 2012,
            'make' => 'Carolina Skiff',
            'model' => 'Ultra Elite 19',
            'list_price' => '1990000',
        ])->equipment()->sync($equipmentList);

        factory(Boat::class)->create([
            'year' => 2010,
            'make' => 'Century',
            'model' => '2202 Bay Boat',
            'list_price' => '3490000',
        ])->equipment()->sync($equipmentList);

        factory(Boat::class)->create([
            'year' => 2015,
            'make' => 'Cobia',
            'model' => '217 Center Console',
            'list_price' => '4490000',
        ])->equipment()->sync($equipmentList);

        factory(Boat::class)->create([
            'year' => 2018,
            'make' => 'Cobia',
            'model' => '220 Center Console',
            'list_price' => '5990000',
        ])->equipment()->sync($equipmentList);

        factory(Boat::class)->create([
            'year' => 2017,
            'make' => 'Cobia',
            'model' => '220 Center Console',
            'list_price' => '5990000',
        ])->equipment()->sync($equipmentList);
    }
}
