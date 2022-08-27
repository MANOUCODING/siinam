<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');
Route::view('/dashboard', 'dashboard');
Route::view('/login', 'welcome');

//Route pour la gestion des Classes 

Route::view('/matieres/litteraires', 'dashboard');

Route::view('/matieres/scientifiques', 'dashboard');

Route::view('/matieres/facultatifs', 'dashboard');

Route::view('/matieres/{id}/show', 'dashboard');

//Route pour la gestion des documents

Route::view('/documents/home', 'dashboard');

//Route pour la gestion des Classes 

Route::view('/classes/college', 'dashboard');

Route::view('/classes/college/create', 'dashboard');

Route::view('/classes/college/{id}/edit', 'dashboard');

Route::view('/classes/lyceetechnique', 'dashboard');

Route::view('/classes/lyceetechnique/create', 'dashboard');

Route::view('/classes/lyceetechnique/{id}/edit', 'dashboard');

Route::view('/classes/lyceemoderne/create', 'dashboard');

Route::view('/classes/lyceemoderne/{id}/edit', 'dashboard');

Route::view('/classes/lyceemoderne', 'dashboard');

Route::view('/classes/show/{id}/emploidutemps', 'dashboard');

//Route pour la gestion des enseignants

Route::view('/enseignants', 'dashboard');

Route::view('/enseignants/create', 'dashboard');

Route::view('/enseignants/{id}/edit', 'dashboard');

Route::view('/enseignants/{id}/show', 'dashboard');

//Route pour la gestion des éleves

Route::view('/eleves/create', 'dashboard');

Route::view('/eleves/colleges', 'dashboard');

Route::view('/eleves/lycee/moderne', 'dashboard');

Route::view('/eleves/lycee/technique', 'dashboard');

Route::view('/eleves/classes/{id}/status', 'dashboard');

Route::view('/eleves/classes/{classe_id}', 'dashboard');

Route::view('/eleves/classes/{classe_id}/nouveaux', 'dashboard');

Route::view('/eleves/classes/{classe_id}/anciens', 'dashboard');

//Route pour la gestion des absences

Route::view('/absences/home', 'dashboard');

Route::view('/absences/signaler', 'dashboard');

Route::view('/absences/settings/college', 'dashboard');

Route::view('/absences/settings/lycee/moderne', 'dashboard');

Route::view('/absences/settings/lycee/technique', 'dashboard');

Route::view('/etat/absences/college', 'dashboard');

Route::view('/etat/absences/lycee/moderne', 'dashboard');

Route::view('/etat/absences/lycee/technique', 'dashboard');

//Route pour la gestion des fautes

Route::view('/fautes/signaler', 'dashboard');

Route::view('/fautes/settings/college', 'dashboard');

Route::view('/fautes/settings/lycee/moderne', 'dashboard');

Route::view('/fautes/settings/lycee/technique', 'dashboard');

Route::view('/etat/fautes/college', 'dashboard');

Route::view('/etat/fautes/lycee/moderne', 'dashboard');

Route::view('/etat/fautes/lycee/technique', 'dashboard');

//Route pour la gestion des enseignants

Route::view('/affectations', 'dashboard');

//Route pour la gestion des finances

Route::view('/finances/home', 'dashboard');

//Route pour la gestion des finances pour l'ecolage

Route::view('/finances/ecolage', 'dashboard');

Route::view('/finances/ecolage/settings/college', 'dashboard');

Route::view('/finances/ecolage/settings/lycee/moderne', 'dashboard');

Route::view('/finances/ecolage/settings/lycee/technique', 'dashboard');


//Route pour la gestion des finances pour les frais d'inscriptions

Route::view('/finances/inscriptions', 'dashboard');

Route::view('/finances/inscriptions/settings/college', 'dashboard');

Route::view('/finances/inscriptions/settings/lycee/moderne', 'dashboard');

Route::view('/finances/inscriptions/settings/lycee/technique', 'dashboard');


//Route pour la gestion des finances pour les frais d'examens

Route::view('/finances/examens', 'dashboard');

Route::view('/finances/examens/settings/college', 'dashboard');

Route::view('/finances/examens/settings/lycee/moderne', 'dashboard');

Route::view('/finances/examens/settings/lycee/technique', 'dashboard');

//Route pour la gestion des finances pour les autres frais

Route::view('/finances/autresfrais', 'dashboard');

//Route pour la gestion des finances pour les  frais d'achats de materiels

