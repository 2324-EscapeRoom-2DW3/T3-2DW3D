<template>
    <div class="h-screen w-full bg-full bg-no-repeat bg-center" :style="{ backgroundImage: `url(${backgroundImage})` }"
        style="z-index: -1;" @click.prevent="clickImagen">
        <div class="middle glow-green text-white border-2 border-green-600 bg-black p-5 rounded text-center z-50"
            :class="dis">
            <p>{{ displayText }}</p>
        </div>
        <div class="flex flex-col items-center justify-center min-h-screen z-50" v-show="toggle === 1">
            <img class="absolute top-10 right-10 bg-transparent border-none p-0  w-10 cursor-pointer  hover:scale-110"
                @click.prevent="toggleDiv(0)" src="../../storage/app/public/images/juego2/close.png" alt="">


            <img src="../../storage/app/public/images/juego5/vault.png" class="middle z-0	 h-3/4" alt="">
            <div style="position: relative;">
                <!-- Lock image -->
                <img :src="imgSrc" class="scale-50" alt="">


                <!-- Llave -->
                <vue-draggable-resizable ref="draggable" :resizable="false" :draggable="isDraggable"
                    class="fixed top-0 left-0" @dragging="onDragging">
                    <img src="../../storage/app/public/images/juego5/key.png" alt=""
                        class=" z-20 h-2/4 w-4/5 glow-green2">
                </vue-draggable-resizable>



            </div>

            <!-- <video class="absolute middle z-30 ml-40" style="height: 300px; width: 300px;" muted playsinline>
                <source src="../../storage/app/public/images/juego5/llave.webm" type="video/webm">
            </video> -->
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
            imgSrc: "../../../storage/app/public/images/juego5/cerradura.png",
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
                { areaTop: 115, areaLeft: 60, areaWidth: 15, areaHeight: 30 }, // Especial mirar abajo

            ],
            isDraggable: true,
            clicked: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            yourId: route().params,
            route: document.querySelector('#juego5').dataset.route,
            rotateValue: 0,  // Initial rotation value
            areaTopAbs: 0,
            areaLeftAbs: 0,
            areaWidthAbs: 0,
            areaHeightAbs: 0,
            played: false,

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
        onDragging(x, y) {
            // oh my fuckign god im losing my mind THE PARENT IS THE LOCKER ITS AREA IS RELATIVE TO AREA OF THE LOCKER
            // 0:09 nvm no tengo ni idea
            this.clicked = true;
            var parentElement = this.$refs.draggable.$el.parentElement;
            this.areaTopAbs = (this.objektuak[1].areaTop / 100) * parentElement.clientHeight;
            this.areaLeftAbs = (this.objektuak[1].areaLeft / 100) * parentElement.clientWidth;
            this.areaWidthAbs = (this.objektuak[1].areaWidth / 100) * parentElement.clientWidth;
            this.areaHeightAbs = (this.objektuak[1].areaHeight / 100) * parentElement.clientHeight;

            if (
                y >= this.areaTopAbs &&
                y <= this.areaTopAbs + this.areaHeightAbs &&
                x >= this.areaLeftAbs &&
                x <= this.areaLeftAbs + this.areaWidthAbs
            ) {
                console.log("Si");
                if (!this.played) {
                    let audio = new Audio('../../storage/sounds/unlocked.mp3');
                    audio.play();
                    this.played = true;
                    this.mostrar("Se ha abierto!");

                }

                this.isDraggable = false;
                this.imgSrc = "../../../storage/app/public/images/juego5/cerradura_abierta.png";

            } else {
                console.log("No");
            }
        },

        move() {
            this.posX = 0
            this.posY = 0
            var changeXMag = 1
            var changeYMag = 1
            var changeX = changeXMag
            var changeY = changeYMag

            var interval = setInterval(() => {
                this.posX += changeX * 2
                this.posY += changeY * 2

                var isRight = this.posX >= window.innerWidth - this.$refs.draggable.$el.clientWidth
                var isLeft = this.posX <= 0
                var isTop = this.posY <= 0
                var isBottom = this.posY >= window.innerHeight -this.$refs.draggable.$el.clientHeight

                var isHorizontalBoundary = isLeft || isRight
                var isVerticalBounday = isTop || isBottom

                if (isHorizontalBoundary && isVerticalBounday) {
                    clearInterval(interval)
                }
                if (isHorizontalBoundary) {
                    changeX *= -1
                }
                if (isVerticalBounday) {
                    changeY *= -1
                }

                if (!this.clicked) {
                    this.$refs.draggable.$el.style.transform = `translate(${this.posX}px, ${this.posY}px)`

                }
            }, 10)
        },


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
                            window.requestAnimationFrame(this.move);


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

