import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Global helper for toast notifications
window.notify = function(message, type = 'success') {
    window.dispatchEvent(new CustomEvent('toast', { detail: { message, type } }));
};

Alpine.start();
