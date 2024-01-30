<template>

    <!-- <div id="fondoJuego" class="relative min-h-screen flex items-center justify-center bg-cover bg-no-repeat bg-center" style="background-image: url('../../storage/app/public/images/juego2/fondo.png');">
    <button class="botoi fixed  transform  bg-transparent border-none p-0 focus:outline-none" @click.prevent="aparecerPizarra">
        <img id="pizarra" src="../../storage/app/public/images/juego2/pizarra-rota.png" alt="Botón con imagen" class="w-96 opacity-50 h-32 ">
    </button> -->
    <!-- </div> -->
    <img id="fondo" @click.prevent="clickFondo" src="../../storage/app/public/images/juego2/fondo.png" alt=""
        class="fondo" />

    <img id="pizarra-rota" src="../../storage/app/public/images/juego2/pizarra-rota.png" alt="" class="pizarra-rota" />
    <img id="botella" src="../../storage/app/public/images/juego2/botellas.png" alt="" class="botella" />
    <img id="close" class="absolute top-10 right-10 bg-transparent border-none p-0 w-10 hidden" @click="close"
        src="../../storage/app/public/images/juego2/close.png" alt="" />


<!-- PARA COMPONENTE -->
<img class="carta absolute w-2/3  none" @click="activarAnimacion" src="../../storage/app/public/images/juego2/fondo_papel-.png" alt="">
<div class="letra">
    <p  class="letra-carta" id="letra-carta">T</p>
</div>

<div>
<a href="rutaDestino"></a>
<img class="absolute exit" src="../../storage/app/public/images/juego2/exit.png" alt="" >
</div>
    <div id="botones" class="container-botones text-center flex items-center justify-center flex-row ">
        <div class="control-container pt-28" :class="{ 'vibrando': isVibrando1 }">
            <div class="number-input">
                <button class="btn-decrement b-botoi" @click="changeValue(-1, 'letterInput1_1')" :disabled="inputsBlocked">
                    &#8595;
                </button>
                <input type="text" class="input-field b-input" id="letterInput1_1" :value="result1_1" readonly />
                <button class="btn-increment b-botoi" @click="changeValue(1, 'letterInput1_1')" :disabled="inputsBlocked">
                    &#8593;
                </button>
            </div>

            <div class="number-input">
                <button class="btn-decrement b-botoi" @click="changeValue(-1, 'letterInput1_2')" :disabled="inputsBlocked">
                    &#8595;
                </button>
                <input type="text" class="input-field b-input" id="letterInput1_2" :value="result1_2" readonly />

                <button class="btn-increment b-botoi" @click="changeValue(1, 'letterInput1_2')" :disabled="inputsBlocked">
                    &#8593;
                </button>
            </div>

            <div class="number-input">
                <button class="btn-decrement b-botoi" @click="changeValue(-1, 'letterInput1_3')" :disabled="inputsBlocked">
                    &#8595;
                </button>

                <input type="text" class="input-field b-input" id="letterInput1_3" :value="result1_3" readonly />

                <button class="btn-increment b-botoi" @click="changeValue(1, 'letterInput1_3')" :disabled="inputsBlocked">
                    &#8593;
                </button>
            </div>
            <div class="containerBoton">
                <button id="verify-btn-1" @click="checkResult1" class="verify-btn-1" :disabled="verificationButtonBlocked">
                    ABRIR
                </button>
            </div>
        </div>

        <!-- AAAA -->
        <div class="control-container" :class="{ 'vibrando': isVibrando2 }">
            <div class="number-input">
                <button class="btn-decrement b-botoi" @click="changeValue(-1, 'letterInput2_1')" :disabled="inputsBlocked">
                    &#8595;
                </button>
                <input type="text" class="input-field b-input" id="letterInput2_1" :value="result2_1" readonly />
                <button class="btn-increment b-botoi" @click="changeValue(1, 'letterInput2_1')" :disabled="inputsBlocked">
                    &#8593;
                </button>
            </div>

            <div class="number-input">
                <button class="btn-decrement b-botoi" @click="changeValue(-1, 'letterInput2_2')" :disabled="inputsBlocked">
                    &#8595;
                </button>
                <input type="text" class="input-field b-input" id="letterInput2_2" :value="result2_2" readonly />

                <button class="btn-increment b-botoi" @click="changeValue(1, 'letterInput2_2')" :disabled="inputsBlocked">
                    &#8593;
                </button>
            </div>

            <div class="number-input">
                <button class="btn-decrement b-botoi" @click="changeValue(-1, 'letterInput2_3')" :disabled="inputsBlocked">
                    &#8595;
                </button>

                <input type="text" class="input-field b-input" id="letterInput2_3" :value="result2_3" readonly />

                <button class="btn-increment b-botoi" @click="changeValue(1, 'letterInput2_3')" :disabled="inputsBlocked">
                    &#8593;
                </button>
            </div>
            <div class="containerBoton">
                <button id="verify-btn-2" @click="checkResult2" class="verify-btn-2" :disabled="verificationButtonBlocked">
                    ABRIR
                </button>
            </div>
        </div>
        <div class="control-container pt-28 " :class="{ 'vibrando': isVibrando3 }">
            <div class="number-input ">
                <button class="btn-decrement b-botoi" @click="changeValue(-1, 'letterInput3_1')" :disabled="inputsBlocked">
                    &#8595;
                </button>
                <input type="text" class="input-field b-input" id="letterInput3_1" :value="result3_1" readonly />
                <button class="btn-increment b-botoi" @click="changeValue(1, 'letterInput3_1')" :disabled="inputsBlocked">
                    &#8593;
                </button>
            </div>

            <div class="number-input">
                <button class="btn-decrement b-botoi" @click="changeValue(-1, 'letterInput3_2')" :disabled="inputsBlocked">
                    &#8595;
                </button>
                <input type="text" class="input-field b-input" id="letterInput3_2" :value="result3_2" readonly />

                <button class="btn-increment b-botoi" @click="changeValue(1, 'letterInput3_2')" :disabled="inputsBlocked">
                    &#8593;
                </button>
            </div>

            <div class="number-input">
                <button class="btn-decrement b-botoi" @click="changeValue(-1, 'letterInput3_3')" :disabled="inputsBlocked">
                    &#8595;
                </button>

                <input type="text" class="input-field b-input" id="letterInput3_3" :value="result3_3" readonly />

                <button class="btn-increment b-botoi" @click="changeValue(1, 'letterInput3_3')" :disabled="inputsBlocked">
                    &#8593;
                </button>
            </div>
            <div class="containerBoton">
                <button id="verify-btn-3" @click="checkResult3" class="verify-btn-3" :disabled="verificationButtonBlocked">
                    ABRIR
                </button>
            </div>
        </div>
    </div>


    <div id="texto-pizarra" class="texto-pizarra absolute flex flex-wrap text-white gap-5 text-xl">
        <p class="">
            1-Diferenciación de enterobacterias en base a la fermentación de
            hidratos de carbono y a la producción de ácido sulfhídrico
        </p>

        <p class="">
            2-Aislamiento y recuento selectivo de Clostridium perfringens y sus
            esporas. Colonias amarillo-verdosas.
        </p>

        <p class="">
            3-Aislamiento y recuento de Clostridium perfringens en agua,
            alimentos…
        </p>
    </div>
    <!-- <div class="pizarra">

