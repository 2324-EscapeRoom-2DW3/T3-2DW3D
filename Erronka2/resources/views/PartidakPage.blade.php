@extends('layout.plantilla3')

@section('title', 'AdminPage')

@section('content')

    <body >
        @include('partials.header')
        @auth

        @if (Auth::user()->rol == 1)
        <div class="h-1/2 bg-black w-full bg-full bg-no-repeat bg-center relative overflow-x-auto shadow-md sm:rounded-lg pt-10">
            <a class="text-white" href="{{route('adminpage')}}">MENU</a>
            <table class="w-full text-sm text-left rtl:text-right text-green-400">
                <thead class="text-xs uppercase bg-green-700 text-green-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3 hidden sm:table-cell">Denbora</th>
                        <th scope="col" class="px-6 py-3">Score</th>
                        <th scope="col" class="px-6 py-3">Ezabatu</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($datosPart as $datoPart)
                        <tr class="border-b bg-green-800 border-green-700">
                            <td class="px-6 py-4 text-white">
                                <p>{{ $datoPart->id }}</p>
                            </td>
                            <td class="px-6 py-4 text-white hidden sm:table-cell">
                                <p>{{ $datoPart->tiempo }}</p>
                            </td>
                            <td class="px-6 py-4 text-white">
                                <p>{{ $datoPart->score }}</p>
                            </td>

                            <td>
                                <x-danger-button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-perfilAdminUser-deletion-{{ $datoPart->id }}')">
                                        <p>Ezabatu partida</p>
                                    </x-danger-button>

                                    <x-modal name="confirm-perfilAdminUser-deletion-{{ $datoPart->id }}" :show="$errors->userDeletion->isNotEmpty()"
                                        focusable>
                                        <form method="post" action="{{ route('adminpagePart.destroy', $datoPart->id) }}"
                                            class="p-4 bg-green-800">
                                            @csrf
                                            @method('delete')

                                            <input type="hidden" name="perfilId" value="{{ $datoPart->id }}">

                                            <h2 class="text-xl font-medium text-[#fff]">
                                                Ziur zaude erabiltzailea ezabatu nahi duzula?
                                            </h2>

                                            <p class="mt-1 text-md text-[#0BD904]">
                                                Erabiltzailea ezabatzean, erabiltzailearen informazio guztia ezabatuko da.
                                            </p>

                                            <div class="mt-6 flex justify-end">
                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    Ez
                                                </x-secondary-button>

                                                <x-danger-button class="ms-3">
                                                    Bai
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-modal>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $datosPart->links() }}
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
