<template>
    <div class="h-screen w-full bg-full bg-no-repeat bg-center bg-black">
        <v-shell class="" :banner="banner" :shell_input="send_to_terminal" :commands="commands"
            @shell_output="prompt"></v-shell>
    </div>
</template>

<script>
import { store } from './store/store'
import { mapState, mapActions } from 'pinia'

export default {
    props: {
        id: Number,
    },

    data() {
        return {
            played : 0,
            audio: null,
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
        ...mapActions(store, ['incrementar_cont', 'incrementar_ques', 'reset'])
        ,
        prompt(value) {
            if (this.played === 0){
                this.audio = new Audio('../../storage/sounds/boss1.mp3');
                this.audio.play();
                this.played = 1;
            }

            if (this.questionNumber === 0 && value.toLowerCase().replace(/\s/g, '') === "aguadepeptona") {
                this.incrementar_cont();

                this.send_to_terminal = "Bien ✅" + "\n" + "Quedan " + this.contador + "/4 preguntas" + "\n" + "Siguiente pregunta: " + "\n" + "Se usa para el aislamiento de hongos.";
                this.incrementar_ques();
            } else if (this.questionNumber === 0 && this.contador === 0) {
                this.send_to_terminal = "Mal ❌" + "\n" + "Diluyente y enriquecimiento bacteriano Se usa en la prueba INDOL y ONPG";
            } else if (this.questionNumber === 1 && value.toLowerCase().replace(/\s/g, '') === "sabouraudconcloranfenicol") {
                this.incrementar_cont();
                ;

                this.send_to_terminal = "Bien ✅" + "\n" + "Quedan " + this.contador + "/4 preguntas" + "\n" + "Siguiente pregunta: " + "\n" + "Aislamiento  y recuento de <i>Clostridium perfringens</i> en agua, alimentos";
                this.incrementar_ques();
            } else if (this.questionNumber === 1 && this.contador === 1) {
                this.send_to_terminal = "Mal ❌" + "\n" + "Se usa para el aislamiento de hongos.";
            } else if (this.questionNumber === 2 && value.toLowerCase().replace(/\s/g, '') === "tsc") {
                this.incrementar_cont();
                ;

                this.send_to_terminal = "Bien ✅" + "\n" + "Quedan " + this.contador + "/4 preguntas" + "\n" + "Siguiente pregunta: " + "\n" + "Al ser con sangre permite crecimiento de organismos nutricionalmente exigentes" + "\n" + " y la clara visualización de la hemólisis.";
                this.incrementar_ques();
            } else if (this.questionNumber === 2 && this.contador === 2) {
                this.send_to_terminal = "Mal ❌" + "\n" + "Aislamiento  y recuento de <i>Clostridium perfringens</i> en agua, alimentos.";
            } else if (this.questionNumber === 3 && value.toLowerCase().replace(/\s/g, '') === "agarsangre") {
                this.incrementar_cont();
                ;

                this.send_to_terminal = "Bien ✅" + "\n" + "Quedan 999999999/4 preguntas" + "\n" + "Ja... Ja.. Ja";
                this.audio.pause();
        this.audio.currentTime = 0;
                setTimeout(() => {
                    this.$router.push('/2');
                }, 3000);

                this.incrementar_ques();
            } else if (this.questionNumber === 3 && this.contador === 3) {
                this.send_to_terminal = "Mal ❌" + "\n" + "Al ser con sangre permite crecimiento de organismos nutricionalmente exigentes" + "\n" + " y la clara visualización de la hemólisis.";
            }
        }
    },

    computed: {
        ...mapState(store, ['contador', 'questionNumber'])

    },
    watch: {

    },

};
</script>
