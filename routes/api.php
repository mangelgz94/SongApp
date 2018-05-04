<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function () {

    Route::group(['prefix' => 'songs'], function () {
        Route::get('/'      , ['as' => 'get_songs'  , 'uses' => 'SongApiController@index'  ]);
        Route::get('/{id}'  , ['as' => 'get_song'   , 'uses' => 'SongApiController@show'   ]);
    });
});

