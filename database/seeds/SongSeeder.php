<?php

use App\Album;
use App\Artist;
use App\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Artists
        $beatlesArtist    = Artist::where('name', 'Beatles')->first();
        $chuckBerryArtist = Artist::where('name', 'Chuck Berry')->first();
        $beethovenArtist  = Artist::where('name', 'Beethoven')->first();

        //Albums
        $rolloverOverBeethovenAlbum = Album::where('name', 'Rollover Over Beethoven')->first();
        $beethovenPianoSonatasAlbum = Album::where('name', 'Beethoven Piano Sonatas')->first();
        $beatlesAlbum               = Album::where('name', 'Beatles')->first();


        Song::firstORCreate([
            'name'      => 'Johnny B. Goode',
            'url'       => 'spotify:album:3qfz9wig4gcrb4bimw9ov7',
            'artist_id' => $chuckBerryArtist->id,
            'album_id'  => $rolloverOverBeethovenAlbum->id
        ]);

        Song::firstORCreate([
            'name'      => 'Moonlight Sonata',
            'url'       => 'spotify:track:7linrtr5px7i3r96mducjw',
            'artist_id' => $beethovenArtist->id,
            'album_id'  => $beethovenPianoSonatasAlbum->id
        ]);

        Song::firstORCreate([
            'name'      => 'Twist and Shout',
            'url'       => 'spotify:track:7linrtr5px7i3r96mducjw',
            'artist_id' => $beatlesArtist->id,
            'album_id'  => $beatlesAlbum->id
        ]);

        Song::firstORCreate([
            'name'      => 'I saw her standing here',
            'url'       => 'spotify:track:7linrtr5px7i3r96mducjw',
            'artist_id' => $beatlesArtist->id,
            'album_id'  => $beatlesAlbum->id
        ]);

        Song::firstORCreate([
            'name'      => 'Here comes the sun',
            'url'       => 'spotify:track:7linrtr5px7i3r96mducjw',
            'artist_id' => $beatlesArtist->id,
            'album_id'  => $beatlesAlbum->id
        ]);

        Song::firstORCreate([
            'name'      => 'Ain\'nt she sweet',
            'url'       => 'spotify:track:7linrtr5px7i3r96mducjw',
            'artist_id' => $beatlesArtist->id,
            'album_id'  => $beatlesAlbum->id
        ]);

        Song::firstORCreate([
            'name'      => 'Beatles Reimagined',
            'url'       => 'spotify:track:7linrtr5px7i3r96mducjw',
            'artist_id' => $beatlesArtist->id,
            'album_id'  => $beatlesAlbum->id
        ]);

    }
}
