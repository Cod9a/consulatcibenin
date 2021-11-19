<div {!! $attributes !!}>
    <div class="mt-1 relative" x-data="countrySelect()">
        <button x-ref="button" type="button" class="py-2 px-4 border border-blueGray-400 focus:border-blue-500 outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition ease-in-out duration-300 w-full h-auto bg-white" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" @click="onButtonClick()" type="button">
            <span class="flex items-center">
                <span class="ml-3 block truncate" x-text="value !== null ? items[value].country : 'Choisir un pays'">
                </span>
            </span>
            <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <!-- Heroicon name: solid/selector -->
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </span>
        </button>
        <ul class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" id="listbox" aria-activedescendant="listbox-option-3" @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox" x-show="open" @focusout="onEscape()" @click.away="open = false" x-description="Select popoever, show/hide based on select state." x-transition.opacity.duration.300ms>
            <template x-for="(country, index) in items" :key="index">
                <li class="cursor-default select-none relative py-2 pl-3 pr-9" id="listbox-option-0" role="option" @click="choose(index)" @mouseenter="selected = index" @mouseleave="selected = null" :class="{'text-white bg-blue-600': selected === index, 'text-gray-900': !(selected === index)}">
                    <div class="flex items-center">
                        <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                        <span :class="{'font-semibold': (value === index), 'font-normal': !(value === index)}" class="font-normal ml-3 block truncate" x-text="country.country">
                        </span>
                    </div>
                    <span :class="{'text-white': selected === index, 'text-blue-600': !(selected === index)}" class="absolute inset-y-0 right-0 flex items-center pr-4" x-show="value === index">
                        <!-- Heroicon name: solid/check -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            </template>
        </ul>
    </div>
</div>
