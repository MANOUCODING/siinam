require('./bootstrap');

import { createApp } from 'vue';

import router from './router';

import App from './components/App.vue';

import VueSweetalert2 from 'vue-sweetalert2';

import 'sweetalert2/dist/sweetalert2.min.css';

import vSelect from 'vue-select'

import LaravelVuePagination from 'laravel-vue-pagination';

import Login from './components/LoginComponent.vue';

import SettingsBarComponent from './components/includes/SettingsBarComponent.vue';

import FinanceBarComponent from './components/includes/FinanceBarComponent.vue';

import AbsencesBarComponent from './components/includes/AbsencesBarComponent.vue';

const app = createApp(App);

const login = createApp(Login);

app.use(VueSweetalert2);

app.use(LaravelVuePagination);

app.component('settingsbar', SettingsBarComponent)

app.component('financebar', FinanceBarComponent)

app.component('absencebar', AbsencesBarComponent)

app.component('v-select', vSelect)

login.use(router).mount('#login');

app.use(router).mount('#app');
