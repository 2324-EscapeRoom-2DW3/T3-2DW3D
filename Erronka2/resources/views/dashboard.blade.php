<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php
                    $imageUrl = url('storage/images' . Auth::user()->imagen); @endphp
                    <div class="flex flex-col items-center justify-center">
                        <h1 class="text-black font-figtree font-bold text-5xl text-center">
                            {{ Auth::user()->name}}
                        </h1>
                        <img src="{{ $imageUrl }}" alt="User Photo" class="mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
