<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventGuest;
use App\Models\EventPayment;
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
        Event::create([
            'name' => 'Bautizo de Miguelito',
            'description' => 'Bautizo en la iglesia Jesus Nazareno',
            'address' => 'Calle Florida, entre 5 de Mayo y Ballivián',
            'date' => '07/06/2023',
            'start_time' => '13:59:00',
            'end_time' => '15:59:00',
            'organizer_id' => 1,
        ]);

        EventPayment::create([
            'status' => 'Aceptado',
            'amount' => '20',
            'description' => 'Saca fotografías de los invitados a la boda. Solo a niños.',
            'photographer_id' => 3,
            'organizer_id' => 1,
            'event_id' => 1,
        ]);
        EventPayment::create([
            'status' => 'Aceptado',
            'amount' => '30',
            'description' => 'Saca fotos a todos los que te pidan.',
            'photographer_id' => 1,
            'organizer_id' => 1,
            'event_id' => 1,
        ]);
        EventPayment::create([
            'status' => 'Pendiente',
            'amount' => '20',
            'description' => 'Saca fotos solo del bebé.',
            'photographer_id' => 1,
            'organizer_id' => 1,
            'event_id' => 2,
        ]);
        EventGuest::create([
            'event_id' => 1,
            'guest_id' => 1,
        ]);
        EventGuest::create([
            'event_id' => 1,
            'guest_id' => 2,
        ]);
        EventGuest::create([
            'event_id' => 1,
            'guest_id' => 3,
        ]);
        EventGuest::create([
            'event_id' => 1,
            'guest_id' => 5,
        ]);

        EventGuest::create([
            'event_id' => 2,
            'guest_id' => 4,
        ]);
      
    }
}
