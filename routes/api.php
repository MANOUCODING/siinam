<?php

use App\Http\Controllers\Api\AnneeScolaireController;
use App\Http\Controllers\Api\AppreciationMatiereController;
use App\Http\Controllers\Api\AppreciationSemestreController;
use App\Http\Controllers\Api\ClasseController;
use App\Http\Controllers\Api\DecisionConseilController;
use App\Http\Controllers\Api\EnseignantController;
use App\Http\Controllers\Api\MatiereController;
use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\AuthController;
use App\Models\AppreciationMatiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Partie Administration

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

    // Gestion de l'Authentification

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);

});

// Parametres Decision de conseil de fin d'année

Route::get('/settings/decisions/conseils', [DecisionConseilController::class, 'index']);

Route::get('/settings/decisions/conseils/create', [DecisionConseilController::class, 'create']);

Route::get('/settings/decisions/conseils/{id}/edit', [DecisionConseilController::class, 'edit']);

Route::post('/settings/decisions/conseils', [DecisionConseilController::class, 'store']);

Route::patch('/settings/decisions/conseils/{id}', [DecisionConseilController::class, 'update']);

Route::delete('/settings/decisions/conseils/{id}', [DecisionConseilController::class, 'destroy']);


// Parametres Rentree scolaire

Route::get('/settings/rentree/scolaire', [AnneeScolaireController::class, 'index']);

Route::get('/settings/rentree/scolaire/create', [AnneeScolaireController::class, 'create']);

Route::get('/settings/rentree/scolaire/{id}/edit', [AnneeScolaireController::class, 'edit']);

Route::post('/settings/rentree/scolaire', [AnneeScolaireController::class, 'store']);

Route::patch('/settings/rentree/scolaire/{id}', [AnneeScolaireController::class, 'update']);

Route::delete('/settings/rentree/scolaire/{id}', [AnneeScolaireController::class, 'destroy']);


// Parametres Apreciations par matiere

Route::get('/settings/appreciations/matieres', [AppreciationMatiereController::class, 'index']);

Route::get('/settings/appreciations/matieres/create', [AppreciationMatiereController::class, 'create']);

Route::get('/settings/appreciations/matieres/{id}/edit', [AppreciationMatiereController::class, 'edit']);

Route::post('/settings/appreciations/matieres', [AppreciationMatiereController::class, 'store']);

Route::patch('/settings/appreciations/matieres/{id}', [AppreciationMatiereController::class, 'update']);

Route::delete('/settings/appreciations/matieres/{id}', [AppreciationMatiereController::class, 'destroy']);


// Parametres Apreciations par Semestre

Route::get('/settings/appreciations/semestres', [AppreciationSemestreController::class, 'index']);

Route::get('/settings/appreciations/semestres/create', [AppreciationSemestreController::class, 'create']);

Route::get('/settings/appreciations/semestres/{id}/edit', [AppreciationSemestreController::class, 'edit']);

Route::post('/settings/appreciations/semestres', [AppreciationSemestreController::class, 'store']);

Route::patch('/settings/appreciations/semestres/{id}', [AppreciationSemestreController::class, 'update']);

Route::delete('/settings/appreciations/semestres/{id}', [AppreciationSemestreController::class, 'destroy']);



// Parametres Coordonnées de l'etablissement

Route::get('/settings/coordonnees', [SchoolController::class, 'index']);

Route::get('/settings/coordonnees/create', [SchoolController::class, 'create']);

Route::get('/settings/coordonnees/{id}/edit', [SchoolController::class, 'edit']);

Route::post('/settings/coordonnees', [SchoolController::class, 'store']);

Route::patch('/settings/coordonnees/{id}', [SchoolController::class, 'update']);

Route::delete('/settings/coordonnees/{id}', [SchoolController::class, 'destroy']);


// Gestion des classes

Route::get('/classes', [ClasseController::class, 'index']);

Route::get('/classes/create', [ClasseController::class, 'create']);

Route::get('/classes/{id}/edit', [ClasseController::class, 'edit']);

Route::post('/classes', [ClasseController::class, 'store']);

Route::patch('/classes/{id}', [ClasseController::class, 'update']);

Route::delete('/classes/{id}', [ClasseController::class, 'destroy']);

// Gestion des matieres

Route::get('/matieres', [MatiereController::class, 'index']);

Route::get('/matieres/create', [MatiereController::class, 'create']);

Route::get('/matieres/{id}/edit', [MatiereController::class, 'edit']);

Route::post('/matieres', [MatiereController::class, 'store']);

Route::patch('/matieres/{id}', [MatiereController::class, 'update']);

Route::delete('/matieres/{id}', [MatiereController::class, 'destroy']);

// Gestion des enseignants

Route::get('/enseignants', [EnseignantController::class, 'index']);

Route::get('/enseignants/create', [EnseignantController::class, 'create']);

Route::get('/enseignants/{id}/edit', [EnseignantController::class, 'edit']);

Route::post('/enseignants/store', [EnseignantController::class, 'store']);

Route::patch('/enseignants/{id}', [EnseignantController::class, 'update']);

Route::delete('/enseignants/{id}', [EnseignantController::class, 'destroy']);
