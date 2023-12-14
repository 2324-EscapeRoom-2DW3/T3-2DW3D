<script>
import axios from 'axios';
export default {
    name: 'ListasOption',
    components: {},
    data() {
        return {
            personas: []
        }
    },
    methods: {
        cargarPersonas() {
            axios.get('https://randomuser.me/api/?results=5')
                .then(resp => {
                    console.log(resp);
                    this.personas = resp.data.results;
                })
        }
    },
    mounted() {
        this.cargarPersonas();
    }

}

</script>

<template>
    <h1 class="text-2xl font-bold mb-4">Listas Axios</h1>

    <main class="flex flex-wrap justify-center">
        <img v-for="persona in personas" :src="persona.picture.large" :alt="persona.name.first"
            class="w-48 h-48 object-cover m-2">
    </main>
</template>

<style></style>
