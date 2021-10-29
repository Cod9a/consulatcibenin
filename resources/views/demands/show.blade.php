<x-app-layout>
  <section class="max-w-3xl mx-auto px-4 md:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-center text-gray-800">
      Vérifier le statut de vos demandes
    </h1>
    <div class="w-full flex py-12">
      <input
        type=""
        class="
          shadow-sm
          flex-grow
          border border-blueGray-400
          focus:ring focus:ring-blue-500 focus:ring-opacity-50
          transition
          ease-in-out
          duration-300
          py-2
          px-4
          outline-none
          focus:border-blue-500
        " />
      <button
        class="
          pl-3
          pr-6
          py-2
          bg-blueGray-800
          text-white
          ml-4
          hover:bg-blueGray-600
        ">
        Rechercher
      </button>
    </div>
    <div class="w-full bg-white rounded-lg shadow-sm">
      <div class="py-4 px-4 flex items-center border-b border-gray-100">
        <span
          class="
            flex-shrink-0
            p-2
            bg-coolGray-100
            text-coolGray-700
            rounded-full
          ">
          <svg
            class="w-6 h-6"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
          </svg>
        </span>
        <h3 class="text-center flex-grow text-xl font-semibold">
          Demandes de Copies d'extrait de naissance
        </h3>
      </div>
      <div
        class="
          py-4
          px-4
          flex
          items-baseline
          justify-between
          border-b border-gray-100
        ">
        <span class="font-medium text-sm text-gray-600"
          >Date de la demande</span
        >
        <span>10/12/2021</span>
      </div>
      <div
        class="
          py-4
          px-4
          flex
          items-baseline
          justify-between
          border-b border-gray-100
        ">
        <span class="font-medium text-sm text-gray-600">Nom complet</span>
        <span>John Doe</span>
      </div>
      <div
        class="
          py-4
          px-4
          flex
          items-baseline
          justify-between
          border-b border-gray-100
        ">
        <span class="font-medium text-sm text-gray-600">Statut</span>
        <span
          class="
            text-amber-500 text-xs
            uppercase
            font-semibold
            bg-amber-100
            px-2
            py-1
            inline-flex
            items-center
            justify-center
            rounded-full
          "
          >En attente</span
        >
      </div>
      <div class="py-4 px-4">
        <span class="font-medium text-sm text-gray-600"
          >Documents mis en ligne</span
        >
        <div class="grid grid-cols-4 gap-5 mt-4">
          <div
            class="
              flex flex-col
              items-center
              border border-gray-200
              space-y-4
              px-2
              py-4
              rounded-md
            ">
            <span>
              <svg
                class="w-14 h-14"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  fill-rule="evenodd"
                  d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                  clip-rule="evenodd"></path>
              </svg>
            </span>
            <span class="text-sm text-gray-700">Photo d'identité</span>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
