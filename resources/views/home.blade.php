@extends('layouts.app')

@section('content')

    <div class="container">
        <span class="app-title"><h1>Hangar O'clock Songs</h1></span>
        <div id="root">
            <div class="inputWithIcon inputIconBg">
                <input type="text" id="searchSong" placeholder="Search for a song" v-model="search">
            </div>
            <song v-for="song in filteredSongs">
                <template slot="songName">@{{ song.name }}</template>
                <template slot="artistName">@{{ song.artist.name }}</template>
            </song>
        </div>
    </div>
    <div class="footer">
        <div ><p>@ 2011 The Hangar Interactive. All rights reserved</p></div>
        <div ><a class="footerA" href="#">Privacy Policy</a> | <a class="footerA" href="#">Terms of Use</a> | <a class="footerA" href="#">Contact Us</a></div>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection
