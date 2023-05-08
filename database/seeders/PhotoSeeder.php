<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::create([
            'path' => 'imgs/gvefvZ5NHgS8bRq3i03tSgOC6sZUx75DLJjEvInU.jpg',
            'category' => 'public',
            'photographer_id' => 1,
            'event_id' => 1,
        ]);

        Photo::create([
            'path' => 'imgs/JcZbM8QFYHvPrGX9qkvbJqBtHnye0GvVaPpkKq4D.jpg',
            'category' => 'public',
            'photographer_id' => 1,
            'event_id' => 1,
        ]);
        Photo::create([
            'path' => 'imgs/CsHeAHGHOzBg6LvoV3pjlOvORAD3J7xAqS7vFSMM.jpg',
            'category' => 'public',
            'photographer_id' => 1,
            'event_id' => 1,
        ]);Photo::create([
            'path' => 'imgs/iwe3SyQZKnEjVEzlA0yCQRcVlhzFFlN235r2We2i.jpg',
            'category' => 'public',
            'photographer_id' => 1,
            'event_id' => 1,
        ]);Photo::create([
            'path' => 'imgs/f0GDiWnBjcma41vskB2v9gOcKBBpib0hACYaJIof.jpg',
            'category' => 'public',
            'photographer_id' => 1,
            'event_id' => 1,
        ]);Photo::create([
            'path' => 'imgs/4vIWafhNTgjwLEGA96EY4zWLZWY77wYL1yUGxd2K.jpg',
            'category' => 'public',
            'photographer_id' => 1,
            'event_id' => 1,
        ]);Photo::create([
            'path' => 'imgs/dtsuwvdxdf2K7Bbc0SRPE1EdhnWPowisQ24dd6tz.jpg',
            'category' => 'public',
            'photographer_id' => 1,
            'event_id' => 1,
        ]);
    }
}
