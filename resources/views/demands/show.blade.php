<x-app-layout>
  <section
    class="max-w-3xl mx-auto px-4 md:px-6 lg:px-8"
    x-data="{
        demand: {},
        reference: '',
        status: null,
        async onSubmit() {
            const url = new URLSearchParams({'reference': this.reference});
            let response = await fetch(`/api/demands?${url.toString()}`, {
                headers: {
                    'Content-Type': 'application/json;charset=utf-8',
                    'Accept': 'application/json;charset=utf-8',
                }
            });
            if (response.ok) {
                this.demand = await response.json();
                this.status = true;
            } else {
                this.demand = {};
                this.status = false;
            }
        }
      }">
    <h1 class="text-3xl font-bold text-center text-gray-800">
      Vérifier le statut de vos demandes
    </h1>
    <form
      @submit.prevent="onSubmit()"
      class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 py-12 gap-5">
      <input
        type="search"
        x-model="reference"
        placeholder="Référence de paiement reçue par E-mail"
        class="
          lg:col-span-3
          md:col-span-2
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
        "
        required />
      <button
        type="submit"
        class="
          pl-3
          pr-6
          py-2
          bg-blueGray-800
          text-white text-left
          hover:bg-blueGray-600
        ">
        Rechercher
      </button>
    </form>
    <div
      x-show="status === false"
      x-cloak
      class="
        w-full
        bg-white
        rounded-lg
        shadow-sm
        px-8
        py-12
        flex flex-col
        items-center
        justify-center
      ">
      <div class="bg-blueGray-50 rounded-full">
        <img src="{{ asset('images/empty.svg') }}" alt="" class="h-64" />
      </div>
      <span class="mt-4 text-gray-600">Aucune demande correspondante</span>
    </div>
    <div
      class="w-full bg-white rounded-lg shadow-sm"
      x-show="status === true"
      x-cloak>
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
        <h3
          class="text-center flex-grow text-xl font-semibold"
          x-text="`Demand pour le document '${demand?.document?.title}'`"></h3>
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
        <span x-text="demand?.full_date"></span>
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
        <span
          x-text="
            `${demand?.document_form?.last_name}
            ${demand?.document_form?.first_name}`
          "></span>
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
          x-text="demand.status"></span>
      </div>
      <div class="py-4 px-4">
        <span class="font-medium text-sm text-gray-600"
          >Documents mis en ligne</span
        >
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-4">
          <template x-for="enclosed in demand?.encloseds">
            <a
              :href="enclosed.url"
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
              <span
                class="text-sm text-gray-700 text-center"
                x-text="enclosed.label"></span>
            </a>
          </template>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