Route::view('/finances/materiels', 'dashboard');

Route::view('/finances/achat/materiels', 'dashboard');


//Route pour la gestion des finances pour les  frais de paiement de facture

Route::view('/finances/factures', 'dashboard');

Route::view('/finances/paiement/factures', 'dashboard');

//Route pour la gestion des finances pour les  salaires

Route::view('/finances/paiement/salaires', 'dashboard');

//Route pour la gestion des paramètres

Route::view('/settings/home', 'dashboard');

Route::view('/settings/decisions/conseils', 'dashboard');

Route::view('/settings/decisions/status', 'dashboard');

//Route pour les decisions conseils des nouveaux eleves

Route::view('/settings/decisions/nouveaux/colleges', 'dashboard');

Route::view('/settings/decisions/nouveaux/lyceemoderne', 'dashboard');

Route::view('/settings/decisions/nouveaux/lyceetechnique', 'dashboard');

Route::view('/settings/decisions/conseils/nouveaux/{id}/show', 'dashboard');

Route::view('/settings/decisions/conseils/nouveaux/{id}/create', 'dashboard');

Route::view('/settings/decisions/conseils/nouveaux/{id}/show/{decision_id}/edit', 'dashboard');

//Route pour les decisions conseils des eleves doublants

Route::view('/settings/decisions/doublants/colleges', 'dashboard');

Route::view('/settings/decisions/doublants/lyceemoderne', 'dashboard');

Route::view('/settings/decisions/doublants/lyceetechnique', 'dashboard');

Route::view('/settings/decisions/conseils/doublants/{id}/show', 'dashboard');

Route::view('/settings/decisions/conseils/doublants/{id}/create', 'dashboard');

Route::view('/settings/decisions/conseils/doublants/{id}/show/{decision_id}/edit', 'dashboard');



//Route pour les decisions conseils des eleves triplants

Route::view('/settings/decisions/triplants/colleges', 'dashboard');

Route::view('/settings/decisions/triplants/lyceemoderne', 'dashboard');

Route::view('/settings/decisions/triplants/lyceetechnique', 'dashboard');

Route::view('/settings/decisions/conseils/triplants/{id}/show', 'dashboard');

Route::view('/settings/decisions/conseils/triplants/{id}/create', 'dashboard');

Route::view('/settings/decisions/conseils/triplants/{id}/show/{decision_id}/edit', 'dashboard');

//Route pour les decisions conseils des eleves quadruplants

Route::view('/settings/decisions/quadruplants/colleges', 'dashboard');

Route::view('/settings/decisions/quadruplants/lyceemoderne', 'dashboard');

Route::view('/settings/decisions/quadruplants/lyceetechnique', 'dashboard');

Route::view('/settings/decisions/conseils/quadruplants/{id}/show', 'dashboard');

Route::view('/settings/decisions/conseils/quadruplants/{id}/create', 'dashboard');

Route::view('/settings/decisions/conseils/quadruplants/{id}/show/{decision_id}/edit', 'dashboard');



Route::view('/settings/coordonnees', 'dashboard');

Route::view('/settings/coordonnees/edit', 'dashboard');

Route::view('/settings/appreciations/matieres', 'dashboard');

Route::view('/settings/appreciations/matieres/{id}/edit', 'dashboard');

Route::view('/settings/appreciations/matieres/create', 'dashboard');

Route::view('/settings/appreciations/semestres/colleges', 'dashboard');

Route::view('/settings/appreciations/semestres/{id}/show', 'dashboard');

Route::view('/settings/appreciations/semestres/{id}/show/{appreciation_id}/edit', 'dashboard');

Route::view('/settings/appreciations/semestres/{id}/create', 'dashboard');

Route::view('/settings/appreciations/semestres/lyceetechnique', 'dashboard');

Route::view('/settings/appreciations/semestres/lyceemoderne', 'dashboard');

Route::view('/settings/users', 'dashboard');

Route::view('/settings/users/{id}/show/connexions', 'dashboard');

Route::view('/settings/users/{id}/show/activity', 'dashboard');

Route::view('/settings/users/{id}/edit', 'dashboard');

Route::view('/settings/users/create', 'dashboard');

Route::view('/settings/annee-scolaire', 'dashboard');

Route::view('/settings/annee-scolaire/create', 'dashboard');

Route::view('/settings/annee-scolaire/{id}/edit', 'dashboard');