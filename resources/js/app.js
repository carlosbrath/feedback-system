

require('./bootstrap');

import { createApp } from 'vue';
import App from './App.vue'
import router from './route'

const app = createApp(App)
app.use(router)
app.mount("#app")

import 'bootstrap/dist/css/bootstrap.min.css'
const link = document.createElement('link')
link.href = 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Open+Sans:wght@400;700&display=swap'
link.rel = 'stylesheet'
document.head.appendChild(link)