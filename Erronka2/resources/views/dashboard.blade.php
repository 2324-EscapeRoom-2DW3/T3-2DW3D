@extends('layout.plantilla')

@section('title', 'Index')

@section('content')

<x-app-layout>
                    @php
                    $imageUrl = url('storage/images' . Auth::user()->imagen); @endphp
                    <div class="flex flex-col items-center justify-center">
                        <img src="{{ $imageUrl }}" alt="User Photo" class="mx-auto profile-image" onclick="location.href = location.href.replace('dashboard', 'profile');">
                        <h1 class="font-figtree font-bold text-5xl text-center text-username">
                            {{ Auth::user()->name}}
                        </h1>
                        <h2 class="font-figtree font-bold text-5xl text-center text-email">
                            {{ Auth::user()->email}}
                        </h2>
                        <h3 class="font-figtree text-5xl text-center text-score">
                            Partidas
                        </h3>
                        @if (isset($success))

                        <div class="alert alert-success">
                            {{ $success }}

                        @endif

                        <div class="list-scores">

                            @foreach($juegos as $juego)



                            <div class="list-box" id="game-{{ $juego->id }}">
                                <div class="game-header">
                                    <h2 class="font-figtree text-5xl">
                                        Partida {{ $juego->id }}
                                    </h2>
                                    <button class="display-info-button" onclick="displayGameInfo(this)">
                                        <img src="{{ url('storage/images/arrow-down.png') }}" alt="arrow-down" class=".display-info-button-icon">
                                    </button>
                                    <script>
                                        function displayGameInfo(button) {
                                            let id = button.parentElement.parentElement.id.split("-")[1];
                                            if (button.style.transform == "rotate(180deg)") {
                                                button.style.transform = "rotate(0deg)";
                                                document.getElementById("game-" + id + "-info").style.height = "0px";
                                                document.getElementById("game-" + id + "-info").style.display = "none";
                                            } else {
                                                button.style.transform = "rotate(180deg)";
                                                document.getElementById("game-" + id + "-info").style.height = "100%";
                                                document.getElementById("game-" + id + "-info").style.display = "flex";
                                            }
                                        }
                                    </script>
                                </div>

                                <div class="game-info" id="game-{{ $juego->id }}-info">
                                    <div class="info">
                                        <div class="info-labels">
                                            <p>Puntuación</p>
                                            <p>Tiempo</p>
                                        </div>
                                        <div class="info-data">
                                            <p>{{$juego->score}}</p>
                                            <p>{{$juego->tiempo}}</p>
                                        </div>
                                    </div>
                                    <form action="{{ route('juego.borrar', ['id' => $juego->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-boton-borrar-juego>
                                            BORRAR SESION
                                        </x-boton-borrar-juego>
                                        </form>
                                        <div class="info-button">
                                            <!-- aqui hay q hacer un if para los botones completado o continuar -->
                                            <a class="continuar" href="">Continuar</a>

                                            <!-- poner el link de la partida en el href -->
                                            <!--<a class="completado">Completado</a>-->
                                        </div>
                                </div>
                            </div>
                            <br>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection