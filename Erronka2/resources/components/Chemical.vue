<template>
    <main class="min-h-screen flex items-center justify-center p-5">
        <h1 class="text-white text-8xl">{{ scoreUpdate }}</h1>
        <div :style="{ backgroundImage: `url(${backgroundImage})` }"
            class=" h-full  bg-white rounded-md bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-20 p-6 shadow-xl inline-bloc">
            <div class="flex flex-col items-center m-2">
                <div v-for="(elemento, index) in elementos" :key="index" class="">
                    <p @click="handleClick(elemento, true)"
                        class="wordart text-6xl sm:text-4xl font-rubik italic text-glow font-black shining-light "
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
        <div
            class="h-full  bg-white rounded-md bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-20 p-6 shadow-xl inline-block animate-pulse">
            <vue-countdown ref="countdown" :auto-start="false" :time="60 * 1000" v-slot="{ seconds }">
                <div class="text-6xl text-center flex w-full items-center justify-center">

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

        };
    },
    methods: {

        handleClick(element, bool) {

            if (bool) {
                this.check[0] = element;
            }else if (!bool) {
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
                    apikey: 'mO7jKntGcsYpzFwdN3TzoJQMNIKC5Vet',
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
            return this.score;
        },
    },
    watch: {
    scoreUpdate(newScore) {
        if (newScore === 3) {
            window.location.href = route('welcome');
        }
    }
},
};
</script>

<style scoped></style>
