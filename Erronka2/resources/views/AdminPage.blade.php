@extends('layout.plantilla2')

@section('title', 'AdminPage')

@section('content')



<body>

    @include('partials.header')

<div class="bg-black text-white text-center">
    <h1>ONGI ETORRI {{ Auth::user()->name }}</h1>

    <div class="flex">
        <div class="bg-green-800 w-full p-10 ">
            <a href="">Erabiltzaileak</a>
        </div>
        <div class="bg-green-800 w-full p-10">
            <a href="">Partidak</a>
        </div>
        <div class="bg-green-800 w-full p-10">
            <a href="">Administrazioa</a>
        </div>
        {{-- @dd($datos) --}}


    </div>

    @foreach($datosErab as $datoErab)
    @if ($datoErab->rol == 0)
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-10">
        <table class="w-full text-sm text-left rtl:text-righttext-green-400">
            <thead class="text-xs  uppercase bg-green-700 text-green-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">Izena</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                </tr>
                <tr class=" border-b bg-green-800 border-green-700">
                    <td class="px-6 py-4"><p>{{ $datoErab->id}}</p> </td>
                    <td class="px-6 py-4"><p>{{ $datoErab->name}}</p> </td>
                    <td class="px-6 py-4"><p>{{ $datoErab->email}}</p> </td>
                </tr>
            </table>
        </div>
    @endif
    @endforeach

    @foreach($datosErab as $datoErab)
    @if ($datoErab->rol == 1)
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-10">
        <table class="w-full text-sm text-left rtl:text-righttext-green-400">
            <thead class="text-xs  uppercase bg-green-700 text-green-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">Izena</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                </tr>
                <tr class=" border-b bg-green-800 border-green-700">
                    <td class="px-6 py-4"><p>{{ $datoErab->id}}</p> </td>
                    <td class="px-6 py-4"><p>{{ $datoErab->name}}</p> </td>
                    <td class="px-6 py-4"><p>{{ $datoErab->email}}</p> </td>
                </tr>
            </table>
        </div>
    @endif
    @endforeach


    @foreach($datosPart as $datoPart)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-10">
            <table class="w-full text-sm text-left rtl:text-righttext-green-400">
                <thead class="text-xs  uppercase bg-green-700 text-green-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Denbora</th>
                        <th scope="col" class="px-6 py-3">Score</th>
                        <th scope="col" class="px-6 py-3">Izena</th>

                    </tr>
                    <tr class=" border-b bg-green-800 border-green-700">
                        <td class="px-6 py-4" ><p>{{ $datoPart->id}}</p> </td>
                        <td class="px-6 py-4"><p>{{ $datoPart->tiempo}}</p> </td>
                        <td class="px-6 py-4"><p>{{ $datoPart->score}}</p> </td>
                        @php
                            $usuario = App\Models\User::find($datoPart->id_usuario);
                        @endphp
                        <td class="px-6 py-4"><p>{{ $usuario->name}}</p> </td>

                    </tr>
                </table>
        </div>
    @endforeach



@include('partials.footer')
</body>

@endsection
