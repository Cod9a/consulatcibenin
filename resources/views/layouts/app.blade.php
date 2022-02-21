<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="Gestion des documents du Consulat Honoraire du Bénin en Côte d'Ivoire" name="description" />
    <meta property="og:image" content="{{ asset('assets/images/p.jpg') }}" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="861" />
    <meta property="og:image:height" content="622" />
    <meta name="propeller" content="d9ad28c7269cb797267dc2acc59ee8e6" />
    <meta name="msapplication-TileColor" content="#eaeaea" />
    <meta name="theme-color" content="#eaeaea" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />

    <title>{{ config('app.name') }}</title>

    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="https://cdn.kkiapay.me/k.js" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />

    @if(Route::currentRouteName() == 'documents.demands.create')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link href="{{ asset('datepicker/datepicker.css') }}" rel="stylesheet">
        <script src="{{ asset('datepicker/datepicker.js') }}"></script>
    @endif
</head>

<body class="antialiased">
    <div id="app" class="flex flex-col bg-blueGray-50 min-h-screen">
        <header class="bg-amber-50 flex flex-col relative" x-data="{}" x-ref="header">
            @include('layouts.navigation')
        </header>
        <main class="py-12 flex-grow">{{ $slot }}</main>
        <footer class="bg-blueGray-800 text-white text-center py-6">
            <div>&copy; Webcoom. Tous droits réservés.</div>
        </footer>
        <x-chat-component phoneNumber="22996160650" />
    </div>

    @if(Route::currentRouteName() == 'documents.demands.create')
        <script type="text/javascript">
            
        </script>
    @endif
</body>
</html>
