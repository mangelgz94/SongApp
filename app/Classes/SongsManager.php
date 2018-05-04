<?php
/**
 * Created by PhpStorm.
 * User: Transcendent-PC
 * Date: 5/3/2018
 * Time: 11:00 PM
 */

namespace App\Classes;


use App\Song;
use Illuminate\Support\Facades\Cache;

class SongsManager
{

    public function getPlaylist()
    {
        if (env('SPOTIFY_CLIENT_ID') and env('SPOTIFY_CLIENT_SECRET') and Cache::has('playlist')) {
            return $this->formatSongsFromSpotify(Cache::get('playlist'));
        }

        return Song::with(['artist', 'album'])->get();
    }


    public function getSongFromPlaylist($songId)
    {

        if (env('SPOTIFY_CLIENT_ID') and env('SPOTIFY_CLIENT_SECRET') and Cache::has('playlist')) {
            $playlist = Cache::get('playlist');
            $song     = array_filter($playlist->items, function ($song) use ($songId) {
                return $song->track->id == $songId;
            });

            return $this->formatSongFromSpotify(array_values($song)[0]);
        }

        return $songs = Song::with(['artist', 'album'])->findOrFail($songId);
    }

    private function formatSongsFromSpotify($playlist)
    {
        $songs = [];
        foreach ($playlist->items as $song) {
            $songs [] = $this->formatSongFromSpotify($song);
        }

        return $songs;
    }

    private function formatSongFromSpotify($song)
    {

        $formattedSong                   = new \StdClass;
        $formattedSong->id               = $song->track->id;
        $formattedSong->name             = $song->track->name;
        $formattedSong->url              = $song->track->preview_url;
        $formattedSong->artist           = new \StdClass;
        $formattedSong->artist->name     = $this->formatArtistNameFromSpotify($song->track->artists);
        $formattedSong->album            = new \stdClass();
        $formattedSong->album->name      = $song->track->album->name;
        $formattedSong->album->image_url = $this->getAlbumImageURL($song);

        return $formattedSong;
    }

    private function getAlbumImageURL($song)
    {
        $image = array_filter($song->track->album->images, function ($image) {
            return $image->height == 64 and $image->width == 64;
        });

        if (empty($image)) {
            return env('DEFAULT_ALBUM_IMAGE_URL');
        }

        return array_values($image)[0]->url;
    }

    private function formatArtistNameFromSpotify($artists)
    {
        $formattedArtistName = '';
        foreach ($artists as $artist) {
            $formattedArtistName .= $artist->name . ' - ';
        }
        $formattedArtistName = rtrim($formattedArtistName, " - ");

        return $formattedArtistName;
    }
}