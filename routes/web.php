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

//Route pour la gestion des paramètres

Route::view('/settings/home', 'settings.home');

Route::view('/settings/decisions/conseils', 'settings.conseils.conseils');

Route::view('/settings/coordonnees', 'settings.coordonnees.coordonnees');

Route::view('/settings/appreciations/matieres', 'settings.appreciationMatiere.appreciationmatiere');

Route::view('/settings/appreciations/semestres', 'settings.appreciationSemestre.appreciationsemestre');

Route::view('/settings/users', 'settings.users.users');

Route::view('/settings/users/create', 'settings.users.users');

Route::view('/settings/annee-scolaire', 'settings.anneeScolaire.annee-scolaire');