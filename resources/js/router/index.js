import { createRouter, createWebHistory } from "vue-router";

import HomeComponent from '../components/HomeComponent.vue';

import DashboardComponent from '../components/DashboardComponent.vue';

import LoginComponent from '../components/LoginComponent.vue';

//Importer les composants de la gestion des classes

import ClasseLyceeModerneComponent from '../components/Classes/ClasseLyceeModerneComponent.vue';

import CreateClasseLyceeModerneComponent from '../components/Classes/Create/CreateClasseLyceeModerneComponent.vue';

import UpdateClasseLyceeModerneComponent from '../components/Classes/Update/UpdateClasseLyceeModerneComponent.vue';

import ClassesCollegeComponent from '../components/Classes/ClassesCollegeComponent.vue';

import ShowClassesEmpoiDuTempsComponent from '../components/Classes/Show/ShowClassesEmpoiDuTempsComponent.vue';

import CreateClasseCollegeComponent from '../components/Classes/Create/CreateClasseCollegeComponent.vue';

import UpdateClasseCollegeComponent from '../components/Classes/Update/UpdateClasseCollegeComponent.vue';

import ClasseLyceeTechniqueComponnent from '../components/Classes/ClasseLyceeTechniqueComponnent.vue';

import CreateClasseLyceeTechniqueComponent from '../components/Classes/Create/CreateClasseLyceeTechniqueComponent.vue';

import  UpdateClasseLyceeTechniqueComponent from '../components/Classes/Update/UpdateClasseLyceeTechniqueComponent.vue';

//Importer les composants de la gestion des matières

import MatieresScientifiquesComponent from '../components/Matieres/MatieresScientifiquesComponent.vue';

import MatieresLitterairesComponent from '../components/Matieres/MatieresLitterairesComponent.vue';

import MatieresFacultatifsComponent from '../components/Matieres/MatieresFacultatifsComponent.vue';

import ShowMatiereComponent from '../components/Matieres/ShowMatiereComponent.vue';

//Importer les composants de la gestion des eleves

import ClassesCollegeElevesComponent from '../components/Eleves/ClassesCollegeElevesComponent.vue';

import ClassesLyceeModerneElevesComponent from '../components/Eleves/ClassesLyceeModerneElevesComponent.vue';

import ClassesLyceeTechniqueElevesComponent from '../components/Eleves/ClassesLyceeTechniqueElevesComponent.vue';

import ClassesStatutElevesComponent from '../components/Eleves/StatutEleves/StatutElevesComponent.vue';

import ShowClassesAllEleveComponent from '../components/Eleves/partials/ShowClassesAllEleveComponent.vue';

import ShowClassesAncienEleveComponent from '../components/Eleves/partials/ShowClassesAncienEleveComponent.vue';

import ShowClassesNouveauEleveComponent from '../components/Eleves/partials/ShowClassesNouveauEleveComponent.vue';

import CreateEleveComponent from '../components/Eleves/CreateEleveComponent.vue';

//Importer les composants de la gestion des affectations

import AffectationsComponent from '../components/Affectations/AffectationsComponent.vue';

//Importer les composants de la gestion des enseignants

import EnseignantsComponent from '../components/Enseignants/EnseignantsComponent.vue';

import CreateEnseignantComponent from '../components/Enseignants/CreateEnseignantComponent.vue';

import UpdateEnseignantComponent from '../components/Enseignants/UpdateEnseignantComponent.vue';

import ShowEnseignantsComponent from '../components/Enseignants/ShowEnseignantsComponent.vue';

//Importer les composants de la gestion des absences

//Importer le composant d'accueil de la gestion des absences

import AbsencesHomeComponent from '../components/Absences/HomeComponent.vue';

//Importer le composant Signaler les absences

import AbsencesSignalerAbsencesComponent from '../components/Absences/SignalerAbsences/SignalerAbsencesComponent.vue';

//Importer le composant configuration des absences

import AbsencesConfigurationAbsencesCollegeComponent from '../components/Absences/Configuration/Absences/ConfigurationAbsencesCollegeComponent.vue';

import AbsencesConfigurationAbsencesLyceeModerneComponent from '../components/Absences/Configuration/Absences/ConfigurationAbsencesLyceeModerneComponent.vue';

