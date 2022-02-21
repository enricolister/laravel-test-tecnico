<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BeerController extends Controller
{
    public function getBeers(Request $request, string $page)
    {
        $token = $request->header('Authorization');
        Log::info('Internal API contacted with token: ' . $token);

        $user = User::where('remember_token', $token)->first();
        if (!$user) {
            return response('Not authorized', 401);
        }
        $apiUrl = 'https://api.punkapi.com/v2/beers?page=' . $page;
        try {
            return response(Helper::performCurlGetRequest($apiUrl));
        } catch (\Exception $e) {
            Log::error('#getBeers: ' . $e->getMessage());
            $errorString = 'C\'è stato un problema nella chiamata a punk: ' . $e->getMessage();
            return redirect(route('home'))->withErrors([
                '5' => $errorString
            ]);
        }
    }
}
