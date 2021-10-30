<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <script
      defer
      src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ config('app.name') }}</title>
  </head>
  <body class="antialiased min-h-screen flex flex-col bg-blueGray-50">
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
  </body>
</html>
