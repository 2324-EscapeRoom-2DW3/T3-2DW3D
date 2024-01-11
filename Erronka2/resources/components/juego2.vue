<template>
    <!-- <div id="fondoJuego" class="min-h-screen bg-cover bg-no-repeat bg-center"
        style="background-image: url('../../storage/app/public/images/menu/fondo-menu.png');">
        <div class="flex place-content-center gap-32">
            <div id="izq" class="pt-32" @click.prevent="cambiarFondoIzq">
                <img class="w-32" src="../../storage/app/public/images/menu/flecha-izquierda.png" alt="">
            </div>
            <div id="dr" class="pt-32" @click.prevent="cambiarFondoDrc">
                <img class="w-32" src="../../storage/app/public/images/menu/flecha-derecha.png" alt="">
            </div>

        </div>

        <div class="flex place-content-center pt-16 pr-2">
            <button class="opacity-75 shadow-xl bg-green-700 hover:bg-green-400 text-white font-bold py-3 px-6 border-b-4 border-green-700 hover:border-green-500 rounded">SARTU</button>
        </div>

    </div> -->
</template>

<script>

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
                fondoTemplate.style.backgroundImage = "url('../../public/storage/images/menu/fondo-menu.png')";
                break;
                case 1:
                fondoTemplate.style.backgroundImage = "url('../../public/storage/images/menu/fondo-menu-derecha.png')";
                break;
                case 2:
                fondoTemplate.style.backgroundImage = "url('../../public/storage/images/menu/fondo-menu-derecha+.png')";
                break;
                case -1:
                fondoTemplate.style.backgroundImage = "url('../../public/storage/images/menu/fondo-menu-izquierda.png')";
                break;
                case -2:
                fondoTemplate.style.backgroundImage = "url('../../public/storage/images/menu/fondo-menu-izquierda+.png')";
                break;
            }


        }

    }
}


</script>

