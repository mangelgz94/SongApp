@extends('layouts.app')

@section('content')

    <div class="container" id="body">
        <span class="app-title"><h1>Hangar O'clock Songs</h1></span>
        <div id="root">
            <input type="hidden" value="{{$id}}" id="songId">

            <div class="media" v-if="song">
                <img class="mr-3" :src="song.album.image_url" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0">@{{ song.name }}</h5>
                    <p>Album: @{{ song.album.name }}</p>
                    <p>Artist: @{{ song.artist.name }}</p>
                </div>
                <iframe :src="song.url" frameborder="0"></iframe>
            </div>
        </div>
    </div>
    <div class="footer">
        <div><p>@ 2011 The Hangar Interactive. All rights reserved</p></div>
        <div><a class="footerA" href="#">Privacy Policy</a> | <a class="footerA" href="#">Terms of Use</a> | <a
                    class="footerA" href="#">Contact Us</a></div>
    </div>
    <script src="{{ asset('js/song.js') }}" defer></script>

@endsection
