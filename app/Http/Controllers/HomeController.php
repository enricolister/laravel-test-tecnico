<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        return view('home')
            ->with('user', $user);
    }

    public function login()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect('login');
    }

    public function callInternalBeers (Request $request) {

        $user = Auth::user();

        $apiURL = 'https://jsonplaceholder.typicode.com/posts'; // DA METTERE CORRETTO

        $headers = [
            'Authorization' => $user->getRememberToken()
        ];

        $responseBody = Helper::performCurlGetRequest($apiURL, $headers);
        dd($responseBody);
    }
}
