<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SteamService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class GetOwnedGamesController extends Controller
{
    public function paginateCollection($items, $perPage = 10)
    {
        $page = LengthAwarePaginator::resolveCurrentPage();

        $results = $items->slice(($page - 1) * $perPage, $perPage)->values();

        return new LengthAwarePaginator(
            $results,
            $items->count(),
            $perPage,
            $page,
            ['path' => request()->url()]
        );
    }

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

            $games = $games->map(function($game){
                return[
                    'appid' => $game['appid'],
                    'name' => $game['name'],
                    'img_icon_url' => "https://media.steampowered.com/steamcommunity/public/images/apps/{$game['appid']}/{$game['img_icon_url']}.jpg",
                    'img_capsule_url' => "https://cdn.cloudflare.steamstatic.com/steam/apps/{$game['appid']}/capsule_231x87.jpg",
                    'img_header_url' => "https://cdn.cloudflare.steamstatic.com/steam/apps/{$game['appid']}/header.jpg",
                    'playtime_forever' => $game['playtime_forever'],
                ];
            });

            $paginated = $this->paginateCollection(
                $games,
                $request->query('per_page', 30)
            );

            return response()->json($paginated, 201);
        }
        catch(\Throwable $e){
            \Log::error('GetOwnedGamesController error'.$e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Server error'.$e], 500);
        }
    }
}
