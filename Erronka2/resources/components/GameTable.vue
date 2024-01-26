<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-10">
      <table class="w-full text-sm text-left rtl:text-righttext-green-400">
        <!-- ... tu contenido de la tabla para juegos ... -->
      </table>
    </div>
  </template>

  <script>
  export default {
    props: {
      game: Object,
      userName: String,
    },
  };
  </script>
