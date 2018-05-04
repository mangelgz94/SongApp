<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class HomeController extends Controller
{

    protected $spotifyClient;
    protected $spotifyApi;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        if (env('SPOTIFY_CLIENT_ID') and env('SPOTIFY_CLIENT_SECRET')) {
            $this->getDataFromSpotify();
        }


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function song($id)
    {
        return view('song', compact('id'));
    }

    private function requestSpotifyToken()
    {
        $this->spotifyClient = new Session(env('SPOTIFY_CLIENT_ID'), env('SPOTIFY_CLIENT_SECRET'));
        if ($this->spotifyClient->requestCredentialsToken()) {
            $tokenExpiryInMinutes = floor($this->spotifyClient->getTokenExpiration() - time()) / 60;
            Cache::put('accessToken', $this->spotifyClient->getAccessToken(), $tokenExpiryInMinutes);
        }
    }

    private function getDataFromSpotify()
    {
        if (!Cache::has('accessToken')) {
            $this->requestSpotifyToken();
        }
        $this->spotifyApi = new SpotifyWebAPI();
        $this->spotifyApi->setAccessToken(Cache::get('accessToken'));

        if (!Cache::has('playlist')) {
            Cache::put('playlist', $this->spotifyApi->getUserPlaylistTracks(env('SPOTIFY_USER_ID'), env('SPOTIFY_TRACKLIST_ID')), 10);
        }
    }


}
