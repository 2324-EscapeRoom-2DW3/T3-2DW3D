@extends('layout.plantilla2')

@section('title', 'AdminPage')

@section('content')

    <body >

        @include('partials.header')

        {{-- @auth --}}
            {{-- @if (Auth::user()->rol == 1) --}}
                <div class="bg-black text-white text-center min-h-screen bg-cover bg-center" style="background-image: url('storage/images/fondo16_9.png');">
                    {{-- <h1>ONGI ETORRI {{ Auth::user()->name }}</h1> --}}

                    <div class="min-h-screen flex items-center justify-center">
                        <div class="bg-green-800 w-full p-10 ">
                            <a href="{{route('adminpageErab')}}">Erabiltzaileak</a>
                            {{-- <button onclick="{{route('adminpageErab')}}" id="boton1" class="bg-green-500">Erabiltzaileak</button> --}}
                        </div>
                        <div class="bg-green-800 w-full p-10">
                            <a href="{{route('adminpagePart')}}">Partidak</a>

                            {{-- <button id="boton2" class="bg-green-500">Partidak</button> --}}
                        </div>
                        <div class="bg-green-800 w-full p-10">
                            <a href="{{route('adminpageAdmin')}}">Administrazioa</a>
                        </div>
                    </div>

                    {{--

                    @foreach ($datosErab as $datoErab)
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
                                            <td class="px-6 py-4">
                                                <p>{{ $datoErab->id }}</p>
                                            </td>
                                            <td class="px-6 py-4">
                                                <p>{{ $datoErab->name }}</p>
                                            </td>
                                            <td class="px-6 py-4">
                                                <p>{{ $datoErab->email }}</p>
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        @endif
                    @endforeach

                    --}}

                </div>

        {{-- @else
            <h1>ADMIN IZAN BEHAR ZARA</h1>
                 @endif
        @else
            <h1>ADMIN IZAN BEHAR ZARA</h1> --}}
        {{-- @endauth --}}
        @include('partials.footer')
    </body>

    </html>

@endsection