import AbsencesConfigurationAbsencesLyceeTechniqueComponent from '../components/Absences/Configuration/Absences/ConfigurationAbsencesLyceeTechniqueComponent.vue';

//Importer le composant etat des absences

import AbsencesEtatAbsencesCollegeComponent from '../components/Absences/Etat/Absences/EtatAbsencesCollegeComponent.vue';

import AbsencesEtatAbsencesLyceeModerneComponent from '../components/Absences/Etat/Absences/EtatAbsencesLyceeModerneComponent.vue';

import AbsencesEtatAbsencesLyceeTechniqueComponent from '../components/Absences/Etat/Absences/EtatAbsencesLyceeTechniqueComponent.vue';

//Importer le composant Signaler les fautes

import FauteSignalerFauteComponent from '../components/Absences/SignalerFauteDsicipline/SignalerFauteDisciplineComponent.vue';

//Importer le composant configuration des absences

import FauteConfigurationCollegeComponent from '../components/Absences/Configuration/FauteDiscipline/ConfigurationFauteCollegeDisciplineComponent.vue';

import FauteConfigurationLyceeModerneComponent from '../components/Absences/Configuration/FauteDiscipline/ConfigurationFauteLyceeModerneDisciplineComponent.vue';

import FauteConfigurationLyceeTechniqueComponent from '../components/Absences/Configuration/FauteDiscipline/ConfigurationFauteLyceeTechniqueDisciplineComponent.vue';

//Importer le composant etat des absences

import FauteEtatCollegeComponent from '../components/Absences/Etat/FauteDiscipline/EtatFauteDisciplineCollegeComponent.vue';

import FauteEtatLyceeModerneComponent from '../components/Absences/Etat/FauteDiscipline/EtatFauteDisciplineLyceeModerneComponent.vue';

import FauteEtatLyceeTechniqueComponent from '../components/Absences/Etat/FauteDiscipline/EtatFauteDisciplineLyceeTechniqueComponent.vue';

//Importer les composants des finances

import FinancesHomeComponent from '../components/Finances/HomeComponent.vue';

//Importer les composants des finances de l'ecolage

import FinancesEcolageEleveComponent from '../components/Finances/Ecolage/EcolageEleveComponent.vue';

import FinancesConfigurationBaseEcolageCollegeComponent from '../components/Finances/Ecolage/ConfigurationBase/ConfigurationBaseEcolageCollegeComponent.vue';

import FinancesConfigurationBaseEcolageLyceeModerneComponent from '../components/Finances/Ecolage/ConfigurationBase/ConfigurationBaseEcolageLyceeModerneComponent.vue';

import FinancesConfigurationBaseEcolageLyceeTechniqueComponent from '../components/Finances/Ecolage/ConfigurationBase/ConfigurationBaseEcolageLyceeTechniqueComponent.vue';

// Importer les composents des finances des frais d'insccriptions 

import FinancesInscriptionsEleveComponent from '../components/Finances/Inscriptions/InscriptionEleveComponent.vue';

import FinancesConfigurationBaseInscriptionsCollegeComponent from '../components/Finances/Inscriptions/ConfigurationBase/ConfigurationBaseInscriptionCollegeComponent.vue';

import FinancesConfigurationBaseInscriptionsLyceeModerneComponent from '../components/Finances/Inscriptions/ConfigurationBase/ConfigurationBaseInscriptionLyceeModerneComponent.vue';

import FinancesConfigurationBaseInscriptionsLyceeTechniqueComponent from '../components/Finances/Inscriptions/ConfigurationBase/ConfigurationBaseInscriptionLyceeTechniqueComponent.vue';


// Importer les composents des finances des frais d'examens

import FinancesExamensEleveComponent from '../components/Finances/Examens/InscriptionExamenComponent.vue';

import FinancesConfigurationBaseExamensCollegeComponent from '../components/Finances/Examens/ConfigurationBase/ConfigurationBaseExamenCollegeComponent.vue';

import FinancesConfigurationBaseExamensLyceeModerneComponent from '../components/Finances/Examens/ConfigurationBase/ConfigurationBaseExamenLyceeModerneComponent.vue';

