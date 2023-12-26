

require('./bootstrap');

import { createApp } from 'vue';
import app from './app.vue';

createApp({
    components: {
        app,
    }
}).mount('#app');