<?php

namespace App\Http\Controllers;

use App\Song;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SongController extends ApiController
{

    public function index()
    {
        try {
            $songs = Song::with(['artist', 'album'])->get();

            return $this->respond($songs);
        } catch (Exception $e) {
            Log::error($e);

            return $this->respondInternalError();
        }
    }

    public function show($id)
    {
        try {
            $songs = Song::with(['artist', 'album'])->findOrFail($id);

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