import FinancesConfigurationBaseExamensLyceeTechniqueComponent from '../components/Finances/Examens/ConfigurationBase/ConfigurationBaseExamenLyceeTechniqueComponent.vue';


// Importer les composents des finances des autres frais

import FinancesAutresFraisComponent from '../components/Finances/AutresFrais/AutresFraisComponent.vue';


// Importer les composents des finances des frais d'achats de materiels

import FinancesAchatdeMaterielsComponent from '../components/Finances/AchatMateriels/AchatdeMaterielsComponent.vue';

import FinancesCreateAchatMaterielComponent from '../components/Finances/AchatMateriels/CreateAchatMaterielComponent.vue';


// Importer les composents des finances des frais de paiement de facture

import FinancesFactureComponent from '../components/Finances/PaiementFactures/FactureComponent.vue';

import FinancesCreateFactureComponent from '../components/Finances/PaiementFactures/CreateFactureComponent.vue';


// Importer les composents des finances des paiements de salaire

import FinancesPayerSalaireComponent from '../components/Finances/Salaires/PayerSalaireComponent.vue';

//Importer les composants des paramètres

import SettingsHomeComponent from '../components/Settings/HomeComponent.vue';

import  SettingsAppreciationMatiereComponent from '../components/Settings/AppreciationMatiere/AppreciationMatiereComponent.vue'; 

import SettingsCreateAppreciationMatiereComponent from '../components/Settings/AppreciationMatiere/CreateAppreciationMatiereComponent.vue';

import SettingsUpdateAppreciationMatiereComponent from '../components/Settings/AppreciationMatiere/UpdateAppreciationMatiereComponent.vue';

import SettingsAppreciationSemestreClassesCollegeComponent from '../components/Settings/AppreciationSemestre/College/ClassesCollegeComponent.vue';

import SettingsAppreciationSemestreClassesLyceeModerneComponent from '../components/Settings/AppreciationSemestre/LyceeModerne/ClassesLyceeModerneComponent.vue';

import SettingsAppreciationSemestreCreateAppreciationSemestreComponent from '../components/Settings/AppreciationSemestre/CreateAppreciationSemestreComponent.vue';

import SettingsAppreciationSemestreUpdateAppreciationSemestreComponent from '../components/Settings/AppreciationSemestre/UpdateAppreciationSemestreComponent.vue';

import SettingsAppreciationSemestreClassesLyceeTechniqueComponent from '../components/Settings/AppreciationSemestre/LyceeTechnique/ClassesLyceeTechniqueComponent.vue';

import SettingsAppreciationSemestreShowAppreciationComponent from '../components/Settings/AppreciationSemestre/ShowAppreciationComponent.vue';


//Parametres gestion des decisions du conseils

import SettingsStatutConseilsComponent from '../components/Settings/Conseils/StatutConseilsComponent.vue';

//Parametres gestion des decisions du conseils pour les eleves nouveaux

import SettingsStatutConseilsNouveauxCollegeComponent from '../components/Settings/Conseils/partials/Nouveau/Colleges/CollegeComponent.vue';

import SettingsStatutConseilsNouveauxLyceeModerneComponent from '../components/Settings/Conseils/partials/Nouveau/LyceeModerne/LyceeModerneComponent.vue';

import SettingsStatutConseilsNouveauxLyceeTechniqueComponent from '../components/Settings/Conseils/partials/Nouveau/LyceeTechnique/LyceeTechniqueComponent.vue';


import SettingsStatutConseilsShowNouveauxComponent from '../components/Settings/Conseils/partials/Nouveau/ShowNouveauxComponent.vue';

import SettingsStatutConseilsCreateNouveauxComponent from '../components/Settings/Conseils/partials/Nouveau/CreateNouveauxComponent.vue';

import SettingsStatutConseilsUpdateNouveauxComponent from '../components/Settings/Conseils/partials/Nouveau/UpdateNouveauxComponent.vue';


//Parametres gestion des decisions du conseils pour les eleves doublants

import SettingsStatutConseilsDoublantsCollegeComponent from '../components/Settings/Conseils/partials/Doublant/Colleges/CollegeComponent.vue';

