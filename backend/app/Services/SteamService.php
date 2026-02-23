<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SteamService
{
    private string $apiKey;
    private string $accountId;

    public string $baseGamesListUrl = 'https://api.steampowered.com/';
    public string $getOwnedGamesUrl = 'IPlayerService/GetOwnedGames/v0001';

    public string $baseGamesDetailsUrl = 'https://store.steampowered.com/';
    public string $getGameDetailsUrl = 'api/appdetails';

    public function __construct(){
        $this->apiKey = config('steam.key');
        $this->accountId = config('steam.account_id');
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

    // public function getGameDetails($appid){
    //     // https://store.steampowered.com/api/appdetails?appids=730
    //     $response = Http::get($this->baseGamesDetailsUrl.''.$this->getGameDetailsUrl , [
    //         'appids' => $appid,
    //     ]);

    //     // \Log::info('test', ['test' => $response]);

    //     return $response;
    // }
}
