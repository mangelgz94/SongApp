<?php

use App\Artist;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artist::firstOrCreate([
            'name' => 'Chuck Berry'
        ]);

        Artist::firstOrCreate([
            'name' => 'Beethoven'
        ]);

        Artist::firstOrCreate([
            'name' => 'Beatles'
        ]);
    }
}
