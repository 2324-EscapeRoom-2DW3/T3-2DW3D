<template>
   <!-- <div id="fondoJuego" class="relative min-h-screen flex items-center justify-center bg-cover bg-no-repeat bg-center" style="background-image: url('../../storage/app/public/images/juego2/fondo.png');">
    <button class="botoi fixed  transform  bg-transparent border-none p-0 focus:outline-none" @click.prevent="aparecerPizarra">
        <img id="pizarra" src="../../storage/app/public/images/juego2/pizarra-rota.png" alt="Botón con imagen" class="w-96 opacity-50 h-32 ">
    </button> -->
<!-- </div> -->
<img id="imagenClickable" @click.prevent="aparecerPizarra" src="../../storage/app/public/images/juego2/fondo.png" alt="" class="fondo">
    <!-- <div class="pizarra">

    </div> -->

</template>

<script>

export default {
    data() {
        return {

        };
    },
    methods: {

        aparecerPizarra() {
            // document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('imagenClickable').addEventListener('click', function(event) {
        // Obtén las coordenadas del clic en relación con la imagen
        var posX = event.clientX - event.target.offsetLeft;
        var posY = event.clientY - event.target.offsetTop;

        // Define las coordenadas de la parte específica que quieres hacer clic
        var areaTop = 46;     // 40% del alto de la imagen
        var areaLeft = 40;    // 66% del ancho de la imagen
        var areaWidth = 23;    // 9% del ancho de la imagen
        var areaHeight = 13;  // 27% del alto de la imagen

        // Calcula las coordenadas absolutas de la posición específica
        var areaTopAbs = (areaTop / 100) * event.target.height;
        var areaLeftAbs = (areaLeft / 100) * event.target.width;
        var areaWidthAbs = (areaWidth / 100) * event.target.width;
        var areaHeightAbs = (areaHeight / 100) * event.target.height;

        // Verifica si el clic está dentro de la parte específica
        if (posY >= areaTopAbs && posY <= areaTopAbs + areaHeightAbs &&
            posX >= areaLeftAbs && posX <= areaLeftAbs + areaWidthAbs) {
            // Realiza la acción deseada
            console.log('¡Has hecho clic en la parte específica!');
        }
    })
}
        },


        // cambiarFondo(){
        //     let fondoTemplate = document.getElementById("fondoJuego");

        //     switch (this.contador){
        //         case 0:
        //         fondoTemplate.style.backgroundImage = "url('../../public/storage/images/menu/fondo-menu.png')";
        //         break;
        //         case 1:
        //         fondoTemplate.style.backgroundImage = "url('../../public/storage/images/menu/fondo-menu-derecha.png')";
        //         break;
        //         case 2:
        //         fondoTemplate.style.backgroundImage = "url('../../public/storage/images/menu/fondo-menu-derecha+.png')";
        //         break;
        //         case -1:
        //         fondoTemplate.style.backgroundImage = "url('../../public/storage/images/menu/fondo-menu-izquierda.png')";
        //         break;
        //         case -2:
        //         fondoTemplate.style.backgroundImage = "url('../../public/storage/images/menu/fondo-menu-izquierda+.png')";
        //         break;
        //     }


        // }

    }



</script>

