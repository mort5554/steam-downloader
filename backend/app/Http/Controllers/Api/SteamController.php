<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SteamService;
use Illuminate\Http\Request;

class SteamController extends Controller
{
    public function getInstalledGames(Request $request, SteamService $service)
    {
        try{

            $response = $service->getInstalledGamesService();

            $games = collect($response);

            $search = $request->query('search');
            if($search){
                $response = $games->filter(function($game) use($search) {
                    return str_contains(strtolower($game['name']), strtolower($search));
                });
            }

            return $response;
        }
        catch(\Throwable $e){
            \Log::error('SteamController error'.$e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Server error'.$e], 500);
        }
    }
}
