@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-white-700 bg-green-900 text-gray-300 focus:border-indigo-500 focus:border-green-600 focus:ring-indigo-500 dark:focus:ring-green-600 rounded-md shadow-sm']) !!}>
