<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Http;

class Helper
{
    public static function performCurlGetRequest($url, $headers = null) {

        $response = Http::withHeaders($headers)->get($url);
        $statusCode = $response->status();
        return json_decode($response->getBody(), true);
    }
}
