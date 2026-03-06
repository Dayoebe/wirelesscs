import Alpine from 'alpinejs';
/*import '../../node_modules/bootstrap/dist/js/bootstrap';
import '../../node_modules/bootstrap/dist/js/bootstrap.bundle';

*/

window.Alpine = Alpine;

Alpine.start();
import 'alpinejs';

if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js').catch((error) => {
            console.error('Service worker registration failed:', error);
        });
    });
}
