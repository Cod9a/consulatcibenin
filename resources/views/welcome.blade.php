<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ config('app.name') }}</title>
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
</head>

<body class="antialiased">
    <header class="bg-amber-50 min-h-screen flex flex-col relative" x-data="{}" x-ref="header">
        @include('layouts.navigation')
        <div class="
          flex-grow
          bg-center bg-cover bg-no-repeat
          relative
          before:absolute before:inset-0 before:bg-white before:bg-opacity-80
          flex
          items-center
          justify-center
        " style="
          background-image: url(https://images.unsplash.com/photo-1633114128729-0a8dc13406b9?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80);
        ">
            <div class="
            relative
            flex flex-col
            items-center
            justify-center
            max-w-xl
            px-4
            md:px-6
            lg:px-8
          ">
                <h1 class="
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
                    C'est un dévoir pour chaque béninois(e) de se faire immatriculer auprès de la représentation diplomatique du Bénin dans le pays dans lequel il/elle est établi(e). Faites désormais votre demande de carte consulaire biométrique en toute sécurité en cliquant simplement sur commencer.
                </p>
                <a href="{{ route('demands.index') }}" class="
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
                    <span class="ml-6"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg></span>
                </a>
            </div>
        </div>
        <div class="
          p-4
          absolute
          bottom-0
          mb-8
          left-1/2
          inline-flex
          -translate-x-1/2
        ">
            <button class="p-4 bg-white rounded-full shadow-xl animate-bounce" @click="window.scrollTo({top: $refs.header.clientHeight, behavior: 'smooth'})">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
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
            <div class="
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
                    <img src="{{ asset('images/specimen.png') }}" alt=""  class="w-full h-full object-cover object-center" />
                </div>
                <div class="flex flex-col justify-between items-start">
                    <h1 class="text-3xl font-bold">
                        Découvrez la nouvelle Carte Consulaire
                    </h1>
                    <ul class="space-y-6 mt-4">
                        <li>
                            <h6 class="font-semibold text-blueGray-800">Statut de votre demande</h6>
                            <p>
                                Permet de vérifier l'évolution de la demande en cours.
                                Pour y accéder, saisir le numéro de votre reçu de paiement et cliquez sur "Rechercher"
                            </p>
                        </li>
                        <li>
                            <h6 class="font-semibold text-blueGray-800">Faire une demande</h6>
                            <p>
                                Permet de faire en toute sécurité et de façon rapide la demande d'un document auprès du consulat du Bénin en Côte d'Ivoire.
                                Pour y accéder,
                                Renseigner le formulaire de demande en y mettant les informations correctes;
                                Le Consulat ne sera nullement responsable des erreurs sur votre acte consulaire en cas de transmission du formulaire
                                Procéder au paiement des frais de demande en ligne
                                Conserver la référence de paiement pour le suivi de dossier
                            </p>
                        </li>
                        <li>
                            <h6 class="font-semibold text-blueGray-800">Rendez-vous VIP</h6>
                            <p>
                                Cette option permet d'éviter les longues files d'attentes et donc d'être reçu en un laps de temps très court à un guichet dédié en vue de la prise de vos données biométriques
                                Renseigner la référence de paiement
                                Choisir la date de rendez-vous et valider
                            </p>
                        </li>
                    </ul>
                    <a href="{{ route('demands.index') }}" class="
                px-5
                py-3
                text-white
                bg-blueGray-800
                font-medium
                hover:bg-blueGray-700
                mt-4
              ">
                        Obtenir la <span class="text-amber-300">Carte Consulaire</span>
                    </a>
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-blueGray-800 text-white text-center py-6">
        <div>&copy; Webcoom. Tous droits réservés.</div>
    </footer>
    @if(session('success'))
    <div x-data="{showModal: true}">
        <x-sucess-modal x-show="showModal" x-cloak>
            <x-slot name="title">Votre demande a été créée avec succès</x-slot>
            <x-slot name="description">{!! session('success') !!}</x-slot>
            <x-slot name="actions">
                <button @click="showModal = false" class="
              w-full
              inline-flex
              justify-center
              rounded-md
              border border-transparent
              shadow-sm
              px-4
              py-2
              bg-blue-600
              text-base
              font-medium
              text-white
              hover:bg-blue-700
              focus:outline-none
              focus:ring-2
              focus:ring-offset-2
              focus:ring-blue-500
              sm:ml-3 sm:text-sm
            ">
                    Fermer
                </button>
            </x-slot>
        </x-sucess-modal>
        @endif @if(session('errors'))
        <div x-transition:enter="ease-in duration-300" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="ease-out duration-300" x-transition:leave-start="-translate-y-full" x-transition:leave-end="translate-y-0">
            <div class="bg-gray-900 fixed top-0 inset-x-0">
                <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between flex-wrap">
                        <div class="w-0 flex-1 flex flex-col items-start">
                            <h2 class="font-medium text-green-500 truncate">Erreur</h2>
                            <p class="text-white text-sm truncate">
                                {!! session('errors') !!} >
                            </p>
                        </div>
                        <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                            <button @click.prevent="open = false" type="button" class="
                    -mr-1
                    flex
                    p-2
                    rounded-md
                    hover:bg-red-200
                    focus:outline-none focus:ring-2 focus:ring-white
                    sm:-mr-2
                  ">
                                <span class="sr-only">Dismiss</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</body>

</html>
