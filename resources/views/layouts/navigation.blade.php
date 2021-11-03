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
  "
  x-data="{open: false}">
  <a href="/" class="text-2xl text-amber-600 font-bold">LOGO</a>

  <button
    class="
      p-2
      focus:bg-amber-100
      rounded-md
      outline-none
      md:hidden
      inline-block
    "
    @click="open = !open">
    <svg
      class="w-6 h-6"
      fill="currentColor"
      viewBox="0 0 20 20"
      xmlns="http://www.w3.org/2000/svg">
      <path
        fill-rule="evenodd"
        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
        clip-rule="evenodd"></path>
    </svg>
  </button>

  <div
    class="fixed inset-0 z-10 p-4 md:hidden flex justify-end items-start"
    x-show="open"
    x-cloak>
    <button
      class="
        p-2
        focus:bg-blueGray-100
        rounded-md
        outline-none
        absolute
        right-0
        top-0
        m-6
        text-gray-600
        inline-block
      ">
      <svg
        class="w-6 h-6"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path
          fill-rule="evenodd"
          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul
      @click.away="open = false"
      class="bg-white px-4 py-4 space-y-4 rounded-md shadow-lg max-w-md w-full">
      <x-nav-link
        :href="route('welcome')"
        :active="request()->routeIs('welcome')"
        >Accueil</x-nav-link
      >
      <x-nav-link
        :href="route('demands.show')"
        :active="request()->routeIs('demands.show')"
        >Statut de votre demande</x-nav-link
      >
      <x-nav-link
        :href="route('demands.index')"
        :active="request()->routeIs('demands.index')"
        >Faire une demande</x-nav-link
      >
      <x-nav-link
        :href="route('meetings.create')"
        :active="request()->route('meetings.create')"
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
      </x-nav-link>
    </ul>
  </div>

  <ul class="md:flex space-x-8 hidden">
    <li>
      <x-nav-link href="/" :active="request()->routeIs('welcome')"
        >Accueil</x-nav-link
      >
    </li>
    <li>
      <x-nav-link
        :href="route('demands.show')"
        :active="request()->routeIs('demands.show')"
        >Statut de votre demande</x-nav-link
      >
    </li>
    <li>
      <x-nav-link
        :href="route('demands.index')"
        :active="request()->routeIs('demands.index')"
        >Faire une demande</x-nav-link
      >
    </li>
    <li>
      <x-nav-link
        :href="route('meetings.create')"
        :active="request()->routeIs('meetings.create')"
        class="text-gray-800 hover:text-gray-600 text-medium"
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
      </x-nav-link>
    </li>
  </ul>
</nav>
