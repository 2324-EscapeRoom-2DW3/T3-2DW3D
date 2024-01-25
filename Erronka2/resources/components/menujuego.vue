<template>

    <div id="fondoJuego" class="fondoJuego min-h-screen bg-cover bg-no-repeat bg-center"
        style="background-image: url('../../../storage/app/public/images/menu/fondo-menu.png'); ">
        <vue-countdown class="flex items-center justify-center text-white text-5xl" :time=" 1 * 60 * 60 * 1000" v-slot="{ days, hours, minutes, seconds }">
            {{ minutes }}m, {{ seconds }}s.
        </vue-countdown>
        <div class="flex place-content-center gap-32">
            <div id="izq" class="pt-32" @click.prevent="cambiarFondoIzq">
                <img class="w-32" src="../../storage/app/public/images/menu/flecha-izquierda.png" alt="">
            </div>
            <div id="dr" class="pt-32" @click.prevent="cambiarFondoDrc">
                <img class="w-32" src="../../storage/app/public/images/menu/flecha-derecha.png" alt="">
            </div>

        </div>

        <div class="flex place-content-center pt-16 pr-2">
            <a :href="route('juego4.index', { id: yourId })">
                <button
                    class="opacity-75 shadow-xl bg-green-700 hover:bg-green-400 text-white font-bold py-3 px-6 border-b-4 border-green-700 hover:border-green-500 rounded">SARTU</button>
            </a>
        </div>

    </div>
</template>

<script>
import route from '../../vendor/tightenco/ziggy';
import VueCountdown from '@chenfengyuan/vue-countdown';

export default {
    data() {
        return {
            contador: 0,
            yourId: route().params,
            openImage: [new Image(), new Image(), new Image(), new Image(), new Image()],
        };
    },
    methods: {

        cambiarFondoIzq() {
            console.log("izq");
            this.contador--;
            this.cambiarFondo();
        },

        cambiarFondoDrc() {
            console.log("dr");
            this.contador++;
            this.cambiarFondo();
        },

        cambiarFondo() {
            let fondoTemplate = document.getElementById("fondoJuego");

            switch (this.contador) {
                case 0:
                    fondoTemplate.style.backgroundImage = "url('" + this.openImage[4].src + "')";
                    break;
                case 1:
                    fondoTemplate.style.backgroundImage = "url('" + this.openImage[0].src + "')";
                    break;
                case 2:
                    fondoTemplate.style.backgroundImage = "url('" + this.openImage[1].src + "')";
                    break;
                case -1:
                    fondoTemplate.style.backgroundImage = "url('" + this.openImage[2].src + "')";
                    break;
                case -2:
                    fondoTemplate.style.backgroundImage = "url('" + this.openImage[3].src + "')";
                    break;
            }


        }

    },

    mounted() {
        // ???????????????
        /*   let fondoTemplate = document.getElementById("fondoJuego");
          fondoTemplate.style.backgroundImage = "url('../../../storage/app/public/images/menu/fondo-menu-derecha.png')";
          fondoTemplate.style.backgroundImage = "url('../../../storage/app/public/images/menu/fondo-menu-derecha+.png')";
          fondoTemplate.style.backgroundImage = "url('../../../storage/app/public/images/menu/fondo-menu-izquierda.png')";
          fondoTemplate.style.backgroundImage = "url('../../../storage/app/public/images/menu/fondo-menu-izquierda+.png')";
          fondoTemplate.style.backgroundImage = "url('../../../storage/app/public/images/menu/fondo-menu.png')"; */

        this.openImage[0].src = "../../../storage/app/public/images/menu/fondo-menu-derecha.png";
        this.openImage[1].src = "../../../storage/app/public/images/menu/fondo-menu-derecha+.png";
        this.openImage[2].src = "../../../storage/app/public/images/menu/fondo-menu-izquierda.png";
        this.openImage[3].src = "../../../storage/app/public/images/menu/fondo-menu-izquierda+.png";
        this.openImage[4].src = "../../../storage/app/public/images/menu/fondo-menu.png";


    }

}




</script>

