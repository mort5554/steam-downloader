<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GetOwnedGamesController;

Route::get('/test', function(){
    return response()->json(
        ['message' => 'test']
    );
});

Route::get('/get_owned_games', [GetOwnedGamesController::class, 'getOwnedGames']);
