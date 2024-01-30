import './bootstrap';
import { createApp } from 'vue';
import draggable from 'vuedraggable'

import { createPinia } from 'pinia';
import route from '../../vendor/tightenco/ziggy';
import App from '../App.vue';
import Chemical from '../components/Chemical.vue';
import Register from '../components/register.vue';
import Login from '../components/login.vue';
import Menu from '../components/menujuego.vue';
import Juego2 from '../components/juego2.vue';
import Juego3 from '../components/juego3.vue';

import Juego4 from '../components/3raya.vue';
import Juego5 from '../components/despacho.vue';
import Armario from '../components/armario.vue';
import VueDraggableResizable from 'vue-draggable-resizable'
import VueCountdown from '@chenfengyuan/vue-countdown';
import { ZiggyVue } from 'ziggy-js';
const app = createApp({});

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

createApp(App).mount('#app');

// Si deseas montar LoginRegister en un div específico, asegúrate de que ese div exista en tu HTML.
const RegisterApp = createApp(Register);
const loginApp = createApp(Login);
RegisterApp.mount('#register');
loginApp.mount('#login'); // Asegúrate de que el div con el id "login-register" exista en tu HTML.

//a
const headerApp = createApp(App);
headerApp.mount('#header-app');

// Create a Vue instance for the footer
const footerApp = createApp(App);
footerApp.mount('#footer-app');

const juego1 = createApp(Chemical).use(ZiggyVue);;
juego1.component(VueCountdown.name, VueCountdown);


juego1.mount('#juego1');

const juego4 = createApp({
    components: {
        Juego4,
    },
}).component("vue-draggable-resizable", VueDraggableResizable);
juego4.use(ZiggyVue);
juego4.mount('#juego4');

const armario = createApp({
    components: {
        Armario,
    },
});
armario.use(ZiggyVue);
armario.mount('#armario');

const menujuegoApp = createApp(Menu).use(ZiggyVue);
menujuegoApp.component(VueCountdown.name, VueCountdown);

menujuegoApp.mount('#menujuego');

const Juego3App = createApp(Juego3);
Juego3App.mount('#juego3');

const Juego2App = createApp(Juego2);
Juego2App.mount('#juego2');
const Juego5App = createApp({
    components: {
        Juego5,

    },
}).component("vue-draggable-resizable", VueDraggableResizable);;

Juego5App.use(ZiggyVue);
Juego5App.mount('#juego5');
