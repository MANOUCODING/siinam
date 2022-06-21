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

import ModalCreateConseilsComponent from './components/settings/Conseils/CreateConseilsComponent.vue';

import ModalCreateAppreciationMatiereComponent from './components/settings/AppreciationMatiere/CreateAppreciationMatiereComponent.vue';

import CreateMatiereScientifiqueModal from './components/Matieres/Actions/Create/CreateMatiereScientifiqueModal.vue';

import CreateMatiereLitteraireModal from './components/Matieres/Actions/Create/CreateMatiereLitteraireModal.vue';

import CreateMatiereFacultatifsModal from './components/Matieres/Actions/Create/CreateMatiereFacultatifsModal.vue';

import ModalCreateAppreciationSemestreComponent from './components/settings/AppreciationSemestre/CreateAppreciationSemestreComponent.vue';

const app = createApp(App);

const login = createApp(Login);

app.use(VueSweetalert2);

app.use(LaravelVuePagination);

app.component('sidebar', SideBarComponent)
app.component('headerbar', HeaderComponent)
app.component('settingsbar', SettingsBarComponent)
app.component('modalCreatecConseils',  ModalCreateConseilsComponent)
app.component('modalAppreciationMatiere',  ModalCreateAppreciationMatiereComponent)
app.component('modalAppreciationSemestre',  ModalCreateAppreciationSemestreComponent)
app.component('createMatiereScientifiqueModal',  CreateMatiereScientifiqueModal)
app.component('createMatiereLitteraireModal ',  CreateMatiereLitteraireModal )
app.component('createMatiereFacultatifsModal', CreateMatiereFacultatifsModal)

login.use(router).mount('#login');

app.use(router).mount('#app');
