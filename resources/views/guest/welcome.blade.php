<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    @yield('head')
</head>

    <body>
        <div id="app">
            <main class="container d-flex vh-100 align-items-center">
                <div class="m-auto text-center">
                    <h1>
                        Benvenut*! Sei un admin?
                    </h1>
                    <a class="btn btn-primary m-1 w-50" href=" {{ route('admin.dashboard') }} ">Si</a>
                </div>
            </main>
        </div>
    </body>
</html>