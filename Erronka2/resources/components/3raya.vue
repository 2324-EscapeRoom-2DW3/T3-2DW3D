<template>
    <main class="min-h-screen pt-8 text-center dark:text-white">

        <h3 class="mb-4 text-xl text-white">{{ playerName }}</h3>

        <div class="mb-8 flex flex-col items-center"> <!--Row y cell son los simbolos y x e y los indices. Los elementos en esos indices -->
            <div v-for="(row, x) in board" :key="x" class="flex">
                <!-- Le pasa la celda exacta x e y-->
                <div v-for="(cell, y) in row" :key="y" @click="MakeMove(x, y)" :class="`material-icons-outlined flex h-32 w-32 cursor-pointer items-center justify-center border border-white text-5xl hover:bg-gray-400 hover:bg-clip-padding hover:backdrop-filter hover:backdrop-blur-3xl hover:bg-opacity-10 hover:border hover:border-gray-100 ${cell === '⚗️' ? 'text-pink-500' : cell === '🧟' ? 'text-blue-500' : ''
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
                class="duration-400 rounded bg-red-500 px-4 py-2 font-bold uppercase hover:bg-red-600">
                Reset
            </button>
        </div>
    </main>
</template>

<script>
import { computed } from "vue";

export default {
    data() {
        return {
            player: "⚗️",
            board: [ // Representa el estado del tablero, se va a ir actualizando con los movimientos de los jugadores
                ["", "", ""],
                ["", "", ""],
                ["", "", ""],
            ],
        };
    },

    methods: {
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
            return this.calculateWinner(this.board.flat()); // Convierte el array a 1D, lo flatea porque el metodo calculateWinner recibe un array de 1D       X | O | X
                                        ---------
                                        O | X | O
                                        ---------
                                        X | O | X */
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
};
</script>