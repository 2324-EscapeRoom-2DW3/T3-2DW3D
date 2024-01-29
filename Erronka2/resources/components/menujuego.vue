<template>
    <div id="fondoJuego" class="fondoJuego min-h-screen bg-cover bg-no-repeat bg-center"
        style="background-image: url('../../../storage/app/public/images/menu/fondo-menu.png'); ">
        <vue-countdown class="middle text-white text-4xl" :time="(1 * min * 60 + sec) * 1000" @progress="updateTime"
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
        <div class="bg-black glow-green text-white mt-56 p-6 rounded-md middle" v-show="isHidden === true">
            <input v-model="inputText" class="bg-black border-none focus:outline-none active:outline-none text-white p-2 rounded-md" type="text"
                placeholder="Kodea idatzi...">
        </div>
        <div class="flex place-content-center justify-center items-center gap-32 pt-20">
            <div id="izq" class="" @click.prevent="cambiarFondoIzq">
                <img class="w-32" src="../../storage/app/public/images/menu/flecha-izquierda.png" alt="">
            </div>
            <!-- <a :href="route('juego4.index', { id: yourId })">
                <button
                    class="opacity-75 shadow-xl bg-green-700 hover:bg-green-400 text-white font-bold py-3 px-6 border-b-4 border-green-700 hover:border-green-500 rounded">SARTU</button>
            </a> -->
            <button @click="redirigirAJuego"
                class="shadow-xl bg-green-700 hover:bg-green-400 text-white font-bold py-12 px-6 border-b-4 border-green-700 hover:border-green-500 rounded  place-content-center h-2">SARTU</button>
            <div id="dr" class="" @click.prevent="cambiarFondoDrc">
                <img class="w-32" src="../../storage/app/public/images/menu/flecha-derecha.png" alt="">
            </div>

        </div>



    </div>
</template>

<script>
import route from '../../vendor/tightenco/ziggy';
import VueCountdown from '@chenfengyuan/vue-countdown';
/* import { useTimeStore } from './timeStore';
 */
export default {
    /* setup() {
        const timeStore = useTimeStore();

        const updateTime = ({ totalMinutes }) => {
            const minutes = Math.floor(totalMinutes / 1000 / 60);
            const seconds = Math.floor(totalMinutes / 1000 % 60);
            timeStore.minutes = minutes;
            timeStore.seconds = seconds;
        };

        return {
            updateTime
        };
    }, */
    data() {
        return {
            routetiempo: document.querySelector('#menujuego').dataset.routetiempo,
            routetiempovalor: document.querySelector('#menujuego').dataset.routetiempoval,
            contador: 0,
            yourId: route().params,
            openImage: [new Image(), new Image(), new Image(), new Image(), new Image()],
            empezado: null,
            tiempoValor: null,
            yourId: route().params,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            min: 29,
            sec: 60,
            pendingMin: null,
            pendingSec: null,
            isHidden: false,
            inputText: ''

        };
    },
    methods: {
        updateTime({ days, hours, minutes, seconds }) {
            this.pendingMin = minutes;
            this.pendingSec = seconds; // Previene el render lag al trigger-ear el updateTiempo_db() cada segundo en axios.post()
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
                    this.isHidden = false;

                    break;
                case 1:
                    fondoTemplate.style.backgroundImage = "url('" + this.openImage[0].src + "')";
                    this.isHidden = false;

                    break;
                case 2:
                    fondoTemplate.style.backgroundImage = "url('" + this.openImage[1].src + "')";
                    this.isHidden = false;

                    break;
                case -1:
                    fondoTemplate.style.backgroundImage = "url('" + this.openImage[2].src + "')";
                    this.isHidden = false;

                    break;
                case -2:
                    fondoTemplate.style.backgroundImage = "url('" + this.openImage[3].src + "')";
                    this.isHidden = false;

                    break;
            }




        },
        redirigirAJuego() {
            let rutaJuego;
            switch (this.contador) {
                case 0:
                    this.isHidden = true;

/*                     rutaJuego = route('juego5.index', { id: this.yourId });  // Reemplaza 'juego1' con la ruta correcta
 */                    break;
                case -1:
                    rutaJuego = route('juego2');  // Reemplaza 'juego2' con la ruta correcta
                    break;
                case -2:
                    rutaJuego = route('juego1.index', { id: this.yourId });  // Reemplaza 'juego3' con la ruta correcta
                    break;
                case 1:
                    rutaJuego = route('juego3');  // Reemplaza 'juego4' con la ruta correcta
                    break;
                case 2:
                    rutaJuego = route('juego4.index', { id: this.yourId });  // Reemplaza 'juego5' con la ruta correcta
                    break;
            }

/*             window.location.href = rutaJuego;
 */        }

    },

    mounted() {
        this.getTiempo();
        this.empezado = 0;
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


    },
    watch: {
    inputText(newVal) {
        if (newVal.toUpperCase() === 'DTZK') {
            window.location.href = route('juego5.index', { id: this.yourId });  // Reemplaza 'juego1' con la ruta correcta

        }
    }
  }

}




</script>

