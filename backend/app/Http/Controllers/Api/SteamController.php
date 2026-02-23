<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class SteamController extends Controller
{
    public function installed()
{
    $response = Http::get('http://100.122.221.128:3000/installed-games');

    return $response->json();
}
}
