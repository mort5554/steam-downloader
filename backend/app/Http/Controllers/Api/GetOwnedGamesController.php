<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SteamService;

class GetOwnedGamesController extends Controller
{
    public function getOwnedGames(SteamService $service)
    {
        try{
            $response = $service->getOwnedGames();
            $response = $response['response'];
            return response()->json(
            [
                    'game_count' => $response['game_count'],
                    'games' => collect($response['games'])->map(function($game){
                        return[
                            'appid' => $game['appid'],
                            'name' => $game['name'],
                            'img_icon_url' => "https://media.steampowered.com/steamcommunity/public/images/apps/{$game['appid']}/{$game['img_icon_url']}.jpg",
                            'img_capsule' => "https://cdn.cloudflare.steamstatic.com/steam/apps/{$game['appid']}/capsule_231x87.jpg",
                            'img_header' => "https://cdn.cloudflare.steamstatic.com/steam/apps/{$game['appid']}/header.jpg",
                        ];
                    })
                ]
                , 200);
        }
        catch(\Throwable $e){
            \Log::error('GetOwnedGamesController error'.$e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Server error'.$e], 500);
        }
    }
}
