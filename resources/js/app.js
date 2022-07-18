require('./bootstrap');

import { createApp } from 'vue';

import router from './router';

import App from './components/App.vue';

import VueSweetalert2 from 'vue-sweetalert2';

import 'sweetalert2/dist/sweetalert2.min.css';

import LaravelVuePagination from 'laravel-vue-pagination';

import Login from './components/LoginComponent.vue';

import SideBarComponent from './components/includes/SideBarComponent.vue';

import HeaderComponent from './components/includes/HeaderComponent.vue';

import SettingsBarComponent from './components/includes/SettingsBarComponent.vue';


const app = createApp(App);

const login = createApp(Login);

app.use(VueSweetalert2);

app.use(LaravelVuePagination);

app.component('sidebar', SideBarComponent)
app.component('headerbar', HeaderComponent)
app.component('settingsbar', SettingsBarComponent)


login.use(router).mount('#login');

app.use(router).mount('#app');
