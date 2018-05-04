<?php

use App\Album;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album::firstOrCreate(['name' => 'Rollover Over Beethoven', 'image_url' => '/images/play-button.png']);
        Album::firstOrCreate(['name' => 'Beethoven Piano Sonatas', 'image_url' => '/images/play-button.png']);
        Album::firstOrCreate(['name' => 'Beatles', 'image_url' => '/images/play-button.png']);
    }
}
