<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function callInternalBeers (string $token, string $page = '1')
    {
        Log::info('Trying to contact internal API with token: ' . $token);

        $apiURL = url('/') . '/api/getBeers/' . $page;

        $headers = [
            'Authorization' => $token
        ];

        try {
            $responseArray = array_merge(Helper::performCurlGetRequest($apiURL, $headers), ['page' => $page]);
            if ($responseArray['code'] !== 200) {
                switch ($responseArray['code']) {
                    case 401:
                        $errorString = 'Attenzione! Il token non è più valido, fare logout e accedere nuovamente per rigenerarlo';
                        break;
                    case 404:
                        $errorString = 'Attenzione! La risorsa di rete cercata non è stata trovata';
                        break;
                    case 400:
                        $errorString = 'Attenzione! Il formato della richiesta è errato, non è possibile estrarre i dati';
                        break;
                    default:
                        $errorString = 'Attenzione! Malfunzionamento generico, riprovare più tardi';
                }
                return redirect(route('home'))->withErrors([
                    '3' => $errorString
                ]);
            }
            $nextPage = $responseArray['page'] + 1;
            $previousPage = $responseArray['page'] - 1;
            return view('list')
                ->with('data', $responseArray['body'])
                ->with('page', $responseArray['page'])
                ->with('previousPage', $previousPage)
                ->with('nextPage', $nextPage)
                ->with('token', $token)
                ->with('user', Auth::user());
        } catch (\Exception $e) {
            Log::error('#callInternalBeers: ' . $e->getMessage());
            $errorString = 'C\'è stato un problema nella chiamata all\'api interna: ' . $e->getMessage();
            return redirect(route('home'))->withErrors([
                '4' => $errorString
            ]);
        }
    }
}
