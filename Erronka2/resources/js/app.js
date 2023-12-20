import './bootstrap';
import { createApp } from 'vue';
import App from '../App.vue';
import LoginRegister from '../components/Login-register.vue';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

createApp(App).mount('#app');

// Si deseas montar LoginRegister en un div específico, asegúrate de que ese div exista en tu HTML.
const loginApp = createApp(LoginRegister);
loginApp.mount('#login-register'); // Asegúrate de que el div con el id "login-register" exista en tu HTML.
const headerApp = createApp(App);
headerApp.mount('#header-app');

// Create a Vue instance for the footer
const footerApp = createApp(App);
footerApp.mount('#footer-app');
