<?php

use App\Http\Controllers\Api\AppreciationMatiereController;
use App\Http\Controllers\Api\AppreciationSemestreController;
use App\Http\Controllers\Api\DecisionConseilController;
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
