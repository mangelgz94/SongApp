<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{

    protected $fillable = ['name', 'url', 'artist_id', 'album_id'];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'id');
    }
}
