@extends('layout.plantilla2')

@section('title', 'AdminPage')

@section('content')

    <body>
        @include('partials.header')

        <p>Erabiltzaileak</p>

        <div class="overflow-x-auto shadow-md sm:rounded-lg pt-10 bg-black">
            <div class="table-responsive">
                <table class="w-full text-sm text-left rtl:text-right text-green-400 whitespace-nowrap">
                    <thead class="text-xs uppercase bg-green-700 text-green-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Izena</th>
                            <th scope="col" class="px-6 py-3 sm:table-cell">Email</th>
                            <th scope="col" class="px-6 py-3">Ezabatu</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datosAdmin as $datoAdmin)
                            @if ($datoAdmin->rol == 1)
                            <tr class="border-b bg-green-800 border-green-700">
                                <td class="px-6 py-4 sm:table-cell">
                                    <p>{{ $datoAdmin->id }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p>{{ $datoAdmin->name }}</p>
                                </td>
                                <td class="px-6 py-4 hidden sm:table-cell">
                                    <p>{{ $datoAdmin->email }}</p>
                                </td>
                                <td>
                                    <x-danger-button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-perfilAdminUser-deletion-{{ $datoAdmin->id }}')">
                                        <p>Ezabatu kontua</p>
                                    </x-danger-button>

                                    <x-modal name="confirm-perfilAdminUser-deletion-{{ $datoAdmin->id }}" :show="$errors->userDeletion->isNotEmpty()"
                                        focusable>
                                        <form method="post" action="{{ route('adminpageAdmin.destroy', $datoAdmin->id) }}"
                                            class="p-6">
                                            @csrf
                                            @method('delete')

                                            <input type="hidden" name="perfilId" value="{{ $datoAdmin->id }}">

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
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-perfilAdminUser-updaterol-{{ $datoAdmin->id }}')">
                                        <p>Admin Kendu</p>
                                    </x-danger-button>

                                    <x-modal name="confirm-perfilAdminUser-updaterol-{{ $datoAdmin->id }}" :show="$errors->userDeletion->isNotEmpty()"
                                        focusable>
                                        <form method="post" action="{{ route('adminpageAdmin.updateRole', $datoAdmin->id) }}"
                                            class="p-6">
                                            @csrf
                                            @method('patch')

                                            <input type="hidden" name="perfilId" value="{{ $datoAdmin->id }}">

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
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{ $datosAdmin->links() }}
        </div>

        @include('partials.footer')
    </body>

    </html>
@endsection
