<template>
   <!-- <div id="fondoJuego" class="relative min-h-screen flex items-center justify-center bg-cover bg-no-repeat bg-center" style="background-image: url('../../storage/app/public/images/juego2/fondo.png');">
    <button class="botoi fixed  transform  bg-transparent border-none p-0 focus:outline-none" @click.prevent="aparecerPizarra">
        <img id="pizarra" src="../../storage/app/public/images/juego2/pizarra-rota.png" alt="Botón con imagen" class="w-96 opacity-50 h-32 ">
    </button> -->
<!-- </div> -->
<img id="fondo" @click.prevent="aparecerPizarra" src="../../storage/app/public/images/juego2/fondo.png" alt="" class="fondo">

<img id="close" class="absolute top-10 right-10 bg-transparent border-none p-0  w-10 " @click="close" src="../../storage/app/public/images/juego2/close.png" alt="">


<img id="pizarra-rota" src="../../storage/app/public/images/juego2/pizarra-rota.png" alt="" class="pizarra-rota">
<div id="texto-pizarra" class="texto-pizarra absolute flex flex-wrap text-white gap-5 text-xl">
    <p class="">1-Diferenciación de enterobacterias en base a la fermentación de hidratos de carbono y a la producción de ácido sulfhídrico</p>

    <p class="">2-Aislamiento y recuento selectivo de Clostridium perfringens y sus esporas. Colonias amarillo-verdosas.</p>

    <p class="">3-Aislamiento  y recuento de Clostridium perfringens en agua, alimentos…</p>
</div>
<!-- <div class="pizarra">

</div> -->

</template>

<script>

export default {
    data() {
        return {

        }
    },
    methods: {
        aparecerPizarra(event) {
            // document.addEventListener('DOMContentLoaded', function() {
            // Obtén las coordenadas del clic en relación con la imagen
            var posX = event.clientX - event.target.offsetLeft;
            var posY = event.clientY - event.target.offsetTop;

            // Define las coordenadas de la parte específica que quieres hacer clic
            var areaTop = 30;     // 40% del alto de la imagen
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
                var pizarra = document.getElementById("pizarra-rota");
                var fondo = document.getElementById("fondo");
                var textoPizarra = document.getElementById("texto-pizarra");
                var close = document.getElementById("close");



                console.log('¡Has hecho clic en la parte específica!');

                pizarra.style.display = "block";
                textoPizarra.style.visibility = "visible";
                close.style.visibility = "visible";


                // textoPizarra.style.display = "block";
                fondo.style.filter = "blur(5px)";
            }
        },

        close(){
            var close = document.getElementById("close");
            var pizarra = document.getElementById("pizarra-rota");
            var textoPizarra = document.getElementById("texto-pizarra");

            close.style.visibility = "hidden";
            pizarra.style.display = "none";
            textoPizarra.style.visibility = "hidden";
            fondo.style.filter = "blur(0px)";


        },

        changeValue(delta, inputId) {
            if (!this.inputsBlocked) {
                var inputField = document.getElementById(inputId);

                if (inputField) {
                    var currentValue =
                        inputField.value.charCodeAt(0) || "A".charCodeAt(0) - 1;
                    var newValue = String.fromCharCode(
                        ((currentValue - "A".charCodeAt(0) + delta + 26) % 26) +
                            "A".charCodeAt(0)
                    );

                    inputField.value = newValue;
                } else {
                    console.error("Elemento con ID", inputId, "no encontrado");
                }
            }
        },

        checkResult() {
            var resultElement = document.getElementById("text");
            this.result1 = document.getElementById("letterInput1").value;
            this.result2 = document.getElementById("letterInput2").value;
            this.result3 = document.getElementById("letterInput3").value;

            if (
                this.result1 === "B" &&
                this.result2 === "C" &&
                this.result3 === "P"
            ) {
                document.querySelector(".fondo").style.backgroundImage =
                    "url('/T1-2DW3D/energiaArriskuan/public/images/candadoAbierto.png')";
                resultElement.innerHTML = "Zuzen! Sotora sar zaitezke orain.";
                this.resetValues();
                this.inputsBlocked = true;
                this.verificationButtonBlocked = true;
                window.location.href = route("prueba3.update", this.partida);
            } else {
                this.vibration = true;
                setTimeout(() => {
                    this.vibration = false;
                }, 500);
            }
        },



        resetValues() {
            this.result1 = "B";
            this.result2 = "C";
            this.result3 = "P";
        },
    },


}



</script>

