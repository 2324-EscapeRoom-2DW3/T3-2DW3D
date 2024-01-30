<template>
    <div class="h-screen w-full bg-full bg-no-repeat bg-center" :style="{ backgroundImage: `url(${backgroundImage})` }"
        style="z-index: -1;" @click.prevent="clickImagen">
     

        <div class="middle glow-green text-white border-2 border-green-600 bg-black p-5 rounded text-center z-50"
            :class="dis">
            <p>{{ displayText }}</p>
        </div>
        <form ref="llaveForm" method="POST" :action="route" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">

            <input type="hidden" name="_method" value="PUT">

            <input name="id_juego" type="hidden" :value="yourId">
        </form>
        <img class="absolute top-10 right-10 bg-transparent border-none p-0  w-12 cursor-pointer  hover:scale-110"
            @click="irte" src="../../storage/app/public/images/exit.png" alt="">

        <!--  <div style="position: absolute;
            top: 28vh;
            left: 41.9%;
            width: 4%;
            height: 45vh;
            background-color:#fff;
            opacity: 0.5;">
        </div>
        <div style="position: absolute;
            top: 28vh;
            left: 46%;
            width: 4%;
            height: 45vh;
            background-color:#ff1e1e;
            opacity: 0.5;">
        </div>
        <div style="position: absolute;
            top: 28vh;
            left: 50.1%;
            width: 4%;
            height: 45vh;
            background-color:#e9ff1e;
            opacity: 0.5;">
        </div>
        <div style="position: absolute;
            top: 28vh;
            left: 54.35%;
            width: 4%;
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
            backgroundImage: '../../../../storage/app/public/images/juego4/armario.png',
            dis: "hidden",
            displayText: '',
            disappearTimeout: null,
            hideTimeout: null,
            toggle: 0,
            openImage: new Image(),
            objektuak: [
                // Ordenador
                { areaTop: 28, areaLeft: 41.9, areaWidth: 4, areaHeight: 45 },
                { areaTop: 28, areaLeft: 46, areaWidth: 4, areaHeight: 45 },
                { areaTop: 28, areaLeft: 50.1, areaWidth: 4, areaHeight: 45 },
                { areaTop: 28, areaLeft: 54.35, areaWidth: 4, areaHeight: 45 },
            ],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            yourId: route().params,
            route: document.querySelector('#armario').dataset.route,


        };
    },
    mounted() {
        this.openImage.src =
            "../../../../storage/app/public/images/juego4/abierta.png";

    },

    methods: {
        irte() {
            if (window.confirm('Estas seguro que quieres irte?')) {
                window.location.href = route('juego4.index', { id: route().params });
            }
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
                        this.mostrar("Está cerrada con llave...");
                    }
                    else if (i == 1) {
                        this.mostrar("Cerrada...");

                    } else if (i == 2) {
                        this.mostrar("Cerrada con llave también...");


                    } else if (i == 3) {
                        this.backgroundImage = this.openImage.src;

                        this.mostrar("!!!!");
                        // Prevent the default form submission behavior
                        event.preventDefault();

                        // Get the form data
                        let formData = new FormData(this.$refs.llaveForm);

                        // Send a POST request to the server
                        axios.post(this.$refs.llaveForm.action, formData)
                            .then(response => {
                                // Handle the response
                                console.log(response);
                            })
                            .catch(error => {
                                // Handle the error
                                console.log(error);
                                window.alert("¡Has encontrado una llave!");

                            });

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
