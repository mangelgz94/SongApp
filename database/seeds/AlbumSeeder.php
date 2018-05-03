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
        Album::firstOrCreate(['name' => 'Rollover Over Beethoven']);
        Album::firstOrCreate(['name' => 'Beethoven Piano Sonatas']);
        Album::firstOrCreate(['name' => 'Beatles']);
    }
}
