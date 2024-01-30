<template>
<div>
    <nav>
        <router-link to="/" ></router-link>
        <router-link to="/2"></router-link>

    </nav>
    <router-view :id=id></router-view>
</div>
</template>

<script>
import {RouterLink, RouterView} from 'vue-router';
export default {
    name: 'bossgeneral',
    components: {
        RouterLink,
        RouterView
    },
    props:{
        id: Number,
    }
}
   

</script>
