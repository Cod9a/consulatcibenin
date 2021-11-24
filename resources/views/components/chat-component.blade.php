<div x-data="{
    fullScreen: false,
    opened: false,
    timeout: null,
    loading: false,
    step: 0,
    increaseStep() {
        this.step++;
    },
    animate() {
        @if ($opened)
        setTimeout(() => { this.opened = true }, 1000)
        @endif
        setTimeout(() => { this.increaseStep() }, 2000)
        setTimeout(() => { this.increaseStep() }, 3000)
    }
    }" x-init="animate()">
    <button class="fixed bottom-0 right-0 m-8" x-show="!opened" @click="opened = !opened" x-transition.opacity.duration.200ms x-cloak>
        <div class="w-24 h-24 rounded-full bg-gray-200 bg-cover bg-center border-2 border-white shadow-lg" style="background-image: url(https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80)"></div>
        <span class="absolute bottom-0 left-0">
            <svg class="w-10 h-10 drop-shadow text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
            </svg>
        </span>
    </button>
    <div class="fixed sm:max-w-md w-full h-full bottom-0 right-0 transition-all ease-in-out duration-2000 bg-white shadow-md rounded-md sm:m-6 overflow-hidden" :class="{'sm:h-[32rem]': !fullScreen, 'sm:h-[48rem]': fullScreen}" x-show="opened" a x-transition.opacity.scale.duration.200ms.delay.200ms x-cloak>
        <div class="bg-amber-300 px-4 py-2 flex items-start justify-between">
            <div class="w-14 h-14 rounded-full bg-gray-200 bg-cover bg-center border-2 border-white" style="background-image: url(https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80)"></div>
            <div class="flex items-center space-x-4">
                <button @click="fullScreen = !fullScreen">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                    </svg>
                </button>
                <button @click="opened = false">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="px-4 py-2">
            <div class="flex items-start" x-show="step >= 0" x-transition.opacity.duration.800ms>
                <div class="w-8 h-8 rounded-full bg-gray-200 bg-cover bg-center border-2 border-gray-400" style="background-image: url(https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80)"></div>
                <div class="max-w-xs rounded-md p-2 mx-2 bg-gray-200 text-gray-800">
                    Bonjour. Je suis Alfred,
                    Avec plaisir, je vous aiderai à obtenir rapidement toutes les informations dont vous aurez besoin.
                </div>
            </div>
            <div class="flex items-start mt-4" x-show="step >= 1" x-transition.opacity.duration.800ms>
                <div class="w-8 h-8 rounded-full bg-gray-200 bg-cover bg-center border-2 border-gray-400" style="background-image: url(https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80)"></div>
                <div class="max-w-xs rounded-md p-2 mx-2 bg-gray-200 text-gray-800">
                    En quoi puis-je vous être utile s'il vous plaît ?
                </div>
            </div>
            <div class="flex items-start mt-4" x-show="step >= 2" x-transition.opacity.duration.800ms>
                <div class="w-8 h-8 rounded-full bg-gray-200 bg-cover bg-center border-2 border-gray-400 flex-shrink-0" style="background-image: url(https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80)"></div>
                <div class="flex flex-col items-start mx-2 space-y-1">
                    <a href="{{ route('demands.index') }}">
                        <span class="bg-white text-blue-500 font-medium cursor-pointer border ease-in-out duration-300 border-blue-500 hover:text-white hover:bg-blue-500 px-2 py-1 inline-block text-sm rounded-full font-medium">Faire une demande</span>
                    </a>
                    <a href="{{ route('demands.show') }}">
                        <span class="bg-white text-blue-500 font-medium cursor-pointer transition ease-in-out duration-300 border border-blue-500 hover:text-white hover:bg-blue-500 px-2 py-1 inline-block text-sm rounded-full font-medium">Consulter le statut de votre demande</span>
                    </a>
                    <a href="https://wa.me/{{ $phoneNumber }}">
                        <span class="bg-white text-blue-500 font-medium cursor-pointer transition ease-in-out duration-300 border border-blue-500 hover:text-white hover:bg-blue-500 px-2 py-1 inline-block text-sm rounded-full font-medium">Besoin du conseil d'un expert</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
