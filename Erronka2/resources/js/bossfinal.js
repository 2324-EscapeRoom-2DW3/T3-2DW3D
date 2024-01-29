import Alpine from "alpinejs";
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from './router'
import Boss from '../components/bossgeneral.vue';
import shell from 'vue-shell'
window.Alpine = Alpine;
Alpine.start();

const boss = createApp({
    components: {
        Boss,
    },
});
boss.use(shell);
boss.use(createPinia());
boss.use(router);
boss.mount('#boss');