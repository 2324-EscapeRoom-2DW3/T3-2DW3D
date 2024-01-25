<template>
    <div class="h-screen w-full bg-full bg-no-repeat bg-center" :style="{ backgroundImage: `url(${backgroundImage})` }"
        style="z-index: -1;" @click.prevent="clickImagen">
        <img class="absolute top-10 right-10 bg-transparent border-none p-0  w-10 cursor-pointer hover:scale-110 v-step-3"
            @click.prevent="pista" src="../../storage/app/public/images/hint.png" alt="" v-show="toggle === 0">
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
                        </svg>2.2K</span><span class="text-white inline-flex items-center leading-none text-sm"><svg
                            class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <path
                                d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                            </path>
                        </svg>11</span></div>

            </div>
        </div>
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


                <!--  <vue-draggable-resizable v-for="(item, index) in  items " :resizable="false"  :key="index" :ref="`draggable${index}`"
                    :class="['fixed', 'left-0', topClasses[index]]">
                    <img src="../../storage/app/public/images/juego5/key.png" alt="" class=" z-20 h-2/4 w-4/5 glow-green2">

                </vue-draggable-resizable> -->

                <vue-draggable-resizable class="fixed top-80 right-96" :draggable="false" ref="draggable0">
                    <img src="../../storage/app/public/images/juego5/key.png" alt="" class=" z-20 h-2/4 w-4/5 ">

                </vue-draggable-resizable>
                <vue-draggable-resizable class="fixed top-52 left-32" :draggable="false" ref="draggable1">
                    <img src="../../storage/app/public/images/juego5/key.png" alt="" class=" z-20 h-2/4 w-4/52">

                </vue-draggable-resizable>
                <vue-draggable-resizable ref="draggable" :resizable="false" :draggable="isDraggable"
                    class="fixed top-0 left-0" @dragging="onDragging">
                    <img src="../../storage/app/public/images/juego5/key.png" alt="" class=" z-20 h-2/4 w-4/5 glow-green2">
                </vue-draggable-resizable>

                <vue-draggable-resizable class="fixed top-40 right-2 left-80" :draggable="false" ref="draggable2">
                    <img src="../../storage/app/public/images/juego5/key.png" alt="" class=" z-20 h-2/4 w-4/5">

                </vue-draggable-resizable>
                <vue-draggable-resizable class="fixed top-50 right-12 left-70" :draggable="false" ref="draggable3">
                    <img src="../../storage/app/public/images/juego5/key.png" alt="" class=" z-20 h-2/4 w-4/5">

                </vue-draggable-resizable>

                <vue-draggable-resizable class="fixed top-60 left-90" :draggable="false" ref="draggable4">
                    <img src="../../storage/app/public/images/juego5/key.png" alt="" class=" z-20 h-2/4 w-4/5">

                </vue-draggable-resizable>
                <vue-draggable-resizable class="fixed top-90 left-96" :draggable="false" ref="draggable5">
                    <img src="../../storage/app/public/images/juego5/key.png" alt="" class=" z-20 h-2/4 w-4/5">

                </vue-draggable-resizable>
                <vue-draggable-resizable class="fixed top-40 right-44" :draggable="false" ref="draggable6">
                    <img src="../../storage/app/public/images/juego5/key.png" alt="" class=" z-20 h-2/4 w-4/5">

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
            hint_header: 'PISTA 1/1',
            hint_title: 'Askotan gauzak, ez ditugu ikusten lehenengo aldian',
            hint_content: 'Giltza beste gela batean ezkutatuta dago',
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
                { areaTop: 30, areaLeft: 39, areaWidth: 10, areaHeight: 22 },

            ],
            isDraggable: true,
            clicked: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            yourId: route().params,
            rotateValue: 0,  // Initial rotation value
            areaTopAbs: 0,
            areaLeftAbs: 0,
            areaWidthAbs: 0,
            areaHeightAbs: 0,
            played: false,
            played2: false,

            /*  items: ['draggable0', 'draggable1', 'draggable2', 'draggable3', 'draggable4', 'draggable5', 'draggable6', 'draggable7', 'draggable8', 'draggable9'],            topClasses: ['top-10', 'top-20', 'top-30', 'top-40', 'top-50', 'top-60', 'top-70', 'top-80', 'top-90', 'top-96'], */

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
        pista() {

            this.toggle = 4;
        },
        change_hint() {
            /* if (this.hint_header === "PISTA 1/2") {
                this.hint_header = 'PISTA 2/2';
                this.hint_title = 'Lekutan sartzeko erabiltzen dugu';
                this.hint_content = 'Beste gela bat egon ditzake hemen ezkutaturik...';
            } else {
                this.hint_header = 'PISTA 1/2';
                this.hint_title = 'Email-ak bidaltzen ditu';
                this.hint_content = 'Programatzeko erabiltzen dugun gailua egunero, baita jolasteko...';
            }
 */

        },
        onDragging(x, y) {
            // oh my fuckign god im losing my mind THE PARENT IS THE LOCKER ITS AREA IS RELATIVE TO AREA OF THE LOCKER
            // 0:09 nvm no tengo ni idea
            this.clicked = true;
            this.areaTopAbs = (this.objektuak[1].areaTop / 100) * window.innerHeight;
            this.areaLeftAbs = (this.objektuak[1].areaLeft / 100) * window.innerWidth;
            this.areaWidthAbs = (this.objektuak[1].areaWidth / 100) * window.innerWidth;
            this.areaHeightAbs = (this.objektuak[1].areaHeight / 100) * window.innerHeight;

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
                    setTimeout(() => {
                        window.location.href = route('menujuego', { id: route().params });

                    }, 3000);

                }

                this.isDraggable = false;
                this.imgSrc = "../../../storage/app/public/images/juego5/cerradura_abierta.png";

            } else {
                console.log("No");
            }
        },


        move(refName) {
            this.posX = 0
            this.posY = 0
            var changeXMag = 1
            var changeYMag = 1
            var changeX = changeXMag
            var changeY = changeYMag

            var interval = setInterval(() => {
                this.posX += changeX
                this.posY += changeY

                var isRight = this.posX >= window.innerWidth - this.$refs[refName].$el.clientWidth
                var isLeft = this.posX <= 0
                var isTop = this.posY <= 0
                var isBottom = this.posY >= window.innerHeight - this.$refs[refName].$el.clientHeight

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
                    this.$refs[refName].$el.style.transform = `translate(${this.posX}px, ${this.posY}px)`

                }
            }, 10)
        },


        getLlaveValor() {
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

                            if (!this.played2) {

                                setTimeout(() => {
                                    let audio = new Audio('../../storage/sounds/chase.mp3');
                                    audio.play();
                                }, 3000);
                                this.played2 = true;
                                this.mostrar("Que está pasando? Parece una reacción química, las llaves se han multiplicado! No sé cuál es la buena...")

                            }
                            /*   for (let i = 0; i < 5; i++) {
                                  console.log(`draggable${i}`);
                                  window.requestAnimationFrame(() => window.requestAnimationFrame(this.move(`draggable${i}`)));

                              } */

                            window.requestAnimationFrame(() => window.requestAnimationFrame(this.move('draggable')));
                            window.requestAnimationFrame(() => window.requestAnimationFrame(this.move('draggable0')));
                            window.requestAnimationFrame(() => window.requestAnimationFrame(this.move('draggable1')));
                            window.requestAnimationFrame(() => window.requestAnimationFrame(this.move('draggable2')));
                            window.requestAnimationFrame(() => window.requestAnimationFrame(this.move('draggable3')));
                            window.requestAnimationFrame(() => window.requestAnimationFrame(this.move('draggable4')));
                            window.requestAnimationFrame(() => window.requestAnimationFrame(this.move('draggable5')));
                            window.requestAnimationFrame(() => window.requestAnimationFrame(this.move('draggable6')));



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

