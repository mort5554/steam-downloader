<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GetOwnedGamesController;
use App\Http\Controllers\Api\SteamController;


Route::get('/get_owned_games', [GetOwnedGamesController::class, 'getOwnedGames']);

Route::get('/installed_games', [SteamController::class, 'getInstalledGames']);
