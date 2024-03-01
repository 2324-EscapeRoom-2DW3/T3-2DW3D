<template>
    <div class="w-full h-screen bg-center bg-no-repeat bg-full" :style="{ backgroundImage: `url(${backgroundImage})` }"
        style="z-index: -1;" @click.prevent="clickImagen">
        <vue-countdown class="right-0 z-50 flex items-start justify-center pt-12 text-4xl text-white contador_letra"
            :time="(1 * min * 60 + sec) * 1000" @progress="updateTime" v-slot="{ days, hours, minutes, seconds }">
            {{ minutes }}:{{ seconds }}
        </vue-countdown>
        <vue-draggable-resizable class="flex items-center justify-center" ref="draggable4" v-show="luz_valor === true"
            :class="{ 'pointer-events-none': isPointerEventsNone }" @dragging="onDragging" @drag-stop="onDragStop">
            <img src="../../storage/app/public/images/juego6/black23.png" alt=""
                style="max-width: none; width: 13300px; max-height: none; height: 10000px;" />
        </vue-draggable-resizable>


        <form ref="tiempoForm" method="POST" :action="routetiempo" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="_method" value="PUT">
            <input name="tiempo_min" type="hidden" :value="min">
            <input name="tiempo_sec" type="hidden" :value="sec">
            <input name="id_juego" type="hidden" :value="yourId">
        </form>
        <img class="absolute p-0 bg-transparent border-none cursor-pointer top-10 left-10 w-14 hover:scale-110"
            @click="navigateToMenu" src="../../storage/app/public/images/exit.png" alt="Salir">
        <div class="p-4 p-10 lg:w-1/3 middle" style="z-index: 99;" v-show="toggle === 4">
            <div
                class="relative h-full px-8 pt-16 pb-24 overflow-hidden text-center border rounded-lg bg-slate-950 border-emerald-500">
                <img class="absolute w-5 p-0 bg-transparent border-none cursor-pointer top-10 right-10 hover:scale-110"
                    @click.prevent="toggleDiv(0)" src="../../storage/app/public/images/juego2/close.png" alt="">
                <h2 class="mb-1 font-medium tracking-widest text-white text-md title-font">{{ hint_header }}</h2>
                <h1 class="mb-3 text-xl font-medium text-white title-font sm:text-2xl">{{ hint_title }}
                </h1>
                <p class="mb-3 leading-relaxed text-white">{{ hint_content }}</p><a
                    class="inline-flex items-center text-white"><svg class="w-4 h-4 ml-2 cursor-pointer"
                        @click.prevent="change_hint" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg></a>
                <div class="absolute bottom-0 left-0 flex justify-center w-full py-4 mt-2 leading-none text-center"><span
                        class="inline-flex items-center py-1 pr-3 mr-3 text-sm leading-none text-white border-r-2 border-gray-200"><svg
                            class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>1.2K</span><span class="inline-flex items-center text-sm leading-none text-white"><svg
                            class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <path
                                d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                            </path>
                        </svg>6</span></div>

            </div>
        </div>
        <img class="absolute w-10 p-0 bg-transparent border-none cursor-pointer top-10 right-10 hover:scale-110"
            @click.prevent="pista" src="../../storage/app/public/images/hint.png" alt="" v-show="toggle === 0">

        <img class="absolute w-16 p-0 bg-transparent border-none cursor-pointer bottom-10 right-10 hover:scale-110"
            @click.prevent="luz" src="../../storage/app/public/images/juego6/flashlight2.png" alt="" v-show="lint === 0">


        <div class="z-50 p-5 text-center text-white bg-black border-2 border-green-600 rounded middle glow-green"
            :class="dis">
            <p>{{ displayText }}</p>
        </div>

        <div class="middle w-80">

            <div id="gridContainer" v-show="hive === true">
                <p class="text-4xl font-bold text-center text-white align-middle glow-green2">{{ selectedLetter }}</p>
                <br>
                <ul id="grid" class="clear">
                    <li>
                        <div class="hexagon fake-hexagon"></div>
                    </li>
                    <li @click="updateLetter('O')">
                        <div class="hexagon outer-hexagon"><span
                                class="transition duration-500 ease-in-out transform hover:scale-110">O</span></div>
                    </li>
                    <li @click="updateLetter('L')">
                        <div class="hexagon outer-hexagon"><span
                                class="transition duration-500 ease-in-out transform hover:scale-110">L</span></div>
                    </li>
                    <li @click="updateLetter('G')">
                        <div class="hexagon outer-hexagon"><span
                                class="transition duration-500 ease-in-out transform hover:scale-110">G</span></div>
                    </li>
                    <li @click="updateLetter('I')">
                        <div class="hexagon central-hexagon"><span
                                class="transition duration-500 ease-in-out transform hover:scale-110">I</span></div>
                    </li>
                    <li @click="updateLetter('A')">
                        <div class="hexagon outer-hexagon"><span
                                class="transition duration-500 ease-in-out transform hover:scale-110">A</span></div>
                    </li>
                    <li>
                        <div class="hexagon fake-hexagon"></div>
                    </li>
                    <li @click="updateLetter('N')">
                        <div class="hexagon outer-hexagon"><span
                                class="transition duration-500 ease-in-out transform hover:scale-110">N</span></div>
                    </li>
                    <li @click="updateLetter('M')">
                        <div class="hexagon outer-hexagon"><span
                                class="transition duration-500 ease-in-out transform hover:scale-110">M</span></div>
                    </li>
                </ul>
                <br>
                <div class="flex">
                  
                    <div class="p-5 font-bold text-center align-middle bg-white border rounded-lg border-emerald-500">
                        <h1>Palabras encontradas:</h1>
                        <p class="text-green-500" v-for="word in foundWords" :key="word">{{ word }}</p>

                    </div>
                    <img class="flex items-center justify-center w-16 mx-auto my-auto text-center cursor-pointer hover:scale-110"
                        @click="del" src="../../storage/app/public/images/juego6/del.png" alt="Salir">
                </div>
                <vue-draggable-resizable class="fixed bottom-0 pt-20 left-20" ref="draggable4" v-show="isHidden === true">
                <img class="transform slide-animation" src="../../storage/app/public/images/juego6/fondo_papel_h.png"
                    alt="">
            </vue-draggable-resizable>
            </div>

        </div>

    </div>

    <!--    <div style="position: absolute;
                top: 41vh;
                left: 68%;
                width: 6%;
                height: 12vh;
                background-color:#fff;
                opacity: 0.5;">
        </div> -->
