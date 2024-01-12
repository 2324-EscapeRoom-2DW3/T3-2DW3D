<template>

        <p class="h-full w-full bg-gray-400 bg-clip-padding backdrop-filter backdrop-blur-3xl bg-opacity-10 border border-gray-100
 text-[#0bd904] rounded-lg p-6 flex justify-center items-center text-2xl md:w-auto mx-10 text-center type-text1">
            <!-- Your text here -->
        </p>

    <main class="min-h-screen flex items-center justify-center ">
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
            class="h-full bg-contain bg-no-repeat bg-center p-40  shadow-xl inline-block">

            <div class="flex flex-col items-center">
                <div v-for="(elemento, index) in elementos" :key="index" class="">
                    <p @click="handleClick(elemento, true)"
                        class="wordart text-6xl sm:text-4xl font-rubik mb-10 italic text-glow font-black shining-light "
                        :class="formulaClass(elemento.formula)">
                        {{ elemento.formula }}
                    </p>
                </div>

                <div class="flex flex-row  items-center justify-center">
                    <div v-for="(elemento, index) in elementos" :key="index" :id="`dvd-${index}`"
                        class="w-3/4 sm:w-1/2 lg:w-3/4 h-auto">
                        <img @click="handleClick(elemento, false)" :src="'data:image/png;base64,' + elemento.image"
                            :class="imageClass(elemento.image)" alt="Compound Image" class="w-full h-auto p-2">
                    </div>
                </div>

            </div>
        </div>
        <h1 class="wordart text-glow font-black shining-light text-8xl ml-14">{{ scoreUpdate }}</h1>

        <div class="p-32 lg:block hidden">
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
        <div class="h-full rounded-md bg-opacity-20  shadow-xl inline-block">
            <vue-countdown ref="countdown" :auto-start="false" :time="60 * 1000" v-slot="{ seconds }">
                <div class="text-8xl text-center flex w-full items-center justify-center">

                    <div class=" wordart text-glow font-black shining-light">
                        <div class="font-mono leading-none" x-text="seconds"> {{ seconds }}</div>
                    </div>
                </div>
            </vue-countdown>
        </div>

    </main>
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

    data() {
        return {
            elementos: [],
            backgroundImage: '../storage/images/pizarra.png',
            check: [],
            score: 0,
            isLoading: false,


        };
    },
    methods: {

        handleClick(element, bool) {

            if (bool) {
                this.check[0] = element;
            } else if (!bool) {
                this.check[1] = element;

            }

            console.log(this.check);

            if (this.check.length === 2) {
                if (this.check[0].formula === this.check[1].formula) {
                    this.score++;
                }
                this.check = [];
            }
        },


        execute() {


            const randomNumber = Math.floor(Math.random() * 1000) + 1;
            const url = `https://api.rsc.org/compounds/v1/records/${randomNumber}/details?fields=Formula`;
            const url_image = `https://api.rsc.org/compounds/v1/records/${randomNumber}/image`;
            const options = {
                headers: {
                    apikey: 'ZV2SGEoVvyDRGz3CaGieAfotYmSf5jxK',
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
        }, 1000);
        this.executeThreeTimes();
    },

    computed: {
        imageClass() {
            return (image) => {
                return this.check[1] && image === this.check[1].image ? 'shadow-[0_20px_20px_-15px_rgba(255,20,147,1)]' : 'border-transparent';
            };
        },

        formulaClass() {
            return (formula) => {
                return this.check[0] && formula === this.check[0].formula ? 'shadow-[0_20px_20px_-15px_rgba(255,20,147,1)]' : 'border-transparent';
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

                window.location.href = route('welcome');
            }
        }
    },
};
</script>

<style scoped></style>
