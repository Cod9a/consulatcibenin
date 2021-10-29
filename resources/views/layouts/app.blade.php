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
      <nav
        class="
          max-w-7xl
          w-full
          mx-auto
          px-4
          md:px-6
          lg:px-8
          py-6
          flex
          items-center
          justify-between
        ">
        <a href="#" class="text-2xl text-amber-600 font-bold">LOGO</a>

        <ul class="flex space-x-8">
          <li><a href="#" class="text-medium text-amber-600">Accueil</a></li>
          <li>
            <a href="#" class="text-gray-800 hover:text-gray-600 text-medium"
              >Statut de votre demande</a
            >
          </li>
          <li>
            <a href="#" class="text-gray-800 hover:text-gray-600 text-medium"
              >Faire une demande</a
            >
          </li>
          <li>
            <a href="#" class="text-gray-800 hover:text-gray-600 text-medium"
              >Rendez-vous
              <span
                class="
                  uppercase
                  font-semibold
                  text-xs
                  inline-block
                  px-1
                  py-1
                  rounded-lg
                  text-green-700
                  bg-green-200
                "
                >Vip</span
              >
            </a>
          </li>
        </ul>
      </nav>
    </header>
    <main class="py-12 flex-grow">{{ $slot }}</main>
    <footer class="bg-blueGray-800 text-white text-center py-6">
      <div>&copy; Webcoom. Tous droits réservés.</div>
    </footer>
  </body>
</html>
