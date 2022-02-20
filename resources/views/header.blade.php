<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Tecnico Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            @import 'css/app.css';
        </style>
        <script src="js/app.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
              <span class="navbar-brand" href="#">Laravel Test Tecnico</span>
                <span class="navbar-text">
                  @if(isset($user))
                    Sei loggato come <span class="text-black text-bold">{{ $user->name }}</span>
                    <a class="ms-4" href="logout">Logout</a>
                  @endif
                </span>
              </div>
            </div>
          </nav>
          <div class="container">
