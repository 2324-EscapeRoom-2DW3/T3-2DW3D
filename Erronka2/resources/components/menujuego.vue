<template>
    <div id="fondoJuego" class="min-h-screen bg-cover bg-no-repeat bg-center"
        style="background-image: url('../../public/storage/images/menu/fondo-menu.png');">
        <div class="flex place-content-center gap-32">
            <div id="izq" class="pt-32" @click.prevent="cambiarFondoIzq">
                <img class="w-32" src="../../public/storage/images/menu/flecha-izquierda.png" alt="">
            </div>
            <div id="dr" class="pt-32" @click.prevent="cambiarFondoDrc">
                <img class="w-32" src="../../public/storage/images/menu/flecha-derecha.png" alt="">
            </div>
        </div>
    </div>
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


// console.log(document.getElementById("izq"));
//     document.getElementById("izq").addEventListener("click", function() {
//         console.log("izq");

//         // Ahora que el script se ejecuta después de que todo el DOM se ha cargado,
//         // deberías poder acceder al body directamente sin problemas
//         document.body.style.backgroundImage = "url('../../public/storage/images/menu/fondo-menu-izquierda.png')";
//     });

</script>

