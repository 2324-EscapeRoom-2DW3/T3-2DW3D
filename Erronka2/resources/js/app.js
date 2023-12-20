import './bootstrap';
import { createApp } from 'vue'

import App from '../App.vue'
/*    import '../css/app.css'
 */

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const headerApp = createApp(App);
headerApp.mount('#header-app');

// Create a Vue instance for the footer
const footerApp = createApp(App);
footerApp.mount('#footer-app');
