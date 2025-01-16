import './bootstrap'; // Biasanya untuk setup Bootstrap atau JavaScript lainnya
import { createApp } from 'vue';
import App from './App.vue'; // Menggunakan App.vue sebagai root komponen
import Alpine from 'alpinejs';
import LearningCalendar from './components/LearningCalendar.vue';

// Setup Alpine.js (opsional jika kamu menggunakan Alpine.js)
window.Alpine = Alpine;
Alpine.start();

// Setup Vue
const app = createApp(App);

// Mendaftarkan komponen Vue secara global
app.component('learning-calendar', LearningCalendar); 

// Mount aplikasi Vue ke elemen dengan id "calendar-container"
app.mount('#calendar-container');