import SettingsStatutConseilsDoublantsLyceeModerneComponent from '../components/Settings/Conseils/partials/Doublant/LyceeModerne/LyceeModerneComponent.vue';

import SettingsStatutConseilsDoublantsLyceeTechniqueComponent from '../components/Settings/Conseils/partials/Doublant/LyceeTechnique/LyceeTechniqueComponent.vue';


import SettingsStatutConseilsShowDoublantsComponent from '../components/Settings/Conseils/partials/Doublant/ShowDoublantsComponent.vue';

import SettingsStatutConseilsCreateDoublantsComponent from '../components/Settings/Conseils/partials/Doublant/CreateDoublantsComponent.vue';

import SettingsStatutConseilsUpdateDoublantsComponent from '../components/Settings/Conseils/partials/Doublant/UpdateDoublantsComponent.vue';


//Parametres gestion des decisions du conseils pour les eleves triplants

import SettingsStatutConseilsTriplantsCollegeComponent from '../components/Settings/Conseils/partials/Triplant/Colleges/CollegeComponent.vue';

import SettingsStatutConseilsTriplantsLyceeModerneComponent from '../components/Settings/Conseils/partials/Triplant/LyceeModerne/LyceeModerneComponent.vue';

import SettingsStatutConseilsTriplantsLyceeTechniqueComponent from '../components/Settings/Conseils/partials/Triplant/LyceeTechnique/LyceeTechniqueComponent.vue';


import SettingsStatutConseilsShowTriplantsComponent from '../components/Settings/Conseils/partials/Triplant/ShowTriplantsComponent.vue';

import SettingsStatutConseilsCreateTriplantsComponent from '../components/Settings/Conseils/partials/Triplant/CreateTriplantsComponent.vue';

import SettingsStatutConseilsUpdateTriplantsComponent from '../components/Settings/Conseils/partials/Triplant/UpdateTriplantsComponent.vue';

//Parametres gestion des decisions du conseils pour les eleves quadruplants

import SettingsStatutConseilsQuadruplantsCollegeComponent from '../components/Settings/Conseils/partials/Quadruplant/Colleges/CollegeComponent.vue';

import SettingsStatutConseilsQuadruplantsLyceeModerneComponent from '../components/Settings/Conseils/partials/Quadruplant/LyceeModerne/LyceeModerneComponent.vue';

import SettingsStatutConseilsQuadruplantsLyceeTechniqueComponent from '../components/Settings/Conseils/partials/Quadruplant/LyceeTechnique/LyceeTechniqueComponent.vue';


import SettingsStatutConseilsShowQuadruplantsComponent from '../components/Settings/Conseils/partials/Quadruplant/ShowQuadruplantsComponent.vue';

import SettingsStatutConseilsCreateQuadruplantsComponent from '../components/Settings/Conseils/partials/Quadruplant/CreateQuadruplantsComponent.vue';

import SettingsStatutConseilsUpdateQuadruplantsComponent from '../components/Settings/Conseils/partials/Quadruplant/UpdateQuadruplantsComponent.vue';


import SettingsCoordonneesComponent from '../components/Settings/Coordonnees/CoordonneesComponent.vue';

import SettingsUpdateCoordonneesComponent from '../components/Settings/Coordonnees/UpdateCoordonneesComponent.vue';

import SettingsAnneeScolaireComponent from '../components/Settings/AnneeScolaire/AnneeScolaireComponent.vue';

import SettingsCreateAnneeScolaireComponent from '../components/Settings/AnneeScolaire/CreateAnneeScolaireComponent.vue';

import SettingsUpdateAnneeScolaireComponent from '../components/Settings/AnneeScolaire/UpdateAnneeScolaireComponent.vue';

import SettingsUsersComponent from '../components/Settings/Users/UsersComponent.vue';

import SettingsCreateUsersComponent from '../components/Settings/Users/CreateUsersComponent.vue';

import SettingsUpdateUsersComponent from '../components/Settings/Users/UpdateUsersComponent.vue';

import SettingsShowConnexionsUsersComponent from '../components/Settings/Users/ShowConnexionsUsersComponent.vue';

import SettingsShowActivityUsersComponent from '../components/Settings/Users/ShowActivityUsersComponent.vue';

