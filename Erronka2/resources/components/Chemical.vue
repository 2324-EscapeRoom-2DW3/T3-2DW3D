<template>
    <div class="sm:p-4 md:p-6 lg:p-8">
        <p
            class="h-full w-full bg-gray-400 bg-clip-padding backdrop-filter backdrop-blur-3xl bg-opacity-10 border border-gray-100
    text-[#0bd904] rounded-lg p-6 flex justify-center items-center text-2xl md:w-auto mx-4 md:mx-8 text-center type-text1">
            <!-- Your text here -->
        </p>

        <main class="min-h-screen flex flex-col md:flex-row items-center justify-center">
            <div class="loading-container" v-if="isLoading">
                <div class="terminal-loader">
                    <div class="terminal-header">
                        <div class="terminal-title">Status</div>
                        <div class="terminal-controls">
                            <div class="control close"></div>
                            <div class="control minimize"></div>
                            <div class="control maximize"></div>
                        </div>
                    </div>
                    <div class="text">Loading...</div>

                </div>
            </div>
            <div :style="{ backgroundImage: `url(${backgroundImage})` }"
                class="h-full bg-contain bg-no-repeat bg-center p-8 sm:p-16 md:p-24 lg:p-40 shadow-xl inline-block">

                <div class="flex flex-col items-center">
                    <div v-for="(elemento, index) in elementos" :key="index" :ref="`clicked-${index}`" class="">
                        <p @click="handleClick(elemento, true)"
                            class="wordart text-6xl sm:text-4xl font-rubik mb-10 italic text-glow font-black shining-light"
                            :class="formulaClass(elemento.formula, clicked_times)">
                            {{ elemento.formula }}
                        </p>
                    </div>

                    <div class="flex flex-row  items-center justify-center">
                        <div v-for="(elemento, index) in elementos" :key="index" :id="`dvd-${index}`"
                            :ref="`clicked2-${index}`" class="w-3/4 sm:w-1/2 lg:w-3/4 h-auto">
                            <img @click="handleClick(elemento, false)" :src="'data:image/png;base64,' + elemento.image"
                                :class="imageClass(elemento.image, clicked_times)" alt="Compound Image"
                                class="w-full h-auto p-2">
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="wordart text-glow font-black shining-light text-5xl sm:text-6xl md:text-8xl  md:ml-14 p-4 md:p-8">
                {{ scoreUpdate }}
            </h1>
            <div class="p-8 md:p-4 lg:block hidden">
                <div class="cloader">
                    <div class="clface">
                        <div class="clsface">
                            <div id="h2" class="hand"></div>
                        </div>
                        <div class="top"></div>
                        <div class="bottom"></div>
                        <div class="left"></div>
                        <div class="right"></div>
                        <div id="sub" class="pin"></div>
                        <div id="h1" class="hand"></div>
                        <div id="main" class="pin"></div>
                    </div>
                </div>
            </div>
            <div class="h-full rounded-md bg-opacity-20 shadow-xl inline-block pl-4 md:pl-8">
                <vue-countdown ref="countdown" :auto-start="false" :time="60 * 1000" v-slot="{ seconds }">
                    <div class="text-5xl sm:text-6xl md:text-8xl text-center flex w-full items-center justify-center">
                        <div class="wordart text-glow font-black shining-light">
                            <div class="font-mono leading-none" x-text="seconds">{{ seconds }}</div>
                            <form ref="scoreForm" method="POST" :action="route" enctype="multipart/form-data">
                                <input type="hidden" name="_token" :value="csrf">
                                <input name="tiempoPartida" type="hidden" :value="seconds">
                                <input name="scorePartida" type="hidden" :value="seconds * score">
                                <input name="id_juego" type="hidden" :value="idjuego">
                            </form>

                        </div>
                    </div>
                </vue-countdown>
            </div>

        </main>
    </div>
</template>


<script>
import axios from 'axios';
import Bottleneck from 'bottleneck';
import VueCountdown from '@chenfengyuan/vue-countdown';
import route from '../../vendor/tightenco/ziggy';

const limiter = new Bottleneck({
    minTime: 333 // Executes 3 requests per second
});

export default {
    el: '#juego1',
    data() {
        return {
            elementos: [],
            backgroundImage: '../../storage/images/pizarra.png',
            check: [],
            score: 0,
            isLoading: false,
            clicked_times: 0,
            userId: window.userId,
            route: document.querySelector('#juego1').dataset.route,
            idjuego: document.querySelector('#juego1').dataset.id,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },
    methods: {

        handleClick(element, bool) {
            this.clicked_times++;
            if (this.clicked_times > 1) {
                this.clicked_times = 0;
            }

            if (bool) {
                this.check[0] = element;
            } else if (!bool) {
                this.check[1] = element;
            }

            console.log(this.check);

            if (this.check.length === 2) {
                const ref1 = this.$refs[`clicked-${this.elementos.indexOf(this.check[0])}`][0];
                const ref2 = this.$refs[`clicked2-${this.elementos.indexOf(this.check[1])}`][0];

                if (this.check[0].formula === this.check[1].formula) {
                    this.score++;
                } else {
                    // Add "vibrate" class to the clicked elements
                    ref1.classList.add('vibrate');
                    ref2.classList.add('vibrate');

                    // Remove the "vibrate" class after a delay (adjust the timeout as needed)
                    setTimeout(() => {
                        ref1.classList.remove('vibrate');
                        ref2.classList.remove('vibrate');
                    }, 1000); // Adjust the timeout as needed
                }

                this.check = [];
            }
        },


        /*     resetWrongElement() {
                setTimeout(() => {
                    this.wrongElement = [];
                }, 500);
            }, */
        /*
                check_recursiva(bool) {
                    if (bool || this.clicked_times === 1) {
                        if (this.clicked_times === 1) {
                            if (bool) {
                                this.wrongElement.push(this.check[1].formula);
                                bool = null;
                                this.clicked_times = 0;
                            } else if (!bool) {
                                this.wrongElement.push(this.check[1].image);
                                bool = null;
                                this.clicked_times = 0;

                            }
                        }
                        this.wrongElement.push(this.check[0].formula);
                        this.clicked_times++;
                        this.check_recursiva(bool);

                    } else if (!bool) {
                        this.wrongElement.push(this.check[0].image);
                        this.clicked_times++;
                        this.check_recursiva(bool);
                    }
                    this.resetWrongElement();

                }, */







        execute() {


            const randomNumber = Math.floor(Math.random() * 1000) + 1;
            const url = `https://api.rsc.org/compounds/v1/records/${randomNumber}/details?fields=Formula`;
            const url_image = `https://api.rsc.org/compounds/v1/records/${randomNumber}/image`;
            const options = {
                headers: {
                    apikey: 'e8Q656qLidw0ldNDIUrjmxrnnjbDJVna',
                    Accept: 'application/json',
                },
            };
            return limiter.schedule(() => Promise.all([
                axios.get(url, options),
                axios.get(url_image, options)
            ]))
                .then(([response1, response2]) => {
                    return {
                        formula: response1.data.formula.replace(/[\{\}_]/g, ''),
                        image: response2.data.image
                    };
                })
                .catch(err => {
                    console.error(err);
                    return this.execute(); // Llama otra vez por si la id del random da error
                });
        },
        executeThreeTimes() {
            this.elementos = [];
            for (let i = 0; i < 3; i++) {
                this.execute().then((result) => {
                    this.elementos.push(result);
                });
            }
        },
    },
    mounted() {
        setTimeout(() => {
            this.$refs.countdown.start();
        }, 15000);
        this.executeThreeTimes();
    },

    computed: {
        imageClass() {
            return (image) => {
                return this.check[1] && image === this.check[1].image ?
                    'shadow-[0_20px_20px_-15px_rgba(255,20,147,1)]' : 'border-transparent';
            };
        },

        formulaClass() {
            return (formula) => {
                return this.check[0] && formula === this.check[0].formula ?
                    'shadow-[0_20px_20px_-15px_rgba(255,20,147,1)]' : 'border-transparent';
            };
        },

        scoreUpdate() {
            if (this.score >= 1) {
                let audio = new Audio('../storage/sounds/ding.mp3');
                audio.play();
            }
            return this.score;
        },
    },
    watch: {
        scoreUpdate(newScore) {
            if (newScore === 3) {
                this.isLoading = true;
                /*                 this.$refs.scoreForm.action = route('juegos/juego1.store');
                 */
                this.$refs.scoreForm.submit();
                /*                 window.location.href = route('welcome');
                 */
            }
        }
    },
};
</script>

<style scoped></style>
