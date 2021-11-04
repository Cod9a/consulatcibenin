<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdn.kkiapay.me/k.js" defer></script>
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta
      content="Gestion des documents du Consulat Honoraire du Bénin en Côte d'Ivoire"
      name="description" />
    <meta property="og:image" content="{{ asset('assets/images/p.jpg') }}" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="861" />
    <meta property="og:image:height" content="622" />
    <meta name="propeller" content="d9ad28c7269cb797267dc2acc59ee8e6" />
    <meta name="msapplication-TileColor" content="#eaeaea" />
    <meta name="theme-color" content="#eaeaea" />
    <meta
      name="apple-mobile-web-app-status-bar-style"
      content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
  </head>
  <body class="antialiased">
    <div id="app" class="flex flex-col bg-blueGray-50 min-h-screen">
      <header
        class="bg-amber-50 flex flex-col relative"
        x-data="{}"
        x-ref="header">
        @include('layouts.navigation')
      </header>
      <main class="py-12 flex-grow">{{ $slot }}</main>
      <footer class="bg-blueGray-800 text-white text-center py-6">
        <div>&copy; Webcoom. Tous droits réservés.</div>
      </footer>
    </div>
  </body>
</html>
