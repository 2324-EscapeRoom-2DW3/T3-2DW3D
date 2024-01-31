@extends('layout.plantilla')

@section('title', 'Index')

@section('content')

    <body>

        <div class="min-h-screen bg-cover bg-center" style="background-image: url('storage/images/fondo16_9.png');">
            @if (session('alert'))
            <div class="alert alert-danger text-red-600">
                {{ session('alert') }}
            </div>
            @endif
            <div class="flex justify-center  pt-28 pb-16">
                <h1 class="ml-3 text-white text-9xl font-figtree font-bold z-50 type-titulo">
                </h1>
                <h1 class="text-lime-400 font-figtree type-titulo2 font-bold text-9xl"></h1>
            </div>

            <div class="flex justify-center">
                <button class="w-24 h-24 rounded-full bg-white focus:outline-none flex items-center justify-center">
                    @if (Auth::check())
                    <a href="{{ route('juegocompleto.store') }}" class="flex items-center">
                @else
                    <a href="{{ route('login') }}" class="flex items-center">
                @endif
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" class="h-12 w-12 text-lime-400 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" fill="black" stroke-width="2" d="M6 18L18 12 6 6v12z" />
                    </svg>
                </a>

                </button>
            </div>

    </body>
@endsection
