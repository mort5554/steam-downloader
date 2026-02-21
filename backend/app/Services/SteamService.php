<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SteamService
{
    private string $apiKey;
    private string $accountId;

    private string $baseUrl;

    public string $getOwnedGamesUrl = '/IPlayerService/GetOwnedGames/v0001';

    public function __construct(){
        $this->apiKey = config('steam.key');
        $this->accountId = config('steam.account_id');
        $this->baseUrl = 'https://api.steampowered.com';
    }

    public function getOwnedGamesService(){
        // $response = Http::get($this->baseUrl.'/?key='.$this->apiKey.'&steamid='.$this->accountId.'&include_played_free_games=true&include_appinfo=true');
        $response = Http::get($this->baseUrl.''.$this->getOwnedGamesUrl, [
            'key' => $this->apiKey,
            'steamid' => $this->accountId,
            'include_played_free_games' => true,
            'include_appinfo' => true,
        ]);

        return $response;
    }
}
