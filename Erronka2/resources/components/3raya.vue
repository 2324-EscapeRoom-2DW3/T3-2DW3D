<template>
    <div class="h-screen w-full bg-full bg-no-repeat bg-center " :style="{ backgroundImage: `url(${backgroundImage})` }"
        @click.prevent="clickImagen">
        <div class="middle glow-green text-white border-2 border-green-600 bg-black p-5 rounded text-center z-50"
            :class="dis">
            <p>{{ displayText }}</p>
        </div>
        <!--         <img alt="fondo" class="fondo" src="../../storage/app/public/images/juego4/juego4.png" @click.prevent="clickImagen">
 -->
        <!--   <div style="position: absolute;
            top: 46vh;
            left: 79%;
            width: 6.5%;
            height: 15vh;
            background-color:#fff;
            opacity: 0.5;">
        </div> -->
        <!--     <div style="position: absolute;
            top: 30vh;
            left: 6%;
            width: 11%;
            height: 55vh;
            background-color:#fff;
            opacity: 0.5;"> 
        </div>-->
        <!-- <div style="position: absolute;
            top: 35.5vh;
            left: 45.3%;
            width: 9%;
            height: 11vh;
            background-color:#fff;
            opacity: 0.5;"> 
        </div> -->
        
        <div v-for="(item, index) in toggleDivs" :key="index" v-show="toggles[index] === 'visible'">
  
            <div v-if="index === 0">
                <div class="flex flex-col items-center justify-center min-h-screen">

                    <img class="absolute top-10 right-10 bg-transparent border-none p-0  w-10 cursor-pointer"
                        @click.prevent="toggleDiv(0)" src="../../storage/app/public/images/juego2/close.png" alt="">

                    <h3 class="mb-4 text-2xl text-bold text-white">{{ playerName }}</h3>

                    <div class="mb-8 flex flex-col items-center">
                        <!--Row y cell son los simbolos y x e y los indices. Los elementos en esos indices -->
                        <div v-for="(row, x) in board" :key="x" class="flex">
                            <!-- Le pasa la celda exacta x e y-->
                            <div v-for="(cell, y) in row" :key="y" @click="MakeMove(x, y)" :class="`material-icons-outlined flex h-32 w-32 bg-gray-300 rounded-md bg-clip-padding backdrop-filter backdrop-blur-2xl bg-opacity-10   cursor-pointer items-center justify-center border-2 hover:bg-green-600 border-white text-5xl hover:border2 hover:border-gray-100 ${cell === '⚗️' ? 'text-pink-500' : cell === '🧟' ? 'text-blue-500' : ''
                                }`">
                                {{ cell }}
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <h2 v-if="winner" class="mb-8 text-6xl font-bold text-white" :class="winnerClass">
                            {{ winnerName }}
                        </h2>
                        <button @click="ResetGame"
                            class="duration-400 rounded bg-lime-500 px-4 py-2 font-bold border-none uppercase hover:bg-lime-800">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
            <div v-else-if="index === 1">
                <img sr="../../storage/app/public/images/juego4/pizarra_juego4.png">

            </div>

        </div>
    </div>
</template>

<script>
import { computed } from "vue";
import route from '../../vendor/tightenco/ziggy';

export default {
    data() {
        return {
            backgroundImage: '../../storage/app/public/images/juego4/juego4.png',
            dis: "hidden",
            displayText: '',
            toggles: [
            [ "hidden"],
            [ "hidden"],
            // add more objects for more divs...
        ],/*             toggle: 'hidden',
 */            objektuak: [
                // Ordenador
                { areaTop: 46, areaLeft: 79, areaWidth: 6.5, areaHeight: 15 },
                { areaTop: 30, areaLeft: 6, areaWidth: 11, areaHeight: 55 },
                { areaTop: 35.5, areaLeft: 45.3, areaWidth: 9, areaHeight: 11 },

            ],

            player: "⚗️",
            board: [ // Representa el estado del tablero, se va a ir actualizando con los movimientos de los jugadores
                ["", "", ""],
                ["", "", ""],
                ["", "", ""],
            ],
        };
    },
    mounted() {
        this.mostrar("La IA se esconde entre nosotros... Lo puedo notar... Debe de estar en algun aparato electrónico.");
    },

    methods: {
        mostrar(text) {
            this.displayText = text;
            setTimeout(() => {
                this.dis = "dissapear_text";
                setTimeout(() => {
                    this.dis = "hidden";
                }, 5000);
            }, 100);
        },
        clickImagen(event) {
            let posX = event.offsetX;
            let posY = event.offsetY;

            for (let i = 0; i < this.objektuak.length; i++) {
                var areaTopAbs = (this.objektuak[i].areaTop / 100) * event.target.clientHeight;
                var areaLeftAbs = (this.objektuak[i].areaLeft / 100) * event.target.clientWidth;
                var areaWidthAbs = (this.objektuak[i].areaWidth / 100) * event.target.clientWidth;
                var areaHeightAbs = (this.objektuak[i].areaHeight / 100) * event.target.clientHeight;

                if (
                    posY >= areaTopAbs &&
                    posY <= areaTopAbs + areaHeightAbs &&
                    posX >= areaLeftAbs &&
                    posX <= areaLeftAbs + areaWidthAbs
                ) {
                    if (i == 0) {
                        this.toggleDiv(0);
                    } else if (i == 1) {
                        if (window.confirm('Estas seguro que quieres irte?')) {
                            window.location.href = route('menujuego');
                        }
                    } else if (i == 2) {
                        this.toggleDiv(1);
                    }
                }
            }
        },
        toggleDiv(index) {
    this.toggles[index][0] = this.toggles[index][0] === 'hidden' ? 'visible' : 'hidden';
},

        calculateWinner(squares) {
            // Los 9 elementos del array son las 9 celdas del tablero. The indices of the array are used to identify the positions of the squares on the board. For example, the first row of the board is represented by the elements at indices 0, 1, and 2 of the array. The second row is represented by the elements at indices 3, 4, and 5, and so on.

            const lines = [
                // Combinaciones ganadoras, las tres primeras lineas son horizontales, las tres siguientes verticales y las dos ultimas diagonales. The "lines" array contains arrays of three indices each.

                [0, 1, 2],
                [3, 4, 5],
                [6, 7, 8],
                [0, 3, 6],
                [1, 4, 7],      /*  0 | 1 | 2
                                    ---------
                                    3 | 4 | 5  --> Tablero posiciones
                                    ---------
                                    6 | 7 | 8 */
                [2, 5, 8],
                [0, 4, 8],
                [2, 4, 6],
            ];

            for (let i = 0; i < lines.length; i++) { // Comprobar si hay alguna combinacion ganadora
                const [a, b, c] = lines[i]; // Desestructura la combinación actual en tres variables a, b, c que representan los índices de las casillas en una posible línea ganadora
                if (squares[a] && squares[a] === squares[b] && squares[a] === squares[c]) {

                    // Si las 3 posiciones de la combinacion son iguales squares[a] LUEGO && squares[a] === squares[b] LUEGO && squares[a] === squares[c] Le va pasando posiciones del array de lines y mete las posiciones en a, b y c en el array de squares. Si los simbolos que hay en las posiciones a, b y c son iguales, hay ganador

                    return squares[a]; // Devuelve el simbolo del ganador
                }
            }
            return null;
        },
        MakeMove(x, y) {
            if (this.winner || this.board[x][y] !== "") return; // Si hay ganador o la celda ya esta ocupada no hacer nada

            this.board[x][y] = this.player; // Poner el simbolo del jugador en la celda
            this.player = this.player === "⚗️" ? "🧟" : "⚗️"; // Cambia de jugador

            if (this.player === "🧟") {
                this.$nextTick(() => { // Esperar a que se actualice el DOM
                    setTimeout(this.makeRandomMove, 500); // Esperar medio segundo
                });
            }
        },
        makeRandomMove() {

            const emptyCells = [];
            for (let x = 0; x < this.board.length; x++) {
                for (let y = 0; y < this.board[x].length; y++) {
                    if (this.board[x][y] === "") { // Si no hay nada en la celda guarda la posicion de la celda vacia
                        emptyCells.push({ x, y });
                    }
                }
            }

            // Celda vacia aleatoria
            const randomCell = emptyCells[Math.floor(Math.random() * emptyCells.length)];

            //Realizar movimiento
            this.MakeMove(randomCell.x, randomCell.y);
        },
        ResetGame() {
            this.board = [
                ["", "", ""],
                ["", "", ""],
                ["", "", ""],
            ];
            this.player = "⚗️";
        },
    },
    computed: {
        winner() { /* Cada vez que hay un cambio en el tablero comprueba si hay ganador
             // Convierte el array a 1D, lo flatea porque el metodo calculateWinner recibe un array de 1D       X | O | X
                                        ---------
                                        O | X | O
                                        ---------
                                        X | O | X */
            return this.calculateWinner(this.board.flat());
        },
        playerName() {
            return this.player === "⚗️" ? "Tu turno" : "IA maligna";
        },
        winnerName() {
            return this.winner === "⚗️" ? "Z" : "IA maligna gana...";
        },
        winnerClass() {
            return this.winner === "⚗️" ? "wordart shining-light animate-pulse" : "";
        },
    },
    watch: {
        winner(newValue) {
            if (newValue === "⚗️") {
                console.log('Ganaste');
                this.mostrar("Una de las letras para el código...");

            }
        },
    },

};
</script>