import DocumentsHomeComponent from '../components/Documents/HomeComponent.vue';


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

  {
    path: '/affectations',
    component:  AffectationsComponent,
    name: 'affectations'
  },

   //Collège 
   {
    path: '/documents/home',
    component:  DocumentsHomeComponent ,
    name: 'DocumentsHomeComponent'
  },
  
  //Gestion des classes 
  
  //Collège 
  {
    path: '/classes/college',
    component:  ClassesCollegeComponent ,
    name: 'ClassesCollegeComponent'
  },

  {
    path: '/classes/college/create',
    component:  CreateClasseCollegeComponent,
    name: 'CreateClasseCollegeComponent'
  },
  

  //Lycée Moderne
  {
    path: '/classes/lyceemoderne',
    component:  ClasseLyceeModerneComponent,
    name: 'ClasseLyceeModerneComponent'
  },

  {
    path: '/classes/lyceemoderne/create',
    component:  CreateClasseLyceeModerneComponent,
    name: 'CreateClasseLyceeModerneComponent'
  },

  {
    path: '/classes/lyceemoderne/:id/edit',
    component:   UpdateClasseLyceeModerneComponent,
    name: 'UpdateClasseLyceeModerneComponent'
  },

  //Lycée Technique
  {
    path: '/classes/lyceetechnique',
    component:  ClasseLyceeTechniqueComponnent,
    name: 'ClasseLyceeTechniqueComponnent'
  },
  {
    path: '/classes/lyceetechnique/create',
    component:  CreateClasseLyceeTechniqueComponent,
    name: 'CreateClasseLyceeTechniqueComponent'
  },

  {
    path: '/classes/lyceetechnique/:id/edit',
    component:   UpdateClasseLyceeTechniqueComponent,
    name: 'UpdateClasseLyceeTechniqueComponent'
  },

  {
    path: '/classes/show/:id/emploidutemps',
    component:  ShowClassesEmpoiDuTempsComponent,
    name: 'ShowClassesEmpoiDuTempsComponent'
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

  {
    path: '/matieres/:id/show',
    component:  ShowMatiereComponent,
    name: 'ShowMatiereComponent'
  },

  //Gestion des élèves

  //Liste des élèves
  
  {
    path: '/eleves/colleges',
    component:  ClassesCollegeElevesComponent,
    name: 'ClassesCollegeElevesComponent'
  },

  {
    path: '/eleves/create',
    component:  CreateEleveComponent,
    name: 'CreateEleveComponent'
  },

  {
    path: '/eleves/lycee/moderne',
    component:  ClassesLyceeModerneElevesComponent,
    name: 'ClassesLyceeModerneElevesComponent'
  },

  {
    path: '/eleves/lycee/technique',
    component:  ClassesLyceeTechniqueElevesComponent,
    name: 'ClassesLyceeTechniqueElevesComponent'
  },

  {
    path: '/eleves/classes/:id/status',
    component:  ClassesStatutElevesComponent,
    name: 'eleves.classes.status'
  },

  {
    path: '/eleves/classes/:id',
    component: ShowClassesAllEleveComponent,
    name: 'eleves.classes.all'
  },

  {
    path: '/eleves/classes/:id/nouveaux',
    component:  ShowClassesNouveauEleveComponent,
    name: 'eleves.classes.nouveaux'
  },

  {
    path: '/eleves/classes/:id/anciens',
    component: ShowClassesAncienEleveComponent,
    name: 'eleves.classes.anciens'
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

  //Ajouter un enseignant
  {
    path: '/enseignants/:id/edit',
    component:  UpdateEnseignantComponent,
    name: 'UpdateEnseignantComponent'
  },

  {
    path: '/enseignants/:id/show',
    component:  ShowEnseignantsComponent,
    name: 'ShowEnseignantsComponent'
  },

  //Gerer les routes pour les absences

  //Acceuil
  {
    path: '/absences/home',
    component: AbsencesHomeComponent,
    name: 'absences.home'
  }, 

  //Signaler les  Absences
  {
    path: '/absences/signaler',
    component: AbsencesSignalerAbsencesComponent,
    name: 'absences.signaler'
  }, 

  //Configurer les absences du college
  {
    path: '/absences/settings/college',
    component: AbsencesConfigurationAbsencesCollegeComponent,
    name: 'absences.settings.college'
  }, 

  //Configurer les absences du lycee moderne
  {
    path: '/absences/settings/lycee/moderne',
    component: AbsencesConfigurationAbsencesLyceeModerneComponent,
    name: 'absences.settings.lyceemoderne'
  }, 

  //Configurer les absences du college
  {
    path: '/absences/settings/lycee/technique',
    component: AbsencesConfigurationAbsencesLyceeTechniqueComponent,
    name: 'absences.settings.lyceetechnique'
  }, 

  //Configurer les etats absences du college
  {
    path: '/etat/absences/college',
    component: AbsencesEtatAbsencesCollegeComponent,
    name: 'absences.etat.absences.college'
  }, 
  //Configurer les etats absences du lycee moderne
  {
    path: '/etat/absences/lycee/moderne',
    component:  AbsencesEtatAbsencesLyceeModerneComponent,
    name: 'absences.etat.absences.lyceemoderne'
  }, 
  //Configurer les etats absences du lycée technique
  {
    path: '/etat/absences/lycee/technique',
    component:  AbsencesEtatAbsencesLyceeTechniqueComponent,
    name: 'absences.etat.absences.lyceetechnique'
  }, 


   //Signaler les  fautes
   {
    path: '/fautes/signaler',
    component: FauteSignalerFauteComponent,
    name: 'fautes.signaler'
  }, 

  //Configurer les absences du college
  {
    path: '/fautes/settings/college',
    component: FauteConfigurationCollegeComponent,
    name: 'fautes.settings.college'
  }, 

  //Configurer les absences du lycee moderne
  {
    path: '/fautes/settings/lycee/moderne',
    component: FauteConfigurationLyceeModerneComponent,
    name: 'fautes.settings.lyceemoderne'
  }, 

  //Configurer les absences du college
  {
    path: '/fautes/settings/lycee/technique',
    component: FauteConfigurationLyceeTechniqueComponent,
    name: 'fautes.settings.lyceetechnique'
  }, 

  //Configurer les etats absences du college
  {
    path: '/etat/fautes/college',
    component: FauteEtatCollegeComponent,
    name: 'fautes.etat.fautes.college'
  }, 
  //Configurer les etats absences du lycee moderne
  {
    path: '/etat/fautes/lycee/moderne',
    component:  FauteEtatLyceeModerneComponent,
    name: 'fautes.etat.fautes.lyceemoderne'
  }, 
  //Configurer les etats absences du lycée technique
  {
    path: '/etat/fautes/lycee/technique',
    component:  FauteEtatLyceeTechniqueComponent,
    name: 'fautes.etat.fautes.lyceetechnique'
  }, 

  //Gerer les routes pour les finances

  //Acceuil
  {
    path: '/finances/home',
    component: FinancesHomeComponent,
    name: 'finances.home'
  }, 

  //Gestion de l'ecolage

  {
    path: '/finances/ecolage',
    component: FinancesEcolageEleveComponent,
    name: 'finances.ecolage'
  }, 

  {
    path: '/finances/ecolage/settings/college',
    component: FinancesConfigurationBaseEcolageCollegeComponent,
    name: 'finances.ecolage.settings.college'
  }, 

  {
    path: '/finances/ecolage/settings/lycee/moderne',
    component: FinancesConfigurationBaseEcolageLyceeModerneComponent,
    name: 'finances.ecolage.settings.lyceemoderne'
  }, 

  {
    path: '/finances/ecolage/settings/lycee/technique',
    component: FinancesConfigurationBaseEcolageLyceeTechniqueComponent,
    name: 'finances.ecolage.settings.lyceetechnique'
  }, 

  //Gestion des frais d'inscriptions

  {
    path: '/finances/inscriptions',
    component: FinancesInscriptionsEleveComponent,
    name: 'finances.inscriptions'
  }, 

  {
    path: '/finances/inscriptions/settings/college',
    component: FinancesConfigurationBaseInscriptionsCollegeComponent,
    name: 'finances.inscriptions.settings.college'
  }, 

  {
    path: '/finances/inscriptions/settings/lycee/moderne',
    component: FinancesConfigurationBaseInscriptionsLyceeModerneComponent,
    name: 'finances.inscriptions.settings.lyceemoderne'
  }, 

  {
    path: '/finances/inscriptions/settings/lycee/technique',
    component: FinancesConfigurationBaseInscriptionsLyceeTechniqueComponent,
    name: 'finances.inscriptions.settings.lyceetechnique'
  }, 

  
  //Gestion des frais d'examens

  {
    path: '/finances/examens',
    component:FinancesExamensEleveComponent,
    name: 'finances.examens'
  }, 

  {
    path: '/finances/examens/settings/college',
    component: FinancesConfigurationBaseExamensCollegeComponent,
    name: 'finances.examens.settings.college'
  }, 

  {
    path: '/finances/examens/settings/lycee/moderne',
    component: FinancesConfigurationBaseExamensLyceeModerneComponent,
    name: 'finances.examens.settings.lyceemoderne'
  }, 

  {
    path: '/finances/examens/settings/lycee/technique',
    component: FinancesConfigurationBaseExamensLyceeTechniqueComponent,
    name: 'finances.examens.settings.lyceetechnique'
  }, 

  //Gestion des autres frais

  {
    path: '/finances/autresfrais',
    component: FinancesAutresFraisComponent,
    name: 'finances.autresFrais'
  }, 

  //Gestion des frais d'achat de materiels

  {
    path: '/finances/materiels',
    component: FinancesAchatdeMaterielsComponent,
    name: 'finances.materiels'
  }, 

  {
    path: '/finances/achat/materiels',
    component: FinancesCreateAchatMaterielComponent,
    name: 'finances.materiels.achat'
  }, 

  
  //Gestion des frais de paiement de factures

  {
    path: '/finances/factures',
    component: FinancesFactureComponent,
    name: 'finances.factures'
  }, 

  {
    path: '/finances/paiement/factures',
    component: FinancesCreateFactureComponent,
    name: 'finances.factures.paiement'
  }, 

  //Gestion des salaires

  {
    path: '/finances/paiement/salaires',
    component: FinancesPayerSalaireComponent,
    name: 'finances.paiements.salaires'
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

  {
    path: '/settings/decisions/conseils/nouveaux/:id/show',
    component: SettingsStatutConseilsShowNouveauxComponent,
    name: 'settings.decisions.conseils.show.nouveaux'
  }, 

  {
    path: '/settings/decisions/conseils/nouveaux/:id/create',
    component: SettingsStatutConseilsCreateNouveauxComponent,
    name: 'settings.decisions.conseils.create.nouveaux'
  }, 


  {
    path: '/settings/decisions/conseils/nouveaux/:id/show/:decision_id/edit',
    component: SettingsStatutConseilsUpdateNouveauxComponent,
    name: 'settings.decisions.conseils.update.nouveaux'
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

  {
    path: '/settings/decisions/conseils/doublants/:id/show',
    component:  SettingsStatutConseilsShowDoublantsComponent,
    name: 'settings.decisions.conseils.show.doublants'
  }, 

  {
    path: '/settings/decisions/conseils/doublants/:id/create',
    component: SettingsStatutConseilsCreateDoublantsComponent,
    name: 'settings.decisions.conseils.create.doublants'
  }, 


  {
    path: '/settings/decisions/conseils/doublants/:id/show/:decision_id/edit',
    component: SettingsStatutConseilsUpdateDoublantsComponent,
    name: 'settings.decisions.conseils.update.doublants'
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

{
  path: '/settings/decisions/conseils/triplants/:id/show',
  component: SettingsStatutConseilsShowTriplantsComponent,
  name: 'settings.decisions.conseils.show.triplants'
}, 

{
  path: '/settings/decisions/conseils/triplants/:id/create',
  component: SettingsStatutConseilsCreateTriplantsComponent,
  name: 'settings.decisions.conseils.create.triplants'
}, 


{
  path: '/settings/decisions/conseils/triplants/:id/show/:decision_id/edit',
  component: SettingsStatutConseilsUpdateTriplantsComponent,
  name: 'settings.decisions.conseils.update.triplants'
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
    component: SettingsStatutConseilsQuadruplantsLyceeTechniqueComponent,
    name: 'SettingsStatutConseilsQuadruplantsLyceeTechniqueComponent'
  }, 
  
  {
    path: '/settings/decisions/conseils/quadruplants/:id/show',
    component: SettingsStatutConseilsShowQuadruplantsComponent,
    name: 'settings.decisions.conseils.show.quadruplants'
  }, 
  
  {
    path: '/settings/decisions/conseils/quadruplants/:id/create',
    component: SettingsStatutConseilsCreateQuadruplantsComponent,
    name: 'settings.decisions.conseils.create.quadruplants'
  }, 
  
  
  {
    path: '/settings/decisions/conseils/quadruplants/:id/show/:decision_id/edit',
    component: SettingsStatutConseilsUpdateQuadruplantsComponent,
    name: 'settings.decisions.conseils.update.quadruplants'
  }, 
  
  
  
  //Coordonnées de l'établissement
  {
    path: '/settings/coordonnees',
    component: SettingsCoordonneesComponent,
    name: 'settings.coordonnees'
  }, 

  {
    path: '/settings/coordonnees/edit',
    component: SettingsUpdateCoordonneesComponent,
    name: 'settings.coordonnees.update'
  }, 

  //Appreciation par matière
  {
    path: '/settings/appreciations/matieres',
    component: SettingsAppreciationMatiereComponent,
    name: 'settings.appreciations.matieres'
  }, 

  {
    path: '/settings/appreciations/matieres/create',
    component: SettingsCreateAppreciationMatiereComponent,
    name: 'settings.appreciations.matieres.create'
  }, 

  {
    path: '/settings/appreciations/matieres/:id/edit',
    component: SettingsUpdateAppreciationMatiereComponent,
    name: 'settings.appreciations.matieres.update'
  }, 

  //Appreciation par semestre
  {
    path: '/settings/appreciations/semestres/colleges',
    component: SettingsAppreciationSemestreClassesCollegeComponent,
    name: 'settings.appreciations.semestres.college'
  }, 

  {
    path: '/settings/appreciations/semestres/:id/show',
    component: SettingsAppreciationSemestreShowAppreciationComponent,
    name: 'settings.appreciations.semestres.show'
  }, 

  {
    path: '/settings/appreciations/semestres/:id/create',
    component: SettingsAppreciationSemestreCreateAppreciationSemestreComponent,
    name: 'settings.appreciations.semestres.create'
  }, 

  {
    path: '/settings/appreciations/semestres/:id/show/:appreciation_id/edit',
    component: SettingsAppreciationSemestreUpdateAppreciationSemestreComponent,
    name: 'settings.appreciations.semestres.update'
  }, 

  {
    path: '/settings/appreciations/semestres/lyceemoderne',
    component: SettingsAppreciationSemestreClassesLyceeModerneComponent,
    name: 'settings.appreciations.semestres.lyceemoderne'
  }, 

  {
    path: '/settings/appreciations/semestres/lyceetechnique',
    component: SettingsAppreciationSemestreClassesLyceeTechniqueComponent,
    name: 'settings.appreciations.semestres.lyceetechnique'
  }, 

  //Annee Scolaire
  {
    path: '/settings/annee-scolaire',
    component:  SettingsAnneeScolaireComponent,
    name: 'settings.annee-scolaire'
  }, 

    //Creer une rentrée scolaire
  {
    path: '/settings/annee-scolaire/create',
    component:  SettingsCreateAnneeScolaireComponent,
    name: 'settings.annee-scolaire.create'
  }, 

  {
    path: '/settings/annee-scolaire/:id/edit',
    component:  SettingsUpdateAnneeScolaireComponent,
    name: 'settings.annee-scolaire.update'
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

  {
    path: '/settings/users/:id/edit',
    component:  SettingsUpdateUsersComponent,
    name: 'settings.users.update'
  }, 

  {
    path: '/settings/users/:id/show/connexions',
    component:  SettingsShowConnexionsUsersComponent,
    name: 'settings.users.show.connexions'
  }, 

  {
    path: '/settings/users/:id/show/activity',
    component:  SettingsShowActivityUsersComponent,
    name: 'settings.users.show.activity'
  }, 
];

export default createRouter({
  history: createWebHistory(),
  routes
})