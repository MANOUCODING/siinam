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

//Route pour la gestion des Classes 

Route::view('/classes/college', 'dashboard');

Route::view('/classes/lyceetechnique', 'dashboard');

Route::view('/classes/lyceemoderne', 'dashboard');

//Route pour la gestion des enseignants

Route::view('/enseignants', 'dashboard');

Route::view('/enseignants/create', 'dashboard');

//Route pour la gestion des paramètres

Route::view('/settings/home', 'dashboard');

Route::view('/settings/decisions/conseils', 'dashboard');

Route::view('/settings/decisions/status', 'dashboard');

//Route pour les decisions conseils des nouveaux eleves

Route::view('/settings/decisions/nouveaux/colleges', 'dashboard');

Route::view('/settings/decisions/nouveaux/lyceemoderne', 'dashboard');

Route::view('/settings/decisions/nouveaux/lyceetechnique', 'dashboard');

//Route pour les decisions conseils des eleves doublants

Route::view('/settings/decisions/doublants/colleges', 'dashboard');

Route::view('/settings/decisions/doublants/lyceemoderne', 'dashboard');

Route::view('/settings/decisions/doublants/lyceetechnique', 'dashboard');


//Route pour les decisions conseils des eleves triplants

Route::view('/settings/decisions/triplants/colleges', 'dashboard');

Route::view('/settings/decisions/triplants/lyceemoderne', 'dashboard');

Route::view('/settings/decisions/triplants/lyceetechnique', 'dashboard');

//Route pour les decisions conseils des eleves quadruplants

Route::view('/settings/decisions/quadruplants/colleges', 'dashboard');

Route::view('/settings/decisions/quadruplants/lyceemoderne', 'dashboard');

Route::view('/settings/decisions/quadruplants/lyceetechnique', 'dashboard');



Route::view('/settings/coordonnees', 'dashboard');

Route::view('/settings/appreciations/matieres', 'dashboard');

Route::view('/settings/appreciations/semestres', 'dashboard');

Route::view('/settings/users', 'dashboard');

Route::view('/settings/users/create', 'dashboard');

Route::view('/settings/annee-scolaire', 'dashboard');