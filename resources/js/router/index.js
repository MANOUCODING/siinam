import { createRouter, createWebHistory } from "vue-router";

import HomeComponent from '../components/HomeComponent.vue';

import DashboardComponent from '../components/DashboardComponent.vue';

import LoginComponent from '../components/LoginComponent.vue';

//Importer les composants de la gestion des classes

import ClasseLyceeModerneComponent from '../components/Classes/ClasseLyceeModerneComponent.vue';

import ClassesCollegeComponent from '../components/Classes/ClassesCollegeComponent.vue';

import ClasseLyceeTechniqueComponnent from '../components/Classes/ClasseLyceeTechniqueComponnent.vue';

//Importer les composants de la gestion des matières

import MatieresScientifiquesComponent from '../components/Matieres/MatieresScientifiquesComponent.vue';

import MatieresLitterairesComponent from '../components/Matieres/MatieresLitterairesComponent.vue';

import MatieresFacultatifsComponent from '../components/Matieres/MatieresFacultatifsComponent.vue';

//Importer les composants de la gestion des matières

import EnseignantsComponent from '../components/Enseignants/EnseignantsComponent.vue';

import CreateEnseignantComponent from '../components/Enseignants/CreateEnseignantComponent.vue';


//Importer les composants des paramètres

import SettingsHomeComponent from '../components/Settings/HomeComponent.vue';

import SettingsAppreciationMatiereComponent from '../components/Settings/AppreciationMatiere/AppreciationMatiereComponent.vue';

import SettingsAppreciationSemestreComponent from '../components/Settings/AppreciationSemestre/AppreciationSemestreComponent.vue'

//Parametres gestion des decisions du conseils

import SettingsStatutConseilsComponent from '../components/Settings/Conseils/StatutConseilsComponent.vue';

//Parametres gestion des decisions du conseils pour les eleves nouveaux

import SettingsStatutConseilsNouveauxCollegeComponent from '../components/Settings/Conseils/partials/Nouveau/Colleges/CollegeComponent.vue';

import SettingsStatutConseilsNouveauxLyceeModerneComponent from '../components/Settings/Conseils/partials/Nouveau/LyceeModerne/LyceeModerneComponent.vue';

import SettingsStatutConseilsNouveauxLyceeTechniqueComponent from '../components/Settings/Conseils/partials/Nouveau/LyceeTechnique/LyceeTechniqueComponent.vue';

//Parametres gestion des decisions du conseils pour les eleves triplants

import SettingsStatutConseilsTriplantsCollegeComponent from '../components/Settings/Conseils/partials/Triplant/Colleges/CollegeComponent.vue';

import SettingsStatutConseilsTriplantsLyceeModerneComponent from '../components/Settings/Conseils/partials/Triplant/LyceeModerne/LyceeModerneComponent.vue';

import SettingsStatutConseilsTriplantsLyceeTechniqueComponent from '../components/Settings/Conseils/partials/Triplant/LyceeTechnique/LyceeTechniqueComponent.vue';

//Parametres gestion des decisions du conseils pour les eleves doublants

import SettingsStatutConseilsDoublantsCollegeComponent from '../components/Settings/Conseils/partials/Doublant/Colleges/CollegeComponent.vue';

import SettingsStatutConseilsDoublantsLyceeModerneComponent from '../components/Settings/Conseils/partials/Doublant/LyceeModerne/LyceeModerneComponent.vue';

import SettingsStatutConseilsDoublantsLyceeTechniqueComponent from '../components/Settings/Conseils/partials/Doublant/LyceeTechnique/LyceeTechniqueComponent.vue';


//Parametres gestion des decisions du conseils pour les eleves quadruplants

import SettingsStatutConseilsQuadruplantsCollegeComponent from '../components/Settings/Conseils/partials/Quadruplant/Colleges/CollegeComponent.vue';

import SettingsStatutConseilsQuadruplantsLyceeModerneComponent from '../components/Settings/Conseils/partials/Quadruplant/LyceeModerne/LyceeModerneComponent.vue';

