<?php

namespace Database\Seeders;

use App\Models\Suscription;
use Illuminate\Database\Seeder;

class SuscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suscription::create([
            'status' => 'Suscrito',
            'photographer_id' => '1',
        ]);
    }
}
