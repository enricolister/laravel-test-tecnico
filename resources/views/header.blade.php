<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Tecnico Laravel</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">Laravel Test Tecnico</a>
                <span class="navbar-text">
                  @if(isset($user))
                    Sei loggato come <span class="text-black text-bold">{{ $user->name }}</span>
                    <a class="ms-4" href="/logout">Logout</a>
                  @endif
                </span>
              </div>
            </div>
          </nav>
          <div class="container">
