@props(['active']) @php $classes = ($active ?? false) ? 'text-amber-600
font-medium' : 'text-gray-800 hover:text-gray-600 font-medium' @endphp
<div>
  <a {{ $attributes->merge(['class' => $classes]) }}> {{ $slot }} </a>
</div>
