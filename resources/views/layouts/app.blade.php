<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdn.kkiapay.me/k.js" defer></script>
    <title>{{ config('app.name') }}</title>
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
