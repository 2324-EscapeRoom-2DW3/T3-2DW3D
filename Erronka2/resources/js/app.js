import './bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia';

import App from '../App.vue';
import Chemical from '../components/Chemical.vue';
import Register from '../components/register.vue';
import Login from '../components/login.vue';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

createApp(App).mount('#app');

// Si deseas montar LoginRegister en un div específico, asegúrate de que ese div exista en tu HTML.
 login-register-bueno
const RegisterApp = createApp(Register);
const loginApp = createApp(Login);
RegisterApp.mount('#register');
loginApp.mount('#login'); // Asegúrate de que el div con el id "login-register" exista en tu HTML.


const headerApp = createApp(App);
headerApp.mount('#header-app');

// Create a Vue instance for the footer
const footerApp = createApp(App);
footerApp.mount('#footer-app');

const juego1 = createApp(Chemical);
juego1.mount('#juego1');
