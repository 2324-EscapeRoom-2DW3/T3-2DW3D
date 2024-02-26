<template>
    <div id="fondoJuego" class="min-h-screen bg-center bg-no-repeat bg-cover fondoJuego"
        style="background-image: url('../../../storage/app/public/images/menu/fondo-menu.png'); ">
        <vue-countdown class="fixed top-0 left-0 right-0 flex items-start justify-center text-4xl text-white contador_letra mt-60" :time="(1 * min * 60 + sec) * 1000" @progress="updateTime"
            v-slot="{ days, hours, minutes, seconds }">
            {{ minutes }}:{{ seconds }}
        </vue-countdown>
        <div class="z-50 p-5 text-center text-white bg-black border-2 border-green-600 rounded middle glow-green"
            :class="dis">
            <p>{{ displayText }}</p>
        </div>
        <form ref="tiempoForm" method="POST" :action="routetiempo" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="_method" value="PUT">
            <input name="tiempo_min" type="hidden" :value="min">
            <input name="tiempo_sec" type="hidden" :value="sec">
            <input name="id_juego" type="hidden" :value="yourId">
        </form>
        <div class="p-6 mt-56 text-white bg-black rounded-md glow-green middle" v-show="isHidden === true">
            <input v-model="inputText"
                class="p-2 text-white bg-black border-none rounded-md focus:outline-none active:outline-none" type="text"
                placeholder="Kodea idatzi...">
        </div>
        <div class="flex items-center justify-center gap-32 pt-20 place-content-center">
            <div id="izq" class="" @click.prevent="cambiarFondoIzq">
                <img class="w-32" src="../../storage/app/public/images/menu/flecha-izquierda.png" alt="">
            </div>
            <!-- <a :href="route('juego4.index', { id: yourId })">
                <button
                    class="px-6 py-3 font-bold text-white bg-green-700 border-b-4 border-green-700 rounded shadow-xl opacity-75 hover:bg-green-400 hover:border-green-500">SARTU</button>
            </a> -->
            <button @click="redirigirAJuego"
  style="-webkit-box-reflect: below 0px linear-gradient(to bottom, rgba(0,0,0,0.0), rgba(0,0,0,0.4));"
  class="px-10 py-3 bg-gradient-to-r from-green-500 to-lime-500 rounded-full shadow-xl group-hover:shadow-2xl group-hover:shadow-green-600 shadow-green-600 uppercase font-serif tracking-widest relative overflow-hidden group text-transparent cursor-pointer z-10 after:absolute after:rounded-full after:bg-green-200 after:h-[85%] after:w-[95%] after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 hover:saturate-[1.15] active:saturate-[1.4]"
