<template>
    <div class="h-screen w-full bg-full bg-no-repeat bg-center bg-black">
        <v-shell class="" :banner="banner" :shell_input="send_to_terminal" :commands="commands"
            @shell_output="prompt"></v-shell>
    </div>
</template>

<script>
import { store } from './store/store'
import { mapState, mapActions } from 'pinia'
import route from '../../vendor/tightenco/ziggy';

export default {
    props: {
        id: Number,
    },

    data() {
        return {
            send_to_terminal: "",
            played : 0,
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
        this.send_to_terminal = "Ez duzu gaindituko" + "\n" + "Ez duzu gaindituko" + "\n" + "Ez duzu gaindituko" + "\n" + "Ez duzu gaindituko" + "\n" + "Ez duzu gaindituko" + "\n" + "Ez duzu gaindituko" + "\n" + "Ez duzu gaindituko" + "\n" + "Ez duzu gaindituko" + "\n" + "Ez duzu gaindituko" + "\n" + "\n" + "Recuento y detección de E. coli en alimentos";


    },
    methods: {
        ...mapActions(store, ['incrementar_cont', 'incrementar_ques', 'reset'])
        ,

        prompt(value) {
            if (this.played === 0){
                let audio = new Audio('../../storage/sounds/boss2.mp3');
                audio.play();
                this.played = 1;
            }

            if (this.questionNumber === 4 && value.toLowerCase().replace(/\s/g, '') === "tsx") {
                this.incrementar_cont();

                this.send_to_terminal = "Bien ✅" + "\n" + "Quedan " + this.contador + "/8 preguntas" + "\n" + "Siguiente pregunta: " + "\n" + "Medio para ensayos de Rojo de metilo y Voges-Proskauer (APHA) para la " + "\n" + "identificación acorde al IMVIC.";
                this.incrementar_ques();
            } else if (this.questionNumber === 4 && this.contador === 4) {
                this.send_to_terminal = "Mal ❌" + "\n" + "Recuento y detección de E. coli en alimentos";
            } else if (this.questionNumber === 5 && value.toLowerCase().replace(/\s/g, '') === "clarkylubs") {
                this.incrementar_cont();

                this.send_to_terminal = "Bien ✅" + "\n" + "Quedan " + this.contador + "/8 preguntas" + "\n" + "Siguiente pregunta: " + "\n" + "La selectividad se debe al sulfito de sodio, supresión parcial de los microorganismos Gram +";
                this.incrementar_ques();
            } else if (this.questionNumber === 5 && this.contador === 5) {
                this.send_to_terminal = "Mal ❌" + "\n" + "Siguiente pregunta: " + "\n" + "Medio para ensayos de Rojo de metilo y Voges-Proskauer (APHA) para la " + "\n" + "identificación acorde al IMVIC.";
            } else if (this.questionNumber === 6 && value.toLowerCase().replace(/\s/g, '') === "endo") {
                this.incrementar_cont();

                this.send_to_terminal = "Bien ✅" + "\n" + "Quedan " + this.contador + "/8 preguntas" + "\n" + "Siguiente pregunta: " + "\n" + "Se utiliza para el cultivo de microorganismos heterótrofos.";
                this.incrementar_ques();
            } else if (this.questionNumber === 6 && this.contador === 6) {
                this.send_to_terminal = "Mal ❌" + "\n" + "La selectividad se debe al sulfito de sodio, supresión parcial de los microorganismos Gram +";
            } else if (this.questionNumber === 7 && value.toLowerCase().replace(/\s/g, '') === "bacto2r") {
                this.incrementar_cont();

                this.send_to_terminal = "Me... has... vencido... ⚗️...";

                 setTimeout(() => {
                    window.location.href = route('creditos.index', { id: route().params });
                }, 3000);

                this.incrementar_ques();
            } else if (this.questionNumber === 7 && this.contador === 7) {
                this.send_to_terminal = "Mal ❌" + "\n" + "Se utiliza para el cultivo de microorganismos heterótrofos.";
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
