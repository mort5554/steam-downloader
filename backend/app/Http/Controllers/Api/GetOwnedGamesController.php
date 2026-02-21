<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SteamService;
use Illuminate\Http\Request;

class GetOwnedGamesController extends Controller
{
    public function getOwnedGames(Request $request, SteamService $service)
    {
        try{
            $response = $service->getOwnedGamesService();
            $response = $response['response'];
            $games = collect($response['games']);

            $search = $request->query('search');

            if ($search) {
                $games = $games->filter(function ($game) use($search) {
                    return str_contains(strtolower($game['name']), strtolower($search));
                });
            }

            return response()->json(
            [
                    'games_count' => $response['game_count'],
                    'games' => $games->map(function($game){
                        return[
                            'appid' => $game['appid'],
                            'name' => $game['name'],
                            'img_icon_url' => "https://media.steampowered.com/steamcommunity/public/images/apps/{$game['appid']}/{$game['img_icon_url']}.jpg",
                            'img_capsule_url' => "https://cdn.cloudflare.steamstatic.com/steam/apps/{$game['appid']}/capsule_231x87.jpg",
                            'img_header_url' => "https://cdn.cloudflare.steamstatic.com/steam/apps/{$game['appid']}/header.jpg",
                            'playtime_forever' => $game['playtime_forever'],
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
