<template>
    <div>
        <main class="">
            <div class="flex flex-col items-center justify-center h-screen">
                <div v-for="(elemento, index) in elementos" :key="index" class="p-8">
                    <p class="wordart text-5xl font-rubik italic text-glow text-stroke font-black shining-light">{{
                        elemento.formula }}</p>
                </div>
            </div>
            <!--             <transition-group id="bounce" tag="div">
 -->
            <div v-for="(elemento, index) in elementos" :key="index" :id="`dvd-${index}`">
                <img :src="'data:image/png;base64,' + elemento.image" alt="Compound Image" class="bounce">
            </div>
            <!--             </transition-group>
 -->
        </main>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            elementos: [],
        };
    },
    methods: {
        execute() {
            const randomNumber = Math.floor(Math.random() * 1000) + 1;
            const url = `https://api.rsc.org/compounds/v1/records/${randomNumber}/details?fields=Formula`;
            const url_image = `https://api.rsc.org/compounds/v1/records/${randomNumber}/image`;
            const options = {
                headers: {
                    apikey: 'KGdFByAXWaZiAAR5Eie5NSfNtqW82RsD',
                    Accept: 'application/json',
                },
            };
            return Promise.all([
                axios.get(url, options),
                axios.get(url_image, options)
            ])
                .then(([response1, response2]) => {
                    return {
                        formula: response1.data.formula.replace(/[\{\}_]/g, ''),
                        image: response2.data.image
                    };
                })
                .catch(err => {
                    console.error(err);
                    return this.execute(); // Llama otra vez por si la id del random da error

                    /*  if (err.response && err.response.status === 503) {
                         return this.execute();
                     } */
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
