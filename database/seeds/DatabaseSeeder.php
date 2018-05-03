<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArtistSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(SongSeeder::class);
    }
}
