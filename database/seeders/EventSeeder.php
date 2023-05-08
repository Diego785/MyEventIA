<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventPhotographer;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'name' => 'Boda de José y María',
            'description' => 'Boda por la iglesia',
            'address' => 'Calle 2 Oeste 25, Santa Cruz de la Sierra',
            'date' => '15/04/2023',
            'start_time' => '16:00:00',
            'end_time' => '22:00:00',
            'organizer_id' => 1,
        ]);

      
    }
}
