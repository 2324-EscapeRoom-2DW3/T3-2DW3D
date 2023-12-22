@props(['value'])

<label {{ $attributes->merge(['class' => ' italic font-inter text-xl opacity-90 block font-medium text-sm dark:text-green-300']) }}>
    <span class="font-bold font-inter text-green-600 shining-light">{{ $value ?? $slot }}</span>
</label>
