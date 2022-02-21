<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // If user is not authenticated, attempt authentication
        if (!Auth::check()) {

            if ($request->username && $request->password) {
                $credentials = $request->validate([
                    'username' => ['required'],
                    'password' => ['required'],
                ]);

                if (Auth::attempt($credentials, true)) {
                    $request->session()->regenerate();
                }
                else {
                    return redirect(route('login'))->withErrors([
                        '1' => 'Attenzione: l\'account non esiste o la password era errata.',
                    ]);
                }
            } else {
                if ($request->method() === 'POST') {
                    return redirect(route('login'))->withErrors([
                        '2' => 'Attenzione: compila tutti i campi.',
                    ]);
                } else {
                    return redirect(route('login'));
                }
            }
        }
        // The user is authenticated, proceed
        return $next($request);
    }
}
