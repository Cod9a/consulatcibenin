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
  <body class="antialiased">
    <header
      class="bg-amber-50 min-h-screen flex flex-col relative"
      x-data="{}"
      x-ref="header">
      @include('layouts.navigation')
      <div
        class="
          flex-grow
          bg-center bg-cover bg-no-repeat
          relative
          before:absolute before:inset-0 before:bg-white before:bg-opacity-80
          flex
          items-center
          justify-center
        "
        style="
          background-image: url(https://images.unsplash.com/photo-1633114128729-0a8dc13406b9?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80);
        ">
        <div
          class="
            relative
            flex flex-col
            items-center
            justify-center
            max-w-xl
            px-4
            md:px-6
            lg:px-8
          ">
          <h1
            class="
              text-4xl text-center
              flex flex-col
              leading-normal
              font-bold
              text-gray-800
            ">
            <span>Vos demandes de documents</span>
            <span>Simples et Rapides</span>
          </h1>
          <p class="text-gray-700 text-center mt-6">
            Et has minim elir intellegat. Mea aeterno eleifend antiopam ad, nam
            no suspicit quarendum. At nam minimum ponderum. Est audiam animal
            molestiae te. Ex duo eripuit mentitum.
          </p>
          <button
            class="
              inline-flex
              items-center
              mt-6
              text-white
              bg-amber-500
              px-4
              py-3
              font-medium
              hover:bg-amber-400
            ">
            <span>Commencer</span>
            <span class="ml-6"
              ><svg
                class="w-6 h-6"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  fill-rule="evenodd"
                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                  clip-rule="evenodd"></path></svg
            ></span>
          </button>
        </div>
      </div>
      <div
        class="
          p-4
          absolute
          bottom-0
          mb-8
          left-1/2
          inline-flex
          -translate-x-1/2
        ">
        <button
          class="p-4 bg-white rounded-full shadow-xl animate-bounce"
          @click="window.scrollTo({top: $refs.header.clientHeight, behavior: 'smooth'})">
          <svg
            class="w-6 h-6"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
    </header>
    <main>
      <section class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-24">
        <h1 class="text-3xl font-bold text-center text-gray-800">
          Choisissez l'acte consulaire à établir
        </h1>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
          @foreach($documents as $document)
          <x-document-card :document="$document"></x-document-card>
          @endforeach
        </div>
      </section>
      <section class="bg-amber-50">
        <div
          class="
            max-w-7xl
            mx-auto
            px-4
            md:px-6
            lg:px-8
            py-24
            grid grid-cols-1
            sm:grid-cols-2
            gap-8
          ">
          <div class="">
            <img src="{{ asset('images/image.png') }}" alt="" />
          </div>
          <div class="flex flex-col justify-between items-start">
            <h1 class="text-3xl font-bold">
              Découvrez la nouvelle Carte Consulaire
            </h1>
            <ul class="space-y-6 mt-4">
              <li>
                Assum suavitate ea vel, vero erat doming cu cum. Zril ornatus
                sea cu. Pro ex integre pertinax. Cu cum harum paulo legendos,
                mei et quod enim mnesarchum, habeo affert laoreet sea ei.
              </li>
              <li>
                Assum suavitate ea vel, vero erat doming cu cum. Zril ornatus
                sea cu. Pro ex integre pertinax. Cu cum harum paulo legendos,
                mei et quod enim mnesarchum, habeo affert laoreet sea ei.
              </li>
              <li>
                Assum suavitate ea vel, vero erat doming cu cum. Zril ornatus
                sea cu. Pro ex integre pertinax. Cu cum harum paulo legendos,
                mei et quod enim mnesarchum, habeo affert laoreet sea ei.
              </li>
            </ul>
            <button
              class="
                px-5
                py-3
                text-white
                bg-blueGray-800
                font-medium
                hover:bg-blueGray-700
                mt-4
              ">
              Obtenir la <span class="text-amber-300">Carte Consulaire</span>
            </button>
          </div>
        </div>
      </section>
    </main>
    <footer class="bg-blueGray-800 text-white text-center py-6">
      <div>&copy; Webcoom. Tous droits réservés.</div>
    </footer>
  </body>
</html>
