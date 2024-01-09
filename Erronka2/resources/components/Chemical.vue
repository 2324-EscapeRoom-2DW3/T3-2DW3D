<template>
    <main class="min-h-screen flex items-center justify-center p-5">
        <div :style="{ backgroundImage: `url(${backgroundImage})` }"
            class=" lg:bg-contain bg-no-repeat sm:bg-cover bg-center w-screen h-screen ">
            <div class="flex flex-col items-center mt-16">
                <div v-for="(elemento, index) in elementos" :key="index" class="">
                    <p class="wordart text-6xl sm:text-4xl font-rubik italic text-glow font-black shining-light ">
                        {{ elemento.formula }}
                    </p>
                </div>

                <div class="flex flex-row  items-center justify-center">
                    <div v-for="(elemento, index) in elementos" :key="index" :id="`dvd-${index}`"
                        class="w-3/4 sm:w-1/2 lg:w-3/4 h-auto">
                        <img :src="'data:image/png;base64,' + elemento.image" alt="Compound Image"
                            class="w-full h-auto p-2">
                    </div>
                </div>

            </div>
        </div>
        <div class="pr-32 lg:block hidden">
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

    </main>
</template>


<script>
import axios from 'axios';
import Bottleneck from 'bottleneck';

const limiter = new Bottleneck({
    minTime: 333 // Executes 3 requests per second
});

export default {
    data() {
        return {
            elementos: [],
            backgroundImage: '../storage/images/pizarra.png',
        };
    },
    methods: {


        execute() {


            const randomNumber = Math.floor(Math.random() * 1000) + 1;
            const url = `https://api.rsc.org/compounds/v1/records/${randomNumber}/details?fields=Formula`;
            const url_image = `https://api.rsc.org/compounds/v1/records/${randomNumber}/image`;
            const options = {
                headers: {
                    apikey: 'A6YeyNKPW5eepag0D1zALhZA8Yk5Ru45',
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
        this.executeThreeTimes();
    },
};
</script>

<style scoped></style>
