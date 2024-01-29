@extends('layout.plantilla2')

@section('title', 'AdminPage')

@section('content')

    <body >
        @include('partials.header')
        @auth

        @if (Auth::user()->rol == 1)
        <h1>ONGI ETORRI {{ Auth::user()->name }}</h1>
        <p>Partidak</p>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-10">
            <table class="w-full text-sm text-left rtl:text-right text-green-400">
                <thead class="text-xs uppercase bg-green-700 text-green-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Denbora</th>
                        <th scope="col" class="px-6 py-3">Score</th>
                        <th scope="col" class="px-6 py-3">Izena</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datosPart as $datoPart)
                        <tr class="border-b bg-green-800 border-green-700">
                            <td class="px-6 py-4">
                                <p>{{ $datoPart->id }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p>{{ $datoPart->tiempo }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p>{{ $datoPart->score }}</p>
                            </td>
                            @php
                                $usuario = App\Models\User::find($datoPart->id_usuario);
                            @endphp
                            <td class="px-6 py-4">
                                <p>{{ $usuario->name }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    @else
        <h1>ADMIN IZAN BEHAR ZARA</h1>
            @endif
    @else
        <h1>ADMIN IZAN BEHAR ZARA</h1>
    @endauth
    @include('partials.footer')
</body>

</html>

@endsection
