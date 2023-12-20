<template>

<canvas ref="canvas" class="absolute inset-0 z-0 w-full h-full renderSurface"></canvas>

</template>

<script>

export default {

    mounted() {

        // Access the canvas element using its id after the component is mounted
        const canvas = this.$refs.canvas;

        // Create a Fluid instance and activate it
        let myFluid = new Fluid(canvas);
        myFluid.activate();
    }
};
</script>

<style>
/* Add any component-specific styles here */
</style>