>
  Button
  <p
    class="absolute z-40 font-semibold bg-gradient-to-r from-green-700 to-lime-700 bg-clip-text text-transparent top-1/2 left-1/2 -translate-x-1/2 group-hover:-translate-y-full h-full w-full transition-all duration-300 -translate-y-[30%] tracking-widest"
  >
    SARTU
  </p>
  <p
    class="absolute z-40 top-1/2 left-1/2 bg-gradient-to-r from-green-800 to-lime-900 bg-clip-text text-transparent -translate-x-1/2 translate-y-full h-full w-full transition-all duration-300 group-hover:-translate-y-[40%] tracking-widest font-extrabold"
  >
  SARTU
  </p>
  <svg
    class="absolute w-full h-full scale-x-125 rotate-180 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-30 group-hover:animate-none animate-pulse group-hover:-translate-y-[45%] transition-all duration-300"
    viewBox="0 0 2400 800"
    xmlns:xlink="http://www.w3.org/1999/xlink"
    version="1.1"
    xmlns="http://www.w3.org/2000/svg"
  >
    <defs>
      <linearGradient id="sssurf-grad" y2="100%" x2="50%" y1="0%" x1="50%">
        <stop
          offset="0%"
          stop-opacity="1"
          stop-color="hsl(120, 99%, 67%)"
        ></stop>
        <stop
          offset="100%"
          stop-opacity="1"
          stop-color="hsl(120, 73%, 52%)"
        ></stop>
      </linearGradient>
    </defs>
    <g transform="matrix(1,0,0,1,0,-91.0877685546875)" fill="url(#sssurf-grad)">
      <path
        opacity="0.05"
        transform="matrix(1,0,0,1,0,35)"
        d="M 0 305.9828838196134 Q 227.6031525693441 450 600 302.17553022897005 Q 1010.7738828515054 450 1200 343.3024459932802 Q 1379.4406250195766 450 1800 320.38902780838214 Q 2153.573162029817 450 2400 314.38564046970816 L 2400 800 L 0 800 L 0 340.3112176762882 Z"
      ></path>
      <path
        opacity="0.21"
        transform="matrix(1,0,0,1,0,70)"
        d="M 0 305.9828838196134 Q 227.6031525693441 450 600 302.17553022897005 Q 1010.7738828515054 450 1200 343.3024459932802 Q 1379.4406250195766 450 1800 320.38902780838214 Q 2153.573162029817 450 2400 314.38564046970816 L 2400 800 L 0 800 L 0 340.3112176762882 Z"
      ></path>
      <path
        opacity="0.37"
        transform="matrix(1,0,0,1,0,105)"
        d="M 0 305.9828838196134 Q 227.6031525693441 450 600 302.17553022897005 Q 1010.7738828515054 450 1200 343.3024459932802 Q 1379.4406250195766 450 1800 320.38902780838214 Q 2153.573162029817 450 2400 314.38564046970816 L 2400 800 L 0 800 L 0 340.3112176762882 Z"
      ></path>
      <path
        opacity="0.53"
        transform="matrix(1,0,0,1,0,140)"
        d="M 0 305.9828838196134 Q 227.6031525693441 450 600 302.17553022897005 Q 1010.7738828515054 450 1200 343.3024459932802 Q 1379.4406250195766 450 1800 320.38902780838214 Q 2153.573162029817 450 2400 314.38564046970816 L 2400 800 L 0 800 L 0 340.3112176762882 Z"
      ></path>
      <path
        opacity="0.68"
        transform="matrix(1,0,0,1,0,175)"
        d="M 0 305.9828838196134 Q 227.6031525693441 450 600 302.17553022897005 Q 1010.7738828515054 450 1200 343.3024459932802 Q 1379.4406250195766 450 1800 320.38902780838214 Q 2153.573162029817 450 2400 314.38564046970816 L 2400 800 L 0 800 L 0 340.3112176762882 Z"
      ></path>
      <path
        opacity="0.84"
        transform="matrix(1,0,0,1,0,210)"
        d="M 0 305.9828838196134 Q 227.6031525693441 450 600 302.17553022897005 Q 1010.7738828515054 450 1200 343.3024459932802 Q 1379.4406250195766 450 1800 320.38902780838214 Q 2153.573162029817 450 2400 314.38564046970816 L 2400 800 L 0 800 L 0 340.3112176762882 Z"
      ></path>
      <path
        opacity="1"
        transform="matrix(1,0,0,1,0,245)"
        d="M 0 305.9828838196134 Q 227.6031525693441 450 600 302.17553022897005 Q 1010.7738828515054 450 1200 343.3024459932802 Q 1379.4406250195766 450 1800 320.38902780838214 Q 2153.573162029817 450 2400 314.38564046970816 L 2400 800 L 0 800 L 0 340.3112176762882 Z"
      ></path>
    </g>
  </svg>
  <svg
    class="absolute w-full h-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-[30%] group-hover:-translate-y-[33%] group-hover:scale-95 transition-all duration-500 z-40 fill-green-500"
    viewBox="0 0 1440 320"
    xmlns="http://www.w3.org/2000/svg"
  >
    <path
      d="M0,288L9.2,250.7C18.5,213,37,139,55,133.3C73.8,128,92,192,111,224C129.2,256,148,256,166,256C184.6,256,203,256,222,250.7C240,245,258,235,277,213.3C295.4,192,314,160,332,170.7C350.8,181,369,235,388,229.3C406.2,224,425,160,443,122.7C461.5,85,480,75,498,74.7C516.9,75,535,85,554,101.3C572.3,117,591,139,609,170.7C627.7,203,646,245,665,256C683.1,267,702,245,720,245.3C738.5,245,757,267,775,266.7C793.8,267,812,245,831,234.7C849.2,224,868,224,886,218.7C904.6,213,923,203,942,170.7C960,139,978,85,997,53.3C1015.4,21,1034,11,1052,48C1070.8,85,1089,171,1108,197.3C1126.2,224,1145,192,1163,197.3C1181.5,203,1200,245,1218,224C1236.9,203,1255,117,1274,106.7C1292.3,96,1311,160,1329,170.7C1347.7,181,1366,139,1385,128C1403.1,117,1422,139,1431,149.3L1440,160L1440,320L1430.8,320C1421.5,320,1403,320,1385,320C1366.2,320,1348,320,1329,320C1310.8,320,1292,320,1274,320C1255.4,320,1237,320,1218,320C1200,320,1182,320,1163,320C1144.6,320,1126,320,1108,320C1089.2,320,1071,320,1052,320C1033.8,320,1015,320,997,320C978.5,320,960,320,942,320C923.1,320,905,320,886,320C867.7,320,849,320,831,320C812.3,320,794,320,775,320C756.9,320,738,320,720,320C701.5,320,683,320,665,320C646.2,320,628,320,609,320C590.8,320,572,320,554,320C535.4,320,517,320,498,320C480,320,462,320,443,320C424.6,320,406,320,388,320C369.2,320,351,320,332,320C313.8,320,295,320,277,320C258.5,320,240,320,222,320C203.1,320,185,320,166,320C147.7,320,129,320,111,320C92.3,320,74,320,55,320C36.9,320,18,320,9,320L0,320Z"
      fill-opacity="1"
    ></path>
  </svg>
</button>

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
            displayText: '',

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
            inputText: '',
            dis: "hidden",


        };
    },
    methods: {
        mostrar(text) {
            this.displayText = text;
            setTimeout(() => {
                this.dis = "dissapear_text";
                setTimeout(() => {
                    this.dis = "hidden";
                }, 5000);
            }, 100);
        },
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
                window.location.href = route('juego2.index', { id: this.yourId }); // Reemplaza 'juego2' con la ruta correcta
                    break;
                case -2:
                window.location.href = route('juego1.index', { id: this.yourId });  // Reemplaza 'juego3' con la ruta correcta
                    break;
                case 1:
                window.location.href = route('juego6.index', { id: this.yourId });  // Reemplaza 'juego3' con la ruta correcta
                    break;
                case 2:
                window.location.href = route('juego4.index', { id: this.yourId });  // Reemplaza 'juego5' con la ruta correcta
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
            if (newVal.toUpperCase() === 'DTZ') {
                window.location.href = route('juego5.index', { id: this.yourId });  // Reemplaza 'juego1' con la ruta correcta

            }
        }
    }

}




</script>

