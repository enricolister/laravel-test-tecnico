<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Http;

class Helper
{
    public static function performCurlGetRequest($url, $headers = null)
    {
        $headers = $headers ?? [];
        $response = Http::withHeaders($headers)->get($url);

        $body = isset($response['body']) ? $response['body'] : json_decode($response->getBody(), true);
        $code = isset($response['code']) ? $response['code'] : $response->status();

        return [
            'body' => $body,
            'code' => $code
        ];
    }
}
