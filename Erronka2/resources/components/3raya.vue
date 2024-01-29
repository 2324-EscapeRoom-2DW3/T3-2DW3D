<template>
    <div class="h-screen w-full bg-full bg-no-repeat bg-center" :style="{ backgroundImage: `url(${backgroundImage})` }"
        style="z-index: -1;" @click.prevent="clickImagen">
        <vue-countdown class="fixed top-0 left-0 right-0 flex justify-center items-start text-white text-4xl" :time="(1 * min * 60 + sec) * 1000" @progress="updateTime"
            v-slot="{ days, hours, minutes, seconds }">
            {{ minutes }}:{{ seconds }}
        </vue-countdown>

        <form ref="tiempoForm" method="POST" :action="routetiempo" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="_method" value="PUT">
            <input name="tiempo_min" type="hidden" :value="min">
            <input name="tiempo_sec" type="hidden" :value="sec">
            <input name="id_juego" type="hidden" :value="yourId">
        </form>
        <div class="p-4 lg:w-1/3 middle p-10" style="z-index: 99;" v-show="toggle === 4">
            <div
                class="h-full bg-slate-950 border-emerald-500 border px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                <img class="absolute top-10 right-10 bg-transparent border-none p-0  w-5 cursor-pointer hover:scale-110"
                    @click.prevent="toggleDiv(0)" src="../../storage/app/public/images/juego2/close.png" alt="">
                <h2 class="tracking-widest text-md title-font font-medium text-white mb-1">{{ hint_header }}</h2>
                <h1 class="title-font sm:text-2xl text-xl font-medium text-white mb-3">{{ hint_title }}
                </h1>
                <p class="leading-relaxed mb-3 text-white">{{ hint_content }}</p><a
                    class="text-white inline-flex items-center"><svg class="w-4 h-4 ml-2 cursor-pointer"
                        @click.prevent="change_hint" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg></a>
                <div class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4"><span
                        class="text-white mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-200"><svg
                            class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>1.2K</span><span class="text-white inline-flex items-center leading-none text-sm"><svg
                            class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <path
                                d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                            </path>
                        </svg>6</span></div>

            </div>
        </div>
        <v-tour name="myTour" :steps="steps"></v-tour>
        <img class="absolute top-10 right-10 bg-transparent border-none p-0  w-10 cursor-pointer hover:scale-110 v-step-3"
            @click.prevent="pista" src="../../storage/app/public/images/hint.png" alt="" v-show="toggle === 0">

        <div class="h-screen w-full bg-full bg-no-repeat bg-center" :style="{ backgroundImage: `url(${backgroundImage2})` }"
            style="z-index: 1;" v-show="toggle === 3">
            <img class="absolute top-10 right-10 bg-transparent border-none p-0  w-10 cursor-pointer hover:scale-110"
                @click.prevent="toggleDiv(0)" src="../../storage/app/public/images/hint.png" alt="">
            <div @click.prevent="toggleDiv(0)" style="position: absolute;
                top: 1.5vh;
                left: 86%;
                width: 8.2%;
                height: 14vh;
                z-index: 50;">
            </div>
        </div>
        <form ref="llaveForm" method="POST" :action="route" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">

            <input type="hidden" name="_method" value="PUT">

            <input name="id_juego" type="hidden" :value="yourId">
        </form>

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
        <div id="v-step-0" style="position: absolute; z-index: -1;
                top: 35.5vh;
                left: 45.3%;
                width: 9%;
                height: 11vh;">
        </div>
        <div class="v-step-1" style="position: absolute; z-index: -1;
                top: 69vh;
                left: 18%;
                width: 22%;
                height: 22vh;
        ">
        </div>
        <div data-v-step="2" style="position: absolute; z-index: -1;
                top: 31vh;
                left: 48.93%;
                width: 2%;
                height: 4vh;
            ">
        </div>
        <!--   <div style="position: absolute;
                top: 37vh;
                left: 38.4%;
                width: 6%;
                height: 14vh;
                background-color:#fff;
                opacity: 0.5;">
            </div>  -->
        <!--    <div style="position: absolute;
                top: 1.5vh;
                left: 86%;
                width: 8.2%;
                height: 14vh;
                background-color:#fff;
                opacity: 0.5;">
            </div>  -->
        <div class="flex flex-col items-center justify-center min-h-screen z-50" v-show="toggle === 1"
            @mouseenter="isClickDisabled = true" @mouseleave="isClickDisabled = false">
            <img class="absolute top-10 right-10 bg-transparent border-none p-0  w-10 cursor-pointer  hover:scale-110"
                @click.prevent="toggleDiv(0)" src="../../storage/app/public/images/juego2/close.png" alt="">

            <h3 class="mb-4 text-4xl text-bold text-white">{{ playerName }}</h3>

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
                <h2 v-if="winner" class="mb-8 text-4xl font-bold font-italic text-white" :class="winnerClass">
                    {{ winnerName }}
                </h2>
                <button @click="ResetGame"
                    class="smky-btn3 relative hover:text-white py-2 px-6 after:absolute after:h-1 after:hover:h-[200%] transition-all duration-500 hover:transition-all hover:duration-500 after:transition-all after:duration-500 after:hover:transition-all after:hover:duration-500 overflow-hidden z-20 after:z-[-20] after:bg-[#32CD32] after:rounded-t-full after:w-full after:bottom-0 after:left-0 text-white scale-125">Reset</button>
            </div>
            <vue-draggable-resizable class="fixed bottom-0 left-20 pt-20" ref="draggable4" v-show="isHidden === true">
                <img class="transform slide-animation" src="../../storage/app/public/images/juego4/fondo_papel_z.png"
                    alt="">
            </vue-draggable-resizable>
        </div>
        <div class="h-screen w-full bg-full bg-no-repeat bg-center" v-show="toggle === 2"
            :style="{ backgroundImage: `url(${backgroundImage3})` }" style="z-index: 1;">

            <div class="flex flex-col items-center justify-center min-h-screen">

                <img class="absolute top-10 right-10 bg-transparent border-none p-0  w-10 cursor-pointer hover:scale-110"
                    @click.prevent="toggleDiv(0)" src="../../storage/app/public/images/juego2/close.png" alt="">
                <img src="../../storage/app/public/images/juego4/pizarra_juego4.png">
            </div>
        </div>

    </div>
