@props(['disabled' => false, 'error' => false]) @php $classes = (!$error ??
false) ? "mt-2 py-2 px-4 border border-blueGray-400 focus:border-blue-500
outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition
ease-in-out duration-300 " : "mt-2 py-2 px-4 border border-red-400
focus:border-red-500 outline-none focus:ring focus:ring-red-500
focus:ring-opacity-50 transition ease-in-out duration-300 " @endphp <input {{
$disabled ? 'disabled' : ''}} {!! $attributes->merge(['class' => $classes ]) !!}
/>
