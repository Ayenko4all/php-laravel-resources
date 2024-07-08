<?php

namespace Database\Seeders;

use DMO\SavingsBond\Models\Offer;
use Illuminate\Database\Seeder;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offer::factory()->create();
    }
}