</div> -->
</template>

<script>
export default {
    data() {
        return {
            isVibrando1: false,
            isVibrando2: false,
            isVibrando3: false,

            isDone1: false,
            isDone2: false,
            isDone3: false,

            // rutaDestino: route('menujuego'),


            currentIndex: 0,

            objektuak: [
                // * Arbela
                { areaTop: 30, areaLeft: 40, areaWidth: 23, areaHeight: 13 },
                // * Botilak
                { areaTop: 40, areaLeft: 25, areaWidth: 7, areaHeight: 13 },
            ],
        };
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
            const updatedCode = this.codeInput.split("");
            updatedCode[this.currentIndex] = letter;
            this.codeInput = updatedCode.join("");
        },

        clickFondo(event) {
            let posx = event.clientX - event.target.offsetLeft;
            let posy = event.clientY - event.target.offsetTop;

            for (let i = 0; i < this.objektuak.length; i++) {
                var areaTopAbs =
                    (this.objektuak[i].areaTop / 100) * event.target.height;
                var areaLeftAbs =
                    (this.objektuak[i].areaLeft / 100) * event.target.width;
                var areaWidthAbs =
                    (this.objektuak[i].areaWidth / 100) * event.target.width;
                var areaHeightAbs =
                    (this.objektuak[i].areaHeight / 100) * event.target.height;

                if (
                    posx >= areaLeftAbs &&
                    posx <= areaLeftAbs + areaWidthAbs &&
                    posy >= areaTopAbs &&
                    posy <= areaTopAbs + areaHeightAbs
                ) {
                    if (i == 0) {
                        var pizarra = document.getElementById("pizarra-rota");
                        var fondo = document.getElementById("fondo");
                        var textoPizarra =
                            document.getElementById("texto-pizarra");
                        var close = document.getElementById("close");

                        console.log("¡Has hecho clic en la parte específica!");

                        pizarra.style.display = "block";
                        textoPizarra.style.visibility = "visible";
                        close.style.display = "block";

                        // textoPizarra.style.display = "block";
                        fondo.style.filter = "blur(5px)";
                    }

                    if (i == 1) {
                        var mostrarJuegoBotellas = document.getElementById("botones");
                        var botella = document.getElementById("botella");
                        var close = document.getElementById("close");

                        console.log("¡Has hecho clic en la parte BOTELLA!");
                        botella.style.display = "block";
                        mostrarJuegoBotellas.style.display = "flex";

                        close.style.display = "block";
                    }
                }
            }
        },

        close() {
            var mostrarJuegoBotellas = document.getElementById("botones");
            var close = document.getElementById("close");
            var pizarra = document.getElementById("pizarra-rota");
            var textoPizarra = document.getElementById("texto-pizarra");
            let carta = document.querySelector(".carta");
            var letra = document.getElementById("letra-carta");


            close.style.display = "none";
            pizarra.style.display = "none";
            textoPizarra.style.visibility = "hidden";
            fondo.style.filter = "blur(0px)";
            botella.style.display = "none";
            mostrarJuegoBotellas.style.display = "none";
                carta.style.display = "none";
                letra.style.display = "none";


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

        checkResult1() {
            var resultElement = document.getElementById("text");
            this.result1_1 = document.getElementById("letterInput1_1").value;
            this.result1_2 = document.getElementById("letterInput1_2").value;
            this.result1_3 = document.getElementById("letterInput1_3").value;


            var boton1 = document.getElementById("verify-btn-1");


            if (
                this.result1_1 === "K" &&
                this.result1_2 === "I" &&
                this.result1_3 === "A"
            ) {
                boton1.style.backgroundColor = "#35B331";
                this.isDone1 = true;
                this.CartaFinal();


            } else {
                boton1.style.backgroundColor = "#413B2A";

                this.isVibrando1 = true;
                setTimeout(() => {
                    this.isVibrando1 = false;
                }, 500);
            }

        },
        checkResult2() {
            this.result2_1 = document.getElementById("letterInput2_1").value;
            this.result2_2 = document.getElementById("letterInput2_2").value;
            this.result2_3 = document.getElementById("letterInput2_3").value;
            var boton2 = document.getElementById("verify-btn-2");
            if (
                this.result2_1 === "M" &&
                this.result2_2 === "C" &&
                this.result2_3 === "P"
            ) {
                boton2.style.backgroundColor = "#35B331";
                this.isDone2 = true;
                this.CartaFinal();


            } else {
                boton2.style.backgroundColor = "#413B2A";

                this.isVibrando2 = true;
                setTimeout(() => {
                    this.isVibrando2 = false;
                }, 500);
            }
        },
        checkResult3() {
            this.result3_1 = document.getElementById("letterInput3_1").value;
            this.result3_2 = document.getElementById("letterInput3_2").value;
            this.result3_3 = document.getElementById("letterInput3_3").value;
            var boton3 = document.getElementById("verify-btn-3");

            if (
                this.result3_1 === "T" &&
                this.result3_2 === "S" &&
                this.result3_3 === "C"
            ) {
                boton3.style.backgroundColor = "#35B331";
                this.isDone3 = true;
                this.CartaFinal();



            } else {
                boton3.style.backgroundColor = "#413B2A";

                this.isVibrando3 = true;
                setTimeout(() => {
                    this.isVibrando3 = false;
                }, 500);
            }

            if (
                this.result1_1 === "K" && this.result1_2 === "I" && this.result1_3 === "A" &&
                this.result2_1 === "M" && this.result2_2 === "C" && this.result2_3 === "P"&&
                this.result3_1 === "T" && this.result3_2 === "S" && this.result3_3 === "C"
            ) {

                console.log("GANASTE");
                let carta = document.querySelector(".carta");
                carta.style.display = "block";

            }
        },

        CartaFinal(){
            console.log("NO COMPLETADO");
            if (this.isDone1 && this.isDone2 && this.isDone3) {
                console.log("CARTA FINAL");
                let carta = document.querySelector(".carta");
            carta.style.display = "block";
            }
        },


        activarAnimacion() {
            console.log("ANIMAR");
            let carta = document.querySelector(".carta");
            carta.classList.add("activarAnimacion");
            setTimeout(() => {
                var mostrarJuegoBotellas = document.getElementById("botones");
                var letra = document.getElementById("letra-carta");
                letra.style.display = "block";
                mostrarJuegoBotellas.style.display = "none";

                }, 500);
        },

        toggleVibracion() {
            console.log("VIBRAR");
            this.isVibrando = !this.isVibrando;
        },


    },
};
</script>
