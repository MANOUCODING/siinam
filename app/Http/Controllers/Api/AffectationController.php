<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AffectationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::count();

        if ($classes == 0) {

            return response()->json(['message' => 'Aucune classe n\'est enregistrée'], 200);

        } else {
            
            $enseignants = Enseignant::count();

            if ($enseignants == 0) {

                return response()->json(['message' => 'Aucun enseignant n\'est enregistré'], 200);
            } else {

                $matieres = Matiere::count();

                if ($matieres == 0) {
    
                    return response()->json(['message' => 'Aucune matiere n\'est enregistrée'], 200);

                } else {
                   
                    $anneeScolaires = AnneeScolaire::count();

                    if ($anneeScolaires == 0) {
    
                        return response()->json(['message' => 'Aucune matiere n\'est enregistrée'], 200);
    
                    }else{
                        $affectationsMatieresLitteraires = DB::table("enseignants") ->select(array("enseignants.id", "enseignants.nom", "enseignants.prenoms","enseignants.telephone", DB::raw('COUNT(affectations.id) as nbre_affectations')))
                        ->where("matieres.Categorie", "Matières Littéraires")
                        ->leftJoin("affectations", "affectations.enseignant_id", "=", "enseignants.id")
                        ->leftJoin("matieres", "matieres.id", "=", "affectations.matiere_id")
                        ->groupBy("enseignants.id", "enseignants.nom", "enseignants.prenoms","enseignants.telephone")
                        ->orderBy('nbre_affectations', 'desc')
                        ->get();

                        $affectationsMatieresLitterairesCount = DB::table("enseignants")
                        ->where("matieres.Categorie", "Matières Littéraires")
                        ->leftJoin("matieres", "matieres.id", "=", "affectations.matiere_id")
                        ->count();
                        
                    }

                }
            }

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