</template>

<script>
import { computed } from "vue";
import route from '../../vendor/tightenco/ziggy';
import VueCountdown from '@chenfengyuan/vue-countdown';
import { watchEffect } from 'vue';
import debounce from 'lodash/debounce';

export default {
    name: 'my-tour',
    /*   setup() {
          const timeStore = useTimeStore();

          // Now you can access the minutes and seconds like this:
          console.log(timeStore.minutes);
          console.log(timeStore.seconds);

          return {
              minutes: timeStore.minutes,
              seconds: timeStore.seconds
          };
      }, */
    data() {
        return {
            selectedLetter: '',
            foundWords: [],

            hint_header: 'PISTA 1/2',
            hint_title: 'Linterna erabili',
            hint_content: 'Ezin badut ikusi ez zait ezertarako balio hemen egotea...',
            disable_inter: false,
            isClickDisabled: false,
            lint: 0,
            backgroundImage: '../../../storage/app/public/images/juego6/black.jpg',
            backgroundImage2: '../../../storage/app/public/images/juego6/juego3.jpg',
            isHidden: false,
            overlay_bg: '../../../storage/app/public/images/juego6/black33.png',
            dis: "hidden",
            displayText: '',
            toggle: 0,
            yourId: route().params,
            luz_valor: false,
            // Tiempo
            tutorialValor: null,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            min: 29,
            sec: 60,
            pendingMin: null,
            pendingSec: null,
            tiempoValor: null,
            routetiempo: document.querySelector('#juego6').dataset.routetiempo,
            routetiempovalor: document.querySelector('#juego6').dataset.routetiempoval,
            objektuak: [

                { areaTop: 41, areaLeft: 68, areaWidth: 6, areaHeight: 12 },

            ],
            hive: false,
            isPointerEventsNone: false,
            intervalId: null,
            openImage: new Image(),


        };
    },
    mounted() {
        this.getTiempo();

        this.mostrar("La luz no llega hasta este sitio... Qué extraño tiene que haber alguna fuente de corriente cerca ");

        this.openImage.src =
            "../../../storage/app/public/images/juego6/juego6_2.jpg";

    },

    methods: {
        del() {
            this.selectedLetter = this.selectedLetter.slice(0, -1);
        },
        updateLetter(letter) {
            this.selectedLetter += letter; // Append the clicked letter to the existing string
        },
        navigateToMenu() {
            window.location.href = route('menu.index', { id: route().params });
        },
        updateTime({ days, hours, minutes, seconds }) {
            this.pendingMin = minutes;
            this.pendingSec = seconds;
            this.debouncedUpdate();
        },
        debouncedUpdate: debounce(function () {
            this.updateTiempo_db();
        }, 1000),
        updateTiempo_db() {
            let formData = new FormData(this.$refs.tiempoForm);

            axios.post(this.$refs.tiempoForm.action, formData)
                .then(response => {
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


        pista() {

            this.toggle = 4;
        },
        luz() {
            this.backgroundImage = this.backgroundImage2;
            this.luz_valor = true;
            this.startTogglingPointerEvents();

        },
        startTogglingPointerEvents() {
            this.intervalId = setInterval(() => {
                this.isPointerEventsNone = !this.isPointerEventsNone;
            }, 200);
        },
        stopTogglingPointerEvents() {
            clearInterval(this.intervalId);
            this.intervalId = null;
        },
        onDragging() {
            this.stopTogglingPointerEvents();
        },
        onDragStop() {
            this.startTogglingPointerEvents();
        },
        change_hint() {
            if (this.hint_header === "PISTA 1/2") {
                this.hint_header = 'PISTA 2/2';
                this.hint_title = '7 hitzak bildu';
                this.hint_content = 'Letra hauking bost hitz egin behar ditut...';
            } else {
                this.hint_header = 'PISTA 1/2';
                this.hint_title = 'Linterna erabili';
                this.hint_content = 'Ezin badut ikusi ez zait ezertarako balio hemen egotea...';
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
                        if (!this.disable_inter) {


                            if (window.confirm('Encender el interruptor?')) {
                                this.disable_inter = true;
                                this.audio = new Audio('../../storage/images/juego6/luz.mp3');
                                this.audio.play();
                                this.backgroundImage = this.openImage.src;
                                this.luz_valor = false;
                                this.mostrar("La luz ha vuelto!");

                            }
                        }
                    }
                }
            }
        },
        toggleDiv(i) {
            this.toggle = i;

        },

    },
    computed: {


    },
    watch: {
        backgroundImage(newVal) {
            if (newVal === this.openImage.src) {
                this.lint = 1;
                this.hive = true;

            }
        },
        selectedLetter(newVal) {
            console.log(newVal);
            if (this.foundWords.length === 7) {
                setTimeout(() => {
                    this.isHidden = true;
                    this.mostrar("Otra de las letras para el código...");
                }, 500);
            }
            if (newVal === 'MINA'  && !this.foundWords.includes(newVal) || newVal === 'GOMINOLA'  && !this.foundWords.includes(newVal)  || newVal === 'MOLIN' && !this.foundWords.includes(newVal) || newVal === 'IMAN' && !this.foundWords.includes(newVal)  || newVal === 'AMINO'  && !this.foundWords.includes(newVal) || newVal === 'LIMON'  && !this.foundWords.includes(newVal) ||newVal === 'LIMA'  && !this.foundWords.includes(newVal) ||newVal === 'MILANO'  && !this.foundWords.includes(newVal)  ||newVal === 'MOLINO' && !this.foundWords.includes(newVal)  || newVal === 'LIGA'  && !this.foundWords.includes(newVal)  || newVal === 'LIO'  && !this.foundWords.includes(newVal) || newVal === 'MIGA'  && !this.foundWords.includes(newVal)  || newVal === 'MIL'  && !this.foundWords.includes(newVal) || newVal === 'MOL'  && !this.foundWords.includes(newVal)  || newVal === 'MOLA'  && !this.foundWords.includes(newVal) || newVal === 'MOLINILLO' && !this.foundWords.includes(newVal)  || newVal === 'MOLINO' && !this.foundWords.includes(newVal) || newVal=== 'ILLO'  && !this.foundWords.includes(newVal) || newVal=== 'MILLA'  && !this.foundWords.includes(newVal) ) {
            
                this.foundWords.push(newVal);
                this.selectedLetter = '';  
            
                        }

            
        },
      
    },

};
</script>
