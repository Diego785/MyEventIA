<?php

namespace Database\Seeders;

use App\Models\Photographer;
use Illuminate\Database\Seeder;

class PhotographerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photographer::create([
            'user_id' => 1,
            'telephone' => '72345235',
            'carnet' => '7436753',
        ]);
        Photographer::create([
            'user_id' => 4,
            'telephone' => '65743262',
            'carnet' => '7435438',

        ]);
        Photographer::create([
            'user_id' => 3,
            'telephone' => '75482362',
            'carnet' => '3944044',

        ]);
        Photographer::create([
            'user_id' => 5,
            'telephone' => '65346983',
            'carnet' => '1982333',
        ]);
        Photographer::create([
            'user_id' => 2,
            'telephone' => '758432654',
            'carnet' => '2093801',
        ]);
    }
}
