import { createRouter, createWebHistory } from "vue-router";

import HomeComponent from '../components/HomeComponent.vue';

import DashboardComponent from '../components/DashboardComponent.vue';

import LoginComponent from '../components/LoginComponent.vue';

//Importer les composants des paramètres

import SettingsHomeComponent from '../components/Settings/HomeComponent.vue';

import SettingsAppreciationMatiereComponent from '../components/Settings/AppreciationMatiere/AppreciationMatiereComponent.vue';

import SettingsAppreciationSemestreComponent from '../components/Settings/AppreciationSemestre/AppreciationSemestreComponent.vue'

import SettingsConseilsComponent from '../components/Settings/Conseils/ConseilsComponent.vue';

import SettingsCoordonneesComponent from '../components/Settings/Coordonnees/CoordonneesComponent.vue';

import SettingsAnneeScolaireComponent from '../components/Settings/AnneeScolaire/AnneeScolaireComponent.vue';

import SettingsUsersComponent from '../components/Settings/Users/UsersComponent.vue';

import SettingsCreateUsersComponent from '../components/Settings/Users/CreateUsersComponent.vue'


const routes = [
  {
    path: '/',
    component: HomeComponent,
    name: 'home'
  },

  {
    path: '/login',
    component: LoginComponent,
    name: 'login'
  },  

  {
    path: '/dashboard',
    component:  DashboardComponent,
    name: 'dashboard'
  }, 

  //Gerer les routes pour les paramètres de l'application

  //Acceuil
  {
    path: '/settings/home',
    component: SettingsHomeComponent,
    name: 'settings.home'
  }, 

  //Décision du conseil de fin d'année
  {
    path: '/settings/decisions/conseils',
    component: SettingsConseilsComponent,
    name: 'settings.conseils'
  }, 
  
  //Coordonnées de l'établissement
  {
    path: '/settings/coordonnees',
    component: SettingsCoordonneesComponent,
    name: 'settings.coordonnees'
  }, 

  //Appreciation par matière
  {
    path: '/settings/appreciations/matieres',
    component: SettingsAppreciationMatiereComponent,
    name: 'settings.appreciations.matieres'
  }, 

  //Appreciation par semestre
  {
    path: '/settings/appreciations/semestres',
    component: SettingsAppreciationSemestreComponent,
    name: 'settings.appreciations.semestres'
  }, 

  //Annee Scolaire
  {
    path: '/settings/annee-scolaire',
    component:  SettingsAnneeScolaireComponent,
    name: 'settings.annee-scolaire'
  }, 

  //Appreciation par semestre
  {
    path: '/settings/users',
    component: SettingsUsersComponent,
    name: 'settings.users'
  }, 

  {
    path: '/settings/users/create',
    component: SettingsCreateUsersComponent,
    name: 'settings.users.create'
  }, 
];

export default createRouter({
  history: createWebHistory(),
  routes
})