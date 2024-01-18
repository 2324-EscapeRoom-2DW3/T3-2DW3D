<template>
   <!-- <div id="fondoJuego" class="relative min-h-screen flex items-center justify-center bg-cover bg-no-repeat bg-center" style="background-image: url('../../storage/app/public/images/juego2/fondo.png');">
    <button class="botoi fixed  transform  bg-transparent border-none p-0 focus:outline-none" @click.prevent="aparecerPizarra">
        <img id="pizarra" src="../../storage/app/public/images/juego2/pizarra-rota.png" alt="Botón con imagen" class="w-96 opacity-50 h-32 ">
    </button> -->
<!-- </div> -->
<img id="fondo" @click.prevent="clickFondo"  src="../../storage/app/public/images/juego2/fondo.png" alt="" class="fondo">





<img id="pizarra-rota" src="../../storage/app/public/images/juego2/pizarra-rota.png" alt="" class="pizarra-rota">
<img id="botella" src="../../storage/app/public/images/juego2/botellas.png" alt="" class="botella">
<img id="close" class="absolute top-10 right-10 bg-transparent border-none p-0  w-10 hidden" @click="close" src="../../storage/app/public/images/juego2/close.png" alt="">

<div class="fondo" :class="{ vibrating: vibration }">
            <div class="input-container">
                <div class="number-input">
                    <button
                        class="btn-decrement b-botoi"
                        @click="changeValue(-1, 'letterInput1')"
                        :disabled="inputsBlocked"
                    >
                        &#8595;
                    </button>
                    <input
                        type="text"
                        class="input-field"
                        id="letterInput1"
                        :value="result1"
                        readonly
                    />
                    <button
                        class="btn-increment b-botoi"
                        @click="changeValue(1, 'letterInput1')"
                        :disabled="inputsBlocked"
                    >
                        &#8593;
                    </button>
                </div>

                <div class="number-input">
                    <button
                        class="btn-decrement b-botoi"
                        @click="changeValue(-1, 'letterInput2')"
                        :disabled="inputsBlocked"
                    >
                        &#8595;
                    </button>
                    <input
                        type="text"
                        class="input-field"
                        id="letterInput2"
                        :value="result2"
                        readonly
                    />

                    <button
                        class="btn-increment b-botoi"
                        @click="changeValue(1, 'letterInput2')"
                        :disabled="inputsBlocked"
                    >
                        &#8593;
                    </button>
                </div>

                <div class="number-input">
                    <button
                        class="btn-decrement b-botoi"
                        @click="changeValue(-1, 'letterInput3')"
                        :disabled="inputsBlocked"
                    >
                        &#8595;
                    </button>

                    <input
                        type="text"
                        class="input-field"
                        id="letterInput3"
                        :value="result3"
                        readonly
                    />

                    <button
                        class="btn-increment b-botoi"
                        @click="changeValue(1, 'letterInput3')"
                        :disabled="inputsBlocked"
                    >
                        &#8593;
                    </button>

                </div>
            </div>

            <div class="containerBoton">
                <button
                    @click="checkResult"
                    class="verify-btn"
                    :disabled="verificationButtonBlocked"
                >
                    ABRIR
                </button>
            </div>
        </div>

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
            codeInput: 'ABC',
          currentIndex: 0,

            objektuak: [
                // * Arbela
                { areaTop: 30, areaLeft: 40, areaWidth: 23, areaHeight: 13 },
                // * Botilak
                { areaTop: 40, areaLeft: 25, areaWidth: 7, areaHeight: 13 },
            ],
        }
    },
    methods: {

        moveLeft() {
          this.currentIndex = (this.currentIndex - 1 + 26) % 26; // Va de Z a A
          this.updateInput();
        },
        moveRight() {
          this.currentIndex = (this.currentIndex + 1) % 26; // Va de A a Z
          this.updateInput();
        },
        updateInput() {
          const letter = String.fromCharCode(65 + this.currentIndex); // 65 es el código ASCII de 'A'
          const updatedCode = this.codeInput.split('');
          updatedCode[this.currentIndex] = letter;
          this.codeInput = updatedCode.join('');
        },

        clickFondo(event) {
            let posx = event.clientX - event.target.offsetLeft;
            let posy = event.clientY - event.target.offsetTop;

            for (let i = 0; i < this.objektuak.length; i++) {
                var areaTopAbs = (this.objektuak[i].areaTop / 100) * event.target.height;
                var areaLeftAbs = (this.objektuak[i].areaLeft / 100) * event.target.width;
                var areaWidthAbs = (this.objektuak[i].areaWidth / 100) * event.target.width;
                var areaHeightAbs = (this.objektuak[i].areaHeight / 100) * event.target.height;

                if (
                    posx >= areaLeftAbs &&
                    posx <= areaLeftAbs + areaWidthAbs &&
                    posy >= areaTopAbs &&
                    posy <= areaTopAbs + areaHeightAbs
                ) {
                    if(i==0){
                    var pizarra = document.getElementById("pizarra-rota");
                    var fondo = document.getElementById("fondo");
                    var textoPizarra = document.getElementById("texto-pizarra");
                    var close = document.getElementById("close");



                    console.log('¡Has hecho clic en la parte específica!');

                    pizarra.style.display = "block";
                    textoPizarra.style.visibility = "visible";
                    close.style.display = "block";


                    // textoPizarra.style.display = "block";
                    fondo.style.filter = "blur(5px)";
                    }

                    if(i==1){
                        var botella = document.getElementById("botella");
                        console.log('¡Has hecho clic en la parte BOTELLA!');
                        botella.style.display = "block";

                        var close = document.getElementById("close");
                        close.style.display = "block";


                }
            }
            }
        },


        close(){
            var close = document.getElementById("close");
            var pizarra = document.getElementById("pizarra-rota");
            var textoPizarra = document.getElementById("texto-pizarra");

            close.style.display = "none";
            pizarra.style.display = "none";
            textoPizarra.style.visibility = "hidden";
            fondo.style.filter = "blur(0px)";
            botella.style.display = "none";



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

