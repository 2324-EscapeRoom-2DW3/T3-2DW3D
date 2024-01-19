<template>
    <div class="h-screen w-full bg-full bg-no-repeat bg-center" :style="{ backgroundImage: `url(${backgroundImage})` }"
        style="z-index: -1;" @click.prevent="clickImagen">
        <div class="middle glow-green text-white border-2 border-green-600 bg-black p-5 rounded text-center z-50"
            :class="dis">
            <p>{{ displayText }}</p>
        </div>
           
           <!--  <div style="position: absolute;
            top: 28vh;
            left: 33.5%;
            width: 8%;
            height: 45vh;
            background-color:#fff;
            opacity: 0.5;">
        </div>
        <div style="position: absolute;
            top: 28vh;
            left: 42%;
            width: 8%;
            height: 45vh;
            background-color:#ff1e1e;
            opacity: 0.5;">
        </div>
        <div style="position: absolute;
            top: 28vh;
            left: 50.1%;
            width: 8%;
            height: 45vh;
            background-color:#e9ff1e;
            opacity: 0.5;">
        </div>
        <div style="position: absolute;
            top: 28vh;
            left: 58.35%;
            width: 8%;
            height: 45vh;
            background-color:#1efffb;
            opacity: 0.5;">
        </div> -->

    </div>
</template>


<script>
import { computed } from "vue";
import route from '../../vendor/tightenco/ziggy';

export default {
    data() {
        return {
            backgroundImage: '../../../../storage/app/public/images/juego4/armario.jpg',
            dis: "hidden",
            displayText: '',
            disappearTimeout: null,
        hideTimeout: null,
            toggle: 0,
            objektuak: [
                // Ordenador
                { areaTop: 28, areaLeft: 33.5, areaWidth:8, areaHeight: 45 },
                { areaTop: 28, areaLeft: 42, areaWidth: 8, areaHeight: 45 },
                { areaTop: 28, areaLeft: 50.1, areaWidth: 8, areaHeight: 45 },
                { areaTop: 28, areaLeft: 58.35, areaWidth: 8, areaHeight: 45 },
            ],

        };
    },
    mounted() {
    },

    methods: {
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
                        this.mostrar("Está cerrada con llave...");
                    }
                    else if (i == 1) {
                        this.mostrar("Cerrada...");

                    } else if (i == 2) {
                        this.mostrar("Cerrada con llave también...");
                    
                    
                    } else if (i == 3) {
                        this.mostrar("!!!!");

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