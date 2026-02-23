<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SteamService;

class SteamController extends Controller
{
    public function getInstalledGames(SteamService $service)
    {
        try{
            $response = $service->getInstalledGamesService();

            return $response;
        }
        catch(\Throwable $e){
            \Log::error('SteamController error'.$e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Server error'.$e], 500);
        }
    }
}
