<?php

namespace Database\Seeders;

use App\Models\Organizer;
use Illuminate\Database\Seeder;

class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organizer::create([
            'carnet' => '5431934 SC',
            'telephone' => '77773821',
            'user_id' => 6,
        ]);
        Organizer::create([
            'carnet' => '6453664 SC',
            'telephone' => '75064945',
            'user_id' => 9,
        ]);Organizer::create([
            'carnet' => '65743893 SC',
            'telephone' => '75204276',
            'user_id' => 8,
        ]);Organizer::create([
            'carnet' => '9548032 SC',
            'telephone' => '75342838',
            'user_id' => 7,
        ]);
    }
}
