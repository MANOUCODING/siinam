require('./bootstrap');

import { createApp } from 'vue';

import router from './router';

import App from './components/App.vue';

import CommonService from './service/commonservice.js';

import Login from './components/LoginComponent.vue';

import SideBarComponent from './components/includes/SideBarComponent.vue';

import HeaderComponent from './components/includes/HeaderComponent.vue';

import SettingsBarComponent from './components/includes/SettingsBarComponent.vue';

import ModalCreateConseilsComponent from './components/settings/Conseils/CreateConseilsComponent.vue';

import ModalCreateAppreciationMatiereComponent from './components/settings/AppreciationMatiere/CreateAppreciationMatiereComponent.vue';

import ModalCreateAppreciationSemestreComponent from './components/settings/AppreciationSemestre/CreateAppreciationSemestreComponent.vue';

const app = createApp(App);

const login = createApp(Login);

app.mixin(CommonService);
app.component('sidebar', SideBarComponent)
app.component('headerbar', HeaderComponent)
app.component('settingsbar', SettingsBarComponent)
app.component('modalCreatecConseils',  ModalCreateConseilsComponent)
app.component('modalAppreciationMatiere',  ModalCreateAppreciationMatiereComponent)
app.component('modalAppreciationSemestre',  ModalCreateAppreciationSemestreComponent)

login.use(router).mount('#login');

app.use(router).mount('#app');