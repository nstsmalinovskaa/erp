import './bootstrap';
import { createApp } from 'vue';
import App from "./components/App.vue";

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

createApp(App).mount('#app');
