<template>
    <div class="h-screen w-full bg-full bg-no-repeat bg-center bg-black">
        <v-shell class="" :banner="banner" :shell_input="send_to_terminal" :commands="commands"
            @shell_output="prompt"></v-shell>
    </div>
</template>

<script>


export default {
    props: {
        id: Number,
    },

    data() {
        return {
            contador: 0,
            questionNumber: 0,
            send_to_terminal: "",
            banner: {
                header: "Quimmica",
                subHeader: "Ez duzu gaindituko 🔥",
                helpHeader: 'Idatzi "help" komando guztiak ikusteko',
                emoji: {
                    first: "🔅",
                    second: "🔆",
                    time: 750
                },
                sign: "IA_maltzurra $",
                img: {
                    align: "left",
                    link: "../../../storage/app/public/images/logo.png",
                    width: 100,
                    height: 100
                }
            },
            commands: [
                {
                    name: "galderak",
                    desc: "Galdera 1",
                    get() {
                        return `<p> Diluyente y enriquecimiento bacteriano Se usa en la prueba INDOL y ONPG </p>`;
                    }
                },
                /*        {
                           name: "2",
                           desc: "Cuestionario 2",
                           get() {
                               return `<p>Se usa para el aislamiento de hongos.</p>`;
                           }
                       },  {
                           name: "3",
                           desc: "Galdera 3",
                           get() {
                               return `<p>Aislamiento  y recuento de <i>Clostridium perfringens</i> en agua, alimentos</p>`;
                           }
                       },  {
                           name: "4",
                           desc: "Galdera 4",
                           get() {
                               return `<p>Al ser con sangre permite crecimiento de organismos nutricionalmente exigentes y la clara visualización de la hemólisis.</p>`;
                           }
                       } */
            ]
        };
    },
    mounted() {
        this.contador = 0;
        this.send_to_terminal = "Galderak hasteko 'galderak' idatzi" + "\n" + "\n";



    },
    methods: {
        prompt(value) {
            if (this.questionNumber === 0 && value.toLowerCase().replace(/\s/g, '') === "aguadepeptona") {
                this.contador++;

                this.send_to_terminal = "Bien ✅" + "\n" + "Quedan " + this.contador + "/4 preguntas" + "\n" + "Siguiente pregunta: " + "\n" + "Se usa para el aislamiento de hongos.";
                this.questionNumber++;
            } else if (this.questionNumber === 0 && this.contador === 0) {
                this.send_to_terminal = "Mal ❌" + "\n" + "Diluyente y enriquecimiento bacteriano Se usa en la prueba INDOL y ONPG";
            } else if (this.questionNumber === 1 && value.toLowerCase().replace(/\s/g, '') === "sabouraudconcloranfenicol") {
                this.contador++;

                this.send_to_terminal = "Bien ✅" + "\n" + "Quedan " + this.contador + "/4 preguntas" + "\n" + "Siguiente pregunta: " + "\n" + "Aislamiento  y recuento de <i>Clostridium perfringens</i> en agua, alimentos";
                this.questionNumber++;
            } else if (this.questionNumber === 1 && this.contador === 1) {
                this.send_to_terminal = "Mal ❌" + "\n" + "Se usa para el aislamiento de hongos.";
            }else if (this.questionNumber === 2 && value.toLowerCase().replace(/\s/g, '') === "tsc") {
                this.contador++;

                this.send_to_terminal = "Bien ✅" + "\n" + "Quedan " + this.contador + "/4 preguntas" + "\n" + "Siguiente pregunta: " + "\n" + "Al ser con sangre permite crecimiento de organismos nutricionalmente exigentes" +   "\n" + " y la clara visualización de la hemólisis.";
                this.questionNumber++;
            } else if (this.questionNumber === 2 && this.contador === 2) {
                this.send_to_terminal = "Mal ❌" + "\n" + "Aislamiento  y recuento de <i>Clostridium perfringens</i> en agua, alimentos.";
            }else if (this.questionNumber === 3 && value.toLowerCase().replace(/\s/g, '') === "agarsangre") {
                this.contador++;

                this.send_to_terminal = "Bien ✅" + "\n" + "Quedan 999999999/4 preguntas" + "\n" + "Ja... Ja.. Ja";

                setTimeout(() => {
                    this.$router.push('/2');
                }, 3000);

                this.questionNumber++;
            } else if (this.questionNumber === 3 && this.contador === 3) {
                this.send_to_terminal = "Mal ❌" + "\n" + "Al ser con sangre permite crecimiento de organismos nutricionalmente exigentes" +   "\n" + " y la clara visualización de la hemólisis.";
            }
        }
    },

    computed: {

    },
    watch: {

    },

};
</script>
