@php
$classes = (!$error ?? false)
?
'py-2 pl-24 pr-4 border border-blueGray-400 focus:border-blue-500 outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition ease-in-out duration-300 w-full h-auto'
:
'py-2 pl-24 pr-4 border border-red-400 focus:border-red-500 outline-none focus:ring focus:ring-red-500 focus:ring-opacity-50 transition ease-in-out duration-300 w-full h-auto';
@endphp
<div {!! $attributes !!}>
    <div class="mt-2 relative shadow-sm" x-data="{@if($default == null) select: { code: ''} @else select: {code: '{{ $default }}'} @endif , text: ''}" x-effect="$dispatch('input', '+'+select.code + ' ' + text)">
        <div class="absolute inset-y-0 left-0 flex items-center" @if($default==null) x-data="customSelect()" x-model="select" @endif>
            <div class="relative w-30">
                @if($default == null)
                <button x-ref="button" class="w-full h-auto bg-transparent border-transparent shadow-none pr-10 py-2 text-left cursor-default focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm" @click="onButtonClick()" type="button" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="assigned-to-label">
                    <span class="flex items-center">
                        <span class="ml-3 block truncate" x-text="value !== null ? '+' + items[value].code : 'Pays'"></span>
                    </span>
                    <span class="ml-1 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                @else
                <button x-ref="button" class="w-full h-auto bg-transparent border-transparent shadow-none pr-10 py-2 text-left cursor-default focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 sm:text-sm" type="button">
                    <span class="flex items-center">
                        <span class="ml-3 block truncate">+ {{ $default }}</span>
                    </span>
                </button>
                @endif
            </div>
            @if($default == null)
            <ul class="absolute z-10 mt-1 w-60
                 bg-white top-[48px] shadow-lg
                 max-h-56 rounded-md py-1 text-base
                 ring-1 ring-black ring-opacity-5
                 overflow-auto focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3" @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox" tabindex="-1" role="listbox" aria-labelledby="assigned-to-label" :aria-activedescendant="activeDescendant" x-show="open" @focusout="onEscape()" @click.away="open = false" x-description="Select popover, show/hide based on select state."> <template x-for="(country, index) in items">
                    <li class="text-gray-900 cursor-pointer select-none relative py-2 pl-1 pr-10 mr-3" @click="choose(index)" @mouseenter="selected = index" @mouseleave="selected = null" :class="{ 'text-white bg-blue-600': selected === index, 'text-gray-900': !(selected === index) }" class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                        <div class="grid grid-cols-2" :class="{ 'font-semibold': value === index, 'font-normal': !(value === index) }">
                            <span class="ml-3 block truncate" x-text="country.country"></span>
                            <span class="ml-3 block text-right" x-text="country.code"></span>
                        </div>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4" x-show="value === index" :class="{ 'text-white': selected === index, 'text-blue-600': !(selected === index) }">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </li>
                </template>
            </ul>
            @endif
        </div>
        <input type="text" class="{!! $classes !!}" x-model="text">
    </div>
</div>
