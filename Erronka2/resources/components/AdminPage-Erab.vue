<template>
    <div>
      <div v-if="datoErab" class="relative overflow-x-auto shadow-md sm:rounded-lg pt-10">
        <table class="w-full text-sm text-left rtl:text-righttext-green-400">
          <thead class="text-xs  uppercase bg-green-700 text-green-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                ID
              </th>
              <th scope="col" class="px-6 py-3">Izena</th>
              <th scope="col" class="px-6 py-3">Email</th>
            </tr>
          </thead>
          <tr class=" border-b bg-green-800 border-green-700">
            <td class="px-6 py-4"><p>{{ datoErab.id }}</p></td>
            <td class="px-6 py-4"><p>{{ datoErab.name }}</p></td>
            <td class="px-6 py-4"><p>{{ datoErab.email }}</p></td>
          </tr>
        </table>
      </div>

      <div v-for="datoPart in datosPart" :key="datoPart.id" class="relative overflow-x-auto shadow-md sm:rounded-lg pt-10">
        <table class="w-full text-sm text-left rtl:text-righttext-green-400">
          <!-- Table content here -->
        </table>
      </div>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        datoErab: null,
        datosPart: []
      };
    },
    mounted() {
      // Hacer una llamada a la API o al servidor para obtener los datos de la base de datos
      // Asignar los datos obtenidos a las variables datoErab y datosPart
      // Ejemplo:
      this.fetchDatoErab();
      this.fetchDatosPart();
    },
    methods: {
      fetchDatoErab() {
        // Lógica para obtener el datoErab de la base de datos
        // Ejemplo:
        // axios.get('/api/datoErab')
        //   .then(response => {
        //     this.datoErab = response.data;
        //   })
        //   .catch(error => {
        //     console.error(error);
        //   });
      },
      fetchDatosPart() {
        // Lógica para obtener los datos de datosPart de la base de datos
        // Ejemplo:
        // axios.get('/api/datosPart')
        //   .then(response => {
        //     this.datosPart = response.data;
        //   })
        //   .catch(error => {
        //     console.error(error);
        //   });
      }
    }
  };
  </script>

  <style scoped>
  /* CSS styles here */
  </style>
