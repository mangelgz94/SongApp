<?php

namespace App\Http\Controllers;

use App\Classes\SongsManager;
use App\Song;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SongApiController extends ApiController
{

    protected $songsManager;

    /**
     * SongApiController constructor.
     * @param $songsManager
     */
    public function __construct(SongsManager $songsManager)
    {
        $this->songsManager = $songsManager;
    }


    public function index()
    {
        try {
            $songs = $this->songsManager->getPlaylist();

            return $this->respond($songs);
        } catch (Exception $e) {
            Log::error($e);

            return $this->respondInternalError();
        }
    }

    public function show($id)
    {
        try {
            $songs = $this->songsManager->getSongFromPlaylist($id);

            return $this->respond($songs);
        } catch (ModelNotFoundException $e) {
            Log::error($e);

            return $this->respondNotFound();
        } catch (Exception $e) {
            Log::error($e);

            return $this->respondInternalError();
        }
    }


}
