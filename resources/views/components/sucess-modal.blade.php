@props([ 'title', 'description', 'actions' ])
<div
  class="fixed z-10 inset-0 overflow-y-auto"
  aria-labelledby="modal-title"
  role="dialog"
  aria-modal="true"
  x-cloak
  {{
  $attributes
  }}>
  <div
    class="
      flex
      items-center
      justify-center
      min-h-screen
      pt-4
      px-4
      pb-20
      text-center
      sm:block sm:p-0
    ">
    <div
      class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="ease-in duration-200"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      aria-hidden="true"></div>

    <span
      class="hidden sm:inline-block sm:align-middle sm:h-screen"
      aria-hidden="true"
      >&#8203;</span
    >

    <div
      class="
        inline-block
        bg-white
        align-middle
        rounded-lg
        text-left
        overflow-hidden
        shadow-xl
        transform
        transition-all
        sm:my-8 sm:align-middle sm:max-w-lg
        w-full
      "
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
      x-transition:leave="ease-in duration-200"
      x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
      x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      x-cloak
      {{
      $attributes
      }}>
      <div class="bg-white px-4 pt-5 pb-4 sm:p-8 sm:pb-4">
        <div>
          <div class="mt-3 sm:mt-0 text-center">
            <div class="flex items-center justify-center mb-6 relative">
              <span
                class="
                  text-green-500
                  inline-block
                  p-3
                  bg-white
                  border border-green-500
                  rounded-full
                  relative
                  ring ring-green-500 ring-opacity-50
                ">
                <svg
                  class="w-8 h-8"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"></path>
                </svg>
              </span>
            </div>
            <h3
              class="text-lg leading-6 font-medium text-gray-900"
              id="modal-title">
              {{ $title }}
            </h3>
            <div class="mt-4">
              <p class="text-gray-600 text-sm">{{ $description }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="px-4 py-3 sm:px-6 mb-2">{{ $actions }}</div>
    </div>
  </div>
</div>
