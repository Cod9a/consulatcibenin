<x-app-layout>
  <section class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8" x-data="meetingCreate(`{{ route('meetings.index') }}`,`{{ route('meetings.store') }}`, `{{ route('meeting.payment.callback') }}`)">
  <div
    class="
      max-w-7xl
      mx-auto
      px-4
      md:px-6
      lg:px-8
      grid grid-cols-1
      xl:grid-cols-2
      gap-5
    "
  >
    <div>
      <div class="relative mt-4">
        <button
          @click="step = 0"
          class="
            flex
            space-x-4
            sm:before:content-['']
            sm:before:absolute
            sm:before:h-full
            sm:before:w-px
            sm:before:bg-gray-400
            sm:before:top-0
            sm:before:left-3
          "
        >
          <span
            class="
              flex-shrink-0
              inline-flex
              items-center
              justify-center
              rounded-full
              font-medium
              w-6
              h-6
              relative
              bg-blue-500
              text-white
            "
            >1</span
          >
          <h3>Numero de la quittance de paiement</h3>
        </button>
            <div>
                <div
                  class="
                    flex flex-col
                    sm:flex-row
                    space-y-2
                    sm:space-y-0
                    items-stretch
                    sm:items-start
                    justify-start
                    mt-8
                    sm:ml-10
                  "
                  x-transition.delay.300ms:enter="ease-in duration-300"
                  x-transition.delay.300ms:enter-start="opacity-0 -translate-y-4"
                  x-transition.delay.300ms:enter-end="opacity-100 translate-y-0"
                  x-transition:leave="ease-out duration-300"
                  x-transition:leave-start="opacity-100 translate-y-0"
                  x-transition:leave-end="opacity-0 -translate-y-4"
                  x-cloak
                    >
                      <input
                        x-model="transactionId"
                        type="text"
                        class="
                          leading-normal
                          py-1
                          rounded-md
                          border-gray-300
                          focus:ring
                          focus:ring-blue-500
                          focus:ring-opacity-50
                          focus:border-blue-500
                          transition
                          ease-in-out
                          duration-300
                          max-w-xs
                          w-full
                          border
                          border-gray-300
                          focus:outline-none
                          px-2
                        "
                        required
                      />
                </div>
                <span class="text-red-600 sm:ml-10 mt-2 text-sm" x-text="errors.payment_token"></span>
            </div>
      </div>
      <div class="relative mt-4">
        <button
          @click="step = 1"
          class="
            flex
            space-x-4
            sm:before:content-['']
            sm:before:absolute
            sm:before:h-full
            sm:before:w-px
            sm:before:bg-gray-400
            sm:before:top-0
            sm:before:left-3
          "
        >
          <span
            class="
              flex-shrink-0
              inline-flex
              items-center
              justify-center
              rounded-full
              font-medium
              w-6
              h-6
              relative
              bg-blue-500
              text-white
            "
            >2</span
          >
          <h3>Choisir la date du rendez-vous</h3>
        </button>
    <div class="flex flex-col">
        <div
          class="mt-8 sm:ml-10"
          @selected="setSelectedDate($event.detail)"
          x-transition.delay.300ms:enter="ease-in duration-300"
          x-transition.delay.300ms:enter-start="opacity-0 -translate-y-4"
          x-transition.delay.300ms:enter-end="opacity-100 translate-y-0"
          x-transition:leave="ease-out duration-300"
          x-transition:leave-start="opacity-100 translate-y-0"
          x-transition:leave-end="opacity-0 -translate-y-4"
          x-cloak
        >
          <div
            class="
              flex
              sm:flex-row
              flex-col-reverse
              items-start
              justify-start
              space-y-reverse space-y-4
            "
          >
            <div class="bg-white p-3 rounded shadow-sm" x-data="calendar()">
              <div class="flex items-center justify-between">
                <div
                  class="font-medium"
                  x-text="`${months[activeMonth - 1]} ${activeYear}`"
                >
                  2021
                </div>
                <div class="flex items-center justify-center">
                  <button @click="prevMonth()">
                    <svg
                      class="w-5 h-5"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 19l-7-7 7-7"
                      ></path>
                    </svg>
                  </button>
                  <button @click="nextMonth()">
                    <svg
                      class="w-5 h-5"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7"
                      ></path>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="grid grid-cols-7 gap-5 mt-2">
                <template x-for="day in days">
                  <div
                    class="
                      text-sm
                      tracking-wide
                      uppercase
                      font-medium
                      text-gray-600
                    "
                    x-text="day"
                  ></div>
                </template>
                <template x-for="i in calendarDays[0].getDay() - 1">
                  <span></span>
                </template>
                <template x-for="date in calendarDays">
                  <span
                    @click="select(date)"
                    x-text="date.getDate()"
                    :class="isSelected(date) ? 'bg-blue-500 text-white': ''"
                    class="cursor-pointer text-center rounded-full"
                  ></span>
                </template>
              </div>
            </div>
          </div>
          <span class="text-red-600 text-sm mt-2" x-text="errors.meeting_date"></span>
          </div>
          <div class="sm:ml-10">
          <button
            @click="sendInformations()"
            class="
              px-3
              py-2
              rounded-md
              uppercase
              inline-flex
              text-sm
              font-medium
              tracking-wide
              text-blue-50
              bg-blue-500
              mt-5
              hover:bg-blue-400
              focus:ring
              focus:ring-blue-500
              focus:ring-opacity-50
              focus:outline-none
              transition
              ease-in-out
              duration-300
            "
          >
            Confirmer le rendez-vous
          </button>
          </div>
        </div>
      </div>
    </div>

  <x-sucess-modal x-show="successModal">
    <x-slot name="title"> Rendez-vous cree avec succes </x-slot>
    <x-slot name="description">
        <div class="flex flex-col items-center">
            <div class="bg-gray-50 rounded-full">
                <img :src="`data:image/png;base64, ${qrCode}`" alt="" class="my-4 mx-auto">
            </div>
            <p>
            Nous vous conseillons de prendre en photo le Qr Code ci-dessus. Il s'agit d'une attestation de votre rendez-vous.
            </p>
        </div>
    </x-slot>
    <x-slot name="actions">
      <a
        href="/"
        class="
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
        "
      >
      Revenir à la page d'accueil
      </a>
    </x-slot>
  </x-sucess-modal>
  </section>
</x-app-layout>