</template>

<script>
import { computed } from "vue";
import route from '../../vendor/tightenco/ziggy';
import { useTimeStore } from './timeStore';
import VueCountdown from '@chenfengyuan/vue-countdown';
import { watchEffect } from 'vue';

export default {
    name: 'my-tour',
    setup() {
        const timeStore = useTimeStore();

        // Now you can access the minutes and seconds like this:
        console.log(timeStore.minutes);
        console.log(timeStore.seconds);

        return {
            minutes: timeStore.minutes,
            seconds: timeStore.seconds
        };
    },
    data() {
        return {
            hint_header: 'PISTA 1/2',
            hint_title: 'Email-ak bidaltzen ditu',
            hint_content: 'Programatzeko erabiltzen dugun gailua egunero, baita jolasteko...',
            route: document.querySelector('#juego4').dataset.route,
            routetutorial: document.querySelector('#juego4').dataset.routetutorial,
            isClickDisabled: false,
            backgroundImage: '../../../storage/app/public/images/juego4/juego4.png',
            backgroundImage3: '../../../storage/app/public/images/juego4/juego4_blur.png',
            isHidden: false,
            backgroundImage2: '../../../storage/app/public/images/juego4/luz.png',
            dis: "hidden",
            displayText: '',
            toggle: 0,
            yourId: route().params,

            // Tiempo
            tutorialValor: null,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            min: 29,
            sec: 60,
            pendingMin: null,
            pendingSec: null,
            tiempoValor: null,
            routetiempo: document.querySelector('#juego4').dataset.routetiempo,
            routetiempovalor: document.querySelector('#juego4').dataset.routetiempoval,
            objektuak: [
                // Ordenador
                { areaTop: 46, areaLeft: 79, areaWidth: 6.5, areaHeight: 15 },
                { areaTop: 30, areaLeft: 6, areaWidth: 11, areaHeight: 55 },
                { areaTop: 35.5, areaLeft: 45.3, areaWidth: 9, areaHeight: 11 },
                { areaTop: 69, areaLeft: 18, areaWidth: 22, areaHeight: 22 },
                { areaTop: 31, areaLeft: 48.93, areaWidth: 2, areaHeight: 4 },
                { areaTop: 37, areaLeft: 38.4, areaWidth: 6, areaHeight: 14 },
                { areaTop: 1.5, areaLeft: 86, areaWidth: 8.2, areaHeight: 14 },

            ],

            player: "⚗️",
            board: [ // Representa el estado del tablero, se va a ir actualizando con los movimientos de los jugadores
                ["", "", ""],
                ["", "", ""],
                ["", "", ""],
            ],
            steps: [
                {
                    target: '#v-step-0',
                    header: {
                        title: 'Gelak',
                    },
                    content: `<strong>Gelak</strong> escape room-ean oinarritutako jokoa da. Jokalariak gelan sartuko da eta bertan dauden objektuak erabiliz, puzlea ebatzi beharko du.`

                },
                {
                    target: '.v-step-1',
                    content: 'Klik egin leku desberdinetan informazioa biltzeko!'
                },
                {
                    target: '[data-v-step="2"]',
                    content: 'Birritan konprobatu dena, gauza ezkutuak egon daikezke',
                    params: {
                        placement: 'top'
                    }
                },
                {
                    target: '.v-step-3',
                    content: 'Galduta bazaude, klik egin pista ikonoan',
                    params: {
                        placement: 'bottom'
                    }
                }
            ]
        };
    },
    mounted() {
        this.getTiempo();

        this.mostrar("La IA se esconde entre nosotros... Lo puedo notar... Debe de estar en algun aparato electrónico.");
        this.getTutorialValor();



    },

    methods: {

        updateTime({ days, hours, minutes, seconds }) {
            this.pendingMin = minutes;
            this.pendingSec = seconds;
            this.updateTiempo_db();
        },
        updateTiempo_db() {
            let formData = new FormData(this.$refs.tiempoForm);

            axios.post(this.$refs.tiempoForm.action, formData)
                .then(response => {
                    // Update min and sec only when the request completes
                    this.min = this.pendingMin;
                    this.sec = this.pendingSec;
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        // .
        getTiempo() {
            axios.get(this.routetiempovalor, this.yourId)
                .then(response => {
                    this.tiempoValor = response.data; // Store the value of llave in llaveValor
                    console.log(this.tiempoValor);
                    if (this.tiempoValor.tiempo_min != 0 && this.tiempoValor.tiempo_sec != 0) {
                        this.min = this.tiempoValor.tiempo_min;
                        this.sec = this.tiempoValor.tiempo_sec;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },

        getTutorialValor() {

            axios.get(this.routetutorial, this.yourId)
                .then(response => {
                    this.tutorialValor = response.data; // Store the value of llave in llaveValor
                    console.log(this.tutorialValor);
                    if (this.tutorialValor === 0) {
                        setTimeout(() => {
                            this.$tours['myTour'].start();
                            let formData = new FormData(this.$refs.llaveForm);

                            axios.post(this.$refs.llaveForm.action, formData)
                                .then(response => {
                                    // Handle the response
                                    console.log(response);
                                })
                                .catch(error => {
                                    // Handle the error
                                    console.log(error);

                                });

                        }, 6000);
                    }
                })
                .catch(error => {
                    this.tutorialValor = response.data; // Store the value of llave in llaveValor
                    console.log(this.tutorialValor);
                    if (this.tutorial === 0) {
                        setTimeout(() => {
                            this.$tours['myTour'].start();
                            event.preventDefault();
                            let formData = new FormData(this.$refs.llaveForm);

                            axios.post(this.$refs.llaveForm.action, formData)
                                .then(response => {
                                    // Handle the response
                                    console.log(response);
                                })
                                .catch(error => {
                                    // Handle the error
                                    console.log(error);

                                });

                        }, 6000);
                    }
                    console.error(error);
                });
        },
        pista() {

            this.toggle = 4;
        },
        change_hint() {
            if (this.hint_header === "PISTA 1/2") {
                this.hint_header = 'PISTA 2/2';
                this.hint_title = 'Lekutan sartzeko erabiltzen dugu';
                this.hint_content = 'Beste gela bat egon ditzake hemen ezkutaturik...';
            } else {
                this.hint_header = 'PISTA 1/2';
                this.hint_title = 'Email-ak bidaltzen ditu';
                this.hint_content = 'Programatzeko erabiltzen dugun gailua egunero, baita jolasteko...';
            }


        },

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
            if (this.isClickDisabled) {
                return;
            }
            let posX = event.clientX;
            let posY = event.clientY;

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
                        this.toggle = 1;
                    } else if (i == 1) {
                        if (window.confirm('Estas seguro que quieres irte?')) {
                            window.location.href = route('menu.index', { id: route().params });
                        }
                    } else if (i == 2) {
                        this.toggle = 2;

                    } else if (i == 3) {
                        this.mostrar("Utensilios varios... No creo que sea esto...");

                    } else if (i == 4) {
                        this.mostrar("Ha dejado de marcar la hora, la ultima vez que lo hizo fue a las 12:23...");

                    } else if (i == 5) {
                        this.mostrar("Este armario parece llevar a una habitación contigua...");
                        setTimeout(() => {
                            window.location.href = route('juego4.show', { id: route().params });
                        }, 4000);

                    } else if (i == 6) {
                        let count = 0;
                        let intervalId = setInterval(() => {
                            this.toggle = this.toggle === 3 ? 0 : 3;
                            count++;
                            if (count === 6) {
                                clearInterval(intervalId);
                                this.toggle = 3;
                            }
                        }, 90);

                        let audio = new Audio('../../storage/sounds/luz.mp3');
                        audio.play();
                    }
                }
            }
        },
        toggleDiv(i) {
            this.toggle = i;

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
            return this.winner === "⚗️" ? "Has ganado" : "IA maligna gana...";
        },
        winnerClass() {
            return this.winner === "⚗️" ? "wordart shining-light animate-pulse" : "shining-light animate-pulse wordart2";
        },
    },
    watch: {
        winner(newValue) {
            if (newValue === "⚗️") {
                console.log('Ganaste');
                setTimeout(() => {
                    this.isHidden = true;

                }, 500);

                this.mostrar("Una de las letras para el código...");

            }
        },
    },

};
</script>
