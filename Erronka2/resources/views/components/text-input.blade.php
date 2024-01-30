@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-white-700 bg-gray-900 text-gray-300 focus:border-white-500 focus:border-white-600 focus:ring-indigo-500 dark:focus:ring-green-600 rounded-md shadow-sm']) !!}>
