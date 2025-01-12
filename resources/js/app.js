import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import Alpine from 'alpinejs';

// Setup Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Setup Vue
const app = createApp(App);

// Error handling global untuk debugging
app.config.errorHandler = (err) => {
    console.error('Vue Error:', err);
};

app.mount('#calendar-container');