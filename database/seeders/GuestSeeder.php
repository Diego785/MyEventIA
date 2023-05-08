<?php

namespace Database\Seeders;

use App\Models\Guest;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Guest::create([
             'user_id' => 10,
         ]);
         Guest::create([
            'user_id' => 11,
        ]);
        Guest::create([
            'user_id' => 12,
        ]);
        Guest::create([
            'user_id' => 13,
        ]);
        Guest::create([
            'user_id' => 14,
        ]);
        // Organizer::create([
        //     'carnet' => '6453664 SC',
        //     'telephone' => '75064945',
        //     'user_id' => 9,
        // ]);Organizer::create([
        //     'carnet' => '65743893 SC',
        //     'telephone' => '75204276',
        //     'user_id' => 8,
        // ]);Organizer::create([
        //     'carnet' => '9548032 SC',
        //     'telephone' => '75342838',
        //     'user_id' => 7,
        // ]);
    }
}