import SettingsStatutConseilsQuadruplantsLyceeTechniqueComponent from '../components/Settings/Conseils/partials/Quadruplant/LyceeTechnique/LyceeTechniqueComponent.vue';

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
  
  //Gestion des classes 
  
  //Collège 
  {
    path: '/classes/college',
    component:  ClassesCollegeComponent ,
    name: 'ClassesCollegeComponent'
  },

  //Lycée Moderne
  {
    path: '/classes/lyceemoderne',
    component:  ClasseLyceeModerneComponent,
    name: 'ClasseLyceeModerneComponent'
  },

  //Lycée Technique
  {
    path: '/classes/lyceetechnique',
    component:  ClasseLyceeTechniqueComponnent,
    name: 'ClasseLyceeTechniqueComponnent'
  },

  //Gestion des Matières

  //Matières Scientifiques
  {
    path: '/matieres/scientifiques',
    component:  MatieresScientifiquesComponent,
    name: 'MatieresScientifiquesComponent'
  },

  //Matières Littéraires
  {
    path: '/matieres/litteraires',
    component:  MatieresLitterairesComponent,
    name: 'MatieresLitterairesComponent'
  },

  //Matières Facultatifs
  {
    path: '/matieres/facultatifs',
    component:  MatieresFacultatifsComponent,
    name: 'MatieresFacultatifsComponent'
  },

  //Gestion des enseignants

  //Liste des enseignants
  
  {
    path: '/enseignants',
    component:  EnseignantsComponent,
    name: 'EnseignantsComponent'
  },

  //Ajouter un enseignant
  {
    path: '/enseignants/create',
    component:  CreateEnseignantComponent,
    name: 'CreateEnseignantComponent'
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
    path: '/settings/decisions/status',
    component: SettingsStatutConseilsComponent,
    name: 'SettingsStatutConseilsComponent'
  }, 

  //Decision du conseils pour les nouveaux eleves

  {
    path: '/settings/decisions/nouveaux/colleges',
    component: SettingsStatutConseilsNouveauxCollegeComponent,
    name: 'SettingsStatutConseilsNouveauxCollegeComponent'
  }, 

  {
    path: '/settings/decisions/nouveaux/lyceemoderne',
    component: SettingsStatutConseilsNouveauxLyceeModerneComponent,
    name: 'SettingsStatutConseilsNouveauxLyceeModerneComponent'
  }, 

  {
    path: '/settings/decisions/nouveaux/lyceetechnique',
    component: SettingsStatutConseilsNouveauxLyceeTechniqueComponent,
    name: 'SettingsStatutConseilsNouveauxLyceeTechniqueComponent'
  }, 

  //Decision du conseils pour les eleves doublants

  {
    path: '/settings/decisions/doublants/colleges',
    component: SettingsStatutConseilsDoublantsCollegeComponent,
    name: 'SettingsStatutConseilsDoublantsCollegeComponent'
  }, 

  {
    path: '/settings/decisions/doublants/lyceemoderne',
    component: SettingsStatutConseilsDoublantsLyceeModerneComponent,
    name: 'SettingsStatutConseilsDoublantsLyceeModerneComponent'
  }, 

  {
    path: '/settings/decisions/doublants/lyceetechnique',
    component: SettingsStatutConseilsDoublantsLyceeTechniqueComponent,
    name: 'SettingsStatutConseilsDoublantsLyceeTechniqueComponent'
  }, 

  //Decision du conseils pour les eleves triplants

  {
    path: '/settings/decisions/triplants/colleges',
    component: SettingsStatutConseilsTriplantsCollegeComponent,
    name: 'SettingsStatutConseilsTriplantsCollegeComponent'
  }, 

  {
    path: '/settings/decisions/triplants/lyceemoderne',
    component: SettingsStatutConseilsTriplantsLyceeModerneComponent,
    name: 'SettingsStatutConseilsTriplantsLyceeModerneComponent'
  }, 

  {
    path: '/settings/decisions/triplants/lyceetechnique',
    component: SettingsStatutConseilsTriplantsLyceeTechniqueComponent,
    name: 'SettingsStatutConseilsTriplantsLyceeTechniqueComponent'
  }, 


  //Decision du conseils pour les eleves quadruplants

  {
    path: '/settings/decisions/quadruplants/colleges',
    component: SettingsStatutConseilsQuadruplantsCollegeComponent,
    name: 'SettingsStatutConseilsQuadruplantsCollegeComponent'
  }, 

  {
    path: '/settings/decisions/quadruplants/lyceemoderne',
    component: SettingsStatutConseilsQuadruplantsLyceeModerneComponent,
    name: 'SettingsStatutConseilsQuadruplantsLyceeModerneComponent'
  }, 

  {
    path: '/settings/decisions/quadruplants/lyceetechnique',
    component:  SettingsStatutConseilsQuadruplantsLyceeTechniqueComponent,
    name: ' SettingsStatutConseilsQuadruplantsLyceeTechniqueComponent'
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