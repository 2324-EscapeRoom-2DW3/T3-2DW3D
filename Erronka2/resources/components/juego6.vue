<template>
    <div class="h-screen w-full bg-full bg-no-repeat bg-center" :style="{ backgroundImage: `url(${backgroundImage})` }"
        style="z-index: -1;" @click.prevent="clickImagen">
        <vue-countdown class="fixed contador_letra mt-12 top-0 left-0 right-0 flex justify-center items-start text-white text-4xl" :time="(1 * min * 60 + sec) * 1000" @progress="updateTime"
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
        <img class="absolute top-10 left-10 bg-transparent border-none p-0  w-14 cursor-pointer hover:scale-110"
            @click="navigateToMenu" src="../../storage/app/public/images/exit.png" alt="Salir">
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
        <img class="absolute top-10 right-10 bg-transparent border-none p-0  w-10 cursor-pointer hover:scale-110"
            @click.prevent="pista" src="../../storage/app/public/images/hint.png" alt="" v-show="toggle === 0">

        

        <div class="middle glow-green text-white border-2 border-green-600 bg-black p-5 rounded text-center z-50"
            :class="dis">
            <p>{{ displayText }}</p>
        </div>
   
    
       

    </div>
</template>

<script>
import { computed } from "vue";
import route from '../../vendor/tightenco/ziggy';
import VueCountdown from '@chenfengyuan/vue-countdown';
import { watchEffect } from 'vue';

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
            hint_header: 'PISTA 1/2',
            hint_title: 'Email-ak bidaltzen ditu',
            hint_content: 'Programatzeko erabiltzen dugun gailua egunero, baita jolasteko...',
            
            isClickDisabled: false,
            backgroundImage: '../../../storage/app/public/images/juego6/juego6.png',
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
            routetiempo: document.querySelector('#juego6').dataset.routetiempo,
            routetiempovalor: document.querySelector('#juego6').dataset.routetiempoval,
            objektuak: [
             
                { areaTop: 30, areaLeft: 6, areaWidth: 11, areaHeight: 55 },

            ],

           
      
        };
    },
    mounted() {
        this.getTiempo();

        this.mostrar("La IA se esconde entre nosotros... Lo puedo notar... Debe de estar en algun aparato electrónico.");



    },

    methods: {
        navigateToMenu() {
            window.location.href = route('menu.index', { id: route().params });
        },
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
                        if (window.confirm('Estas seguro que quieres irte?')) {
                            window.location.href = route('menu.index', { id: route().params });
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
      
    },

};
</script>
