<template>
    <div class="h-screen w-full bg-full bg-no-repeat bg-center" :style="{ backgroundImage: `url(${backgroundImage})` }"
        style="z-index: -1;" @click.prevent="clickImagen">
        <div class="middle glow-green text-white border-2 border-green-600 bg-black p-5 rounded text-center z-50"
            :class="dis">
            <p>{{ displayText }}</p>
        </div>
        <div class="flex flex-col items-center justify-center min-h-screen z-50" v-show="toggle === 1">
            <div style="margin-right: 20%;">
                <img class="absolute top-10 right-10 bg-transparent border-none p-0  w-10 cursor-pointer  hover:scale-110"
                    @click.prevent="toggleDiv(0)" src="../../storage/app/public/images/juego2/close.png" alt="">

                <img src="../../storage/app/public/images/juego5/vault.png" class="middle z-0	 h-3/4"
                    style="padding-right: 20%;" alt="">
                <div style="position: relative;">
                    <!-- Lock image -->
                    <img src="../../storage/app/public/images/juego5/cerradura.png" class="scale-50" alt="">

                    <!-- Key image -->
                    <input type="range" min="0" max="360" v-model="rotateValue" style="">

                    <!-- Image -->
                    <img src="../../storage/app/public/images/juego5/key.png"
                        class="middle z-20 h-1/4 w-1/4 mt-10 glow-green2"
                        :style="{ position: 'absolute', bottom: '0%', right: '0%', marginLeft: '-10%', transform: `rotate(${rotateValue}deg)` }"
                        alt="">
                </div>
            </div>
            <video class="absolute middle z-30 ml-40" style="height: 300px; width: 300px;" muted playsinline>
                <source src="../../storage/app/public/images/juego5/llave.webm" type="video/webm">
            </video>
        </div>
        <!--       <div style="position: absolute;
            top: 23vh;
            left: 38%;
            width: 15%;
            height: 41.5vh;
            background-color:#fff;
            opacity: 0.5;">
        </div>
       -->

    </div>
</template>


<script>
import { computed } from "vue";
import route from '../../vendor/tightenco/ziggy';

export default {
    data() {
        return {
            backgroundImage: '../../../storage/app/public/images/juego5/despacho.png',
            dis: "hidden",
            displayText: '',
            llaveValor: null,
            disappearTimeout: null,
            hideTimeout: null,
            route: document.querySelector('#juego5').dataset.route,
            toggle: 0,
            openImage: new Image(),
            objektuak: [
                // Ordenador
                { areaTop: 23, areaLeft: 38, areaWidth: 15, areaHeight: 41.5 },

            ],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            yourId: route().params,
            route: document.querySelector('#juego5').dataset.route,
            rotateValue: 0,  // Initial rotation value


        };
    },
    mounted() {
        this.openImage.src =
            "../../../storage/app/public/images/juego5/despacho_blur.png";
        this.getLlaveValor();
    },

    methods: {
        /*  irte() {
             if (window.confirm('Estas seguro que quieres irte?')) {
                 window.location.href = route('juego4.index', { id: route().params });
             }
         }, */

        getLlaveValor() {
            const gameId = document.querySelector('#juego5').dataset.route; // Get the game ID from the data-route attribute
            axios.get(this.route, this.yourId)
                .then(response => {
                    this.llaveValor = response.data; // Store the value of llave in llaveValor
                    console.log(this.llaveValor);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        mostrar(text) {
            // Clear existing timeouts
            clearTimeout(this.disappearTimeout);
            clearTimeout(this.hideTimeout);

            this.displayText = text;
            this.disappearTimeout = setTimeout(() => {
                this.dis = "dissapear_text";
                this.hideTimeout = setTimeout(() => {
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
                        if (this.llaveValor == 1) {
                            this.toggle = 1;
                            this.backgroundImage = this.openImage.src;


                        } else {
                            this.mostrar("Parece que me hace falta una llave...");

                        }
                    }

                }
            }
        },
        toggleDiv(i) {
            this.toggle = i;
            this.backgroundImage = "../../../storage/app/public/images/juego5/despacho.png";

        },
    },
    computed: {

    },
    watch: {

    },

};
</script>
