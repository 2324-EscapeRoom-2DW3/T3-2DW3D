<template>
    <div id="fondoJuego" class="fondoJuego min-h-screen bg-cover bg-no-repeat bg-center"
        style="background-image: url('../../storage/app/public/images/menu/fondo-menu.png'); ">
        <div class="flex place-content-center gap-32">
            <div id="izq" class="pt-32" @click.prevent="cambiarFondoIzq">
                <img class="w-32" src="../../storage/app/public/images/menu/flecha-izquierda.png" alt="">
            </div>
             <div id="dr" class="pt-32" @click.prevent="cambiarFondoDrc">
                <img class="w-32" src="../../storage/app/public/images/menu/flecha-derecha.png" alt="">
            </div>

        </div>

        <div class="flex place-content-center pt-16 pr-2">

            <button  @click="redirigirAJuego" class="opacity-75 shadow-xl bg-green-700 hover:bg-green-400 text-white font-bold py-3 px-6 border-b-4 border-green-700 hover:border-green-500 rounded">SARTU</button>

        </div>

    </div>
</template>

<script>
import route from '../../vendor/tightenco/ziggy';

export default {
    data() {
        return {
            contador: 0,
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

        cambiarFondo(){
            let fondoTemplate = document.getElementById("fondoJuego");

            switch (this.contador){
                case 0:
                fondoTemplate.style.backgroundImage = "url('../../storage/app/public/images/menu/fondo-menu.png')";
                break;
                case 1:
                fondoTemplate.style.backgroundImage = "url('../../storage/app/public/images/menu/fondo-menu-derecha.png')";
                break;
                case 2:
                fondoTemplate.style.backgroundImage = "url('../../storage/app/public/images/menu/fondo-menu-derecha+.png')";
                break;
                case -1:
                fondoTemplate.style.backgroundImage = "url('../../storage/app/public/images/menu/fondo-menu-izquierda.png')";
                break;
                case -2:
                fondoTemplate.style.backgroundImage = "url('../../storage/app/public/images/menu/fondo-menu-izquierda+.png')";
                break;
            }


        },
        redirigirAJuego() {
            let rutaJuego;
         switch (this.contador) {
                case 0:
                    rutaJuego = route('juego5');  // Reemplaza 'juego1' con la ruta correcta
                    break;
                case -1:
                    rutaJuego = route('juego2');  // Reemplaza 'juego2' con la ruta correcta
                    break;
                case -2:
                    rutaJuego = route('juego1.index');  // Reemplaza 'juego3' con la ruta correcta
                    break;
                case 1:
                    rutaJuego = route('juego3');  // Reemplaza 'juego4' con la ruta correcta
                    break;
                case 2:
                    rutaJuego = route('juego4');  // Reemplaza 'juego5' con la ruta correcta
                    break;
            }

            window.location.href = rutaJuego;
        }




    },

    mounted() {
        let fondoTemplate = document.getElementById("fondoJuego");
        fondoTemplate.style.backgroundImage = "url('../../storage/app/public/images/menu/fondo-menu-derecha.png')";
        fondoTemplate.style.backgroundImage = "url('../../storage/app/public/images/menu/fondo-menu-derecha+.png')";
        fondoTemplate.style.backgroundImage = "url('../../storage/app/public/images/menu/fondo-menu-izquierda.png')";
        fondoTemplate.style.backgroundImage = "url('../../storage/app/public/images/menu/fondo-menu-izquierda+.png')";
        fondoTemplate.style.backgroundImage = "url('../../storage/app/public/images/menu/fondo-menu.png')";
    }

}




</script>

