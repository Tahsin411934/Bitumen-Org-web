import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
// In resources/js/app.js
import $ from 'jquery';
window.$ = $; // Make it available globally if needed
