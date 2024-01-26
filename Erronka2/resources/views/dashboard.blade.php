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
                        <img src="{{ $imageUrl }}" alt="User Photo" class="mx-auto profile-image" 
                            onclick="location.href = location.href.replace('dashboard', 'profile');">
                        <h1 class="font-figtree font-bold text-5xl text-center text-username">
                            {{ Auth::user()->name}}
                        </h1>
                        <h2 class="font-figtree font-bold text-5xl text-center text-email">
                            {{ Auth::user()->email}}
                        </h2>
                        <h3 class="font-figtree text-5xl text-center text-score">
                            Partidas
                        </h3>
                        
                        <div class="list-scores">

                            <div class="list-box" id="game-1">
                                <div class="game-header">
                                    <h2 class="font-figtree text-5xl">
                                        Partida 1
                                    </h2>
                                    <button class="display-info-button" onclick="displayGameInfo(this)">
                                        <img src="{{ url('storage/images/arrow-down.png') }}" alt="arrow-down" class=".display-info-button-icon">
                                    </button>
                                    <script>
                                        function displayGameInfo(button){
                                            console.log(button);
                                            if (button.style.transform == "rotate(180deg)"){
                                                button.style.transform = "rotate(0deg)";
                                                document.getElementById("game-1-info").style.height = "0px";
                                                document.getElementById("game-1-info").style.display = "none";
                                            } else {
                                                button.style.transform = "rotate(180deg)";
                                                document.getElementById("game-1-info").style.height = "100%";
                                                document.getElementById("game-1-info").style.display = "flex";
                                            }
                                        }
                                    </script>
                                </div>

                                <div class="game-info" id="game-1-info">
                                    <div class="info">
                                        <div class="info-labels">
                                            <p>Puntuación</p>
                                            <p>Tiempo</p>
                                            <p>Fecha</p>
                                        </div>
                                        <div class="info-data">
                                            <p>200</p>
                                            <p>10:23</p>
                                            <p>23/01/2023</p>
                                        </div>
                                    </div>
                                    <div class="info-button">
                            <!-- aqui hay q hacer un if para los botones completado o continuar -->
                                        <a class="continuar" href="">Continuar</a> <!-- poner el link de la partida en el href -->
                                        <!--<a class="completado">Completado</a>-->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
