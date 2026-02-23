<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GetOwnedGamesController;
use App\Http\Controllers\Api\SteamController;

Route::get('/test', function(){
    return response()->json(
        ['message' => 'test']
    );
});

Route::get('/get_owned_games', [GetOwnedGamesController::class, 'getOwnedGames']);

Route::post('/installed-games', [SteamController::class, 'installed']);
