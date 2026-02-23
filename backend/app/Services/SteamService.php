<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SteamService
{
    private string $apiKey;
    private string $accountId;
    private string $tailscaleIp;
    private string $agentPort;

    public string $baseGamesListUrl = 'api.steampowered.com/';
    public string $getOwnedGamesUrl = 'IPlayerService/GetOwnedGames/v0001/';

    // public string $baseGamesDetailsUrl = 'store.steampowered.com/';
    // public string $getGameDetailsUrl = 'api/appdetails/';

    public string $agentUri = 'installed-games/';

    public function __construct(){
        $this->apiKey = config('steam.key');
        $this->accountId = config('steam.account_id');
        $this->tailscaleIp = config('steam.tailscale_ip');
        $this->agentPort = config('steam.agent_port');
    }

    public function getOwnedGamesService(){
        // $response = Http::get($this->baseUrl.'/?key='.$this->apiKey.'&steamid='.$this->accountId.'&include_played_free_games=true&include_appinfo=true');
        $response = Http::get($this->baseGamesListUrl.''.$this->getOwnedGamesUrl, [
            'key' => $this->apiKey,
            'steamid' => $this->accountId,
            'include_played_free_games' => true,
            'include_appinfo' => true,
        ]);

        return $response;
    }

    public function getInstalledGamesService(){
        $response = Http::get($this->tailscaleIp.':'.$this->agentPort.'/'.$this->agentUri);

        $games = collect($response->json());

        $games = $games->map(function($game){
            return [
                'appid' => $game['appid'],
                'name' => $game['name'],
                'installdir' => $game['installdir'],
                'size' => $game['size'],
                'img_header_url' => "https://cdn.cloudflare.steamstatic.com/steam/apps/{$game['appid']}/header.jpg",
            ];
        });

        return $games;
    }

    // public function getGameDetails($appid){
    //     // https://store.steampowered.com/api/appdetails?appids=730
    //     $response = Http::get($this->baseGamesDetailsUrl.''.$this->getGameDetailsUrl , [
    //         'appids' => $appid,
    //     ]);

    //     // \Log::info('test', ['test' => $response]);

    //     return $response;
    // }
}
