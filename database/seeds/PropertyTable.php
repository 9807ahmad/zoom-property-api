<?php

use Illuminate\Database\Seeder;

use App\Property;

class PropertyTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::factory()->count(50)->create();
    }
}
