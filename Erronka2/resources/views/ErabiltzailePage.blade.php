@extends('layout.plantilla3')

@section('title', 'AdminPage')

@section('content')

<body>
    @include('partials.header')

        <div class="h-1/2 bg-black w-full bg-full bg-no-repeat bg-center relative overflow-x-auto shadow-md sm:rounded-lg pt-10">
            <a class="text-white" href="{{route('adminpage')}}">MENU</a>

            <table class="w-full text-sm text-left rtl:text-right text-green-400">
                <thead class="text-xs uppercase bg-green-700 text-green-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Izena</th>
                        <th scope="col" class="px-6 py-3 hidden sm:table-cell">Email</th>
                        <th scope="col" class="px-6 py-3">Ezabatu</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datosErab as $datoErab)
                        @if ($datoErab->rol == 0)
                            <tr class=" bg-green-800 border-green-700">
                                <td class="px-6 py-4 text-white">
                                    <p>{{ $datoErab->id }}</p>
                                </td>
                                <td class="px-6 py-4 text-white">
                                    <p>{{ $datoErab->name }}</p>
                                </td>
                                <td class="px-6 py-4 text-white hidden sm:table-cell">
                                    <p>{{ $datoErab->email }}</p>
                                </td>
                                <td>
                                    <x-danger-button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-perfilAdminUser-deletion-{{ $datoErab->id }}')">
                                        <p>Ezabatu kontua</p>
                                    </x-danger-button>

                                    <x-modal name="confirm-perfilAdminUser-deletion-{{ $datoErab->id }}" :show="$errors->userDeletion->isNotEmpty()"
                                        focusable>
                                        <form method="post" action="{{ route('adminpageErab.destroy', $datoErab->id) }}"
                                            class="p-4 bg-green-800">
                                            @csrf
                                            @method('delete')

                                            <input type="hidden" name="perfilId" value="{{ $datoErab->id }}">

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
                                <td>

                                    <x-danger-button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-perfilAdminUser-updaterol-{{ $datoErab->id }}')">
                                        <p>Admin Egin</p>
                                    </x-danger-button>

                                    <x-modal name="confirm-perfilAdminUser-updaterol-{{ $datoErab->id }}" :show="$errors->userDeletion->isNotEmpty()"
                                        focusable>
                                        <form method="post" action="{{ route('adminpageErab.updateRole', $datoErab->id) }}"
                                            class="p-4 bg-green-800">
                                            @csrf
                                            @method('patch')

                                            <input type="hidden" name="perfilId" value="{{ $datoErab->id }}">

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

                                    {{-- <form method="post" action="{{ route('adminpageErab.updateRole', $datoErab->id) }}">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="perfilId" value="{{ $datoErab->id }}">
                                        <button type="submit" class="text-blue-500 hover:text-blue-700 focus:outline-none">
                                            Aldatu rola (Admin)
                                        </button>
                                    </form> --}}
                                </td>
                                </td>

                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            {{ $datosErab->links() }}
        </div>



        @include('partials.footer')
    </body>

    </html>
@endsection
