<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Eleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classeCount = Classe::count();

        if ($classeCount == 0) {

            return response()->json(['message' => 'Aucune classe n\'est enregistrée'], 200);

        } else {

            $anneeScolaires = AnneeScolaire::where('status', "En Cours")->count();

            if ($anneeScolaires == 0) {

                return response()->json(['message' => 'Aucune rentrée Scolaire en cours n\'est enregistrée'], 200);

            }else{

                $infosCollege = [];

                $infosLyceeModerne =  [];
    
                $infosLyceeTechnique = [];
    
                $classesCollege =  Classe::where('section', 'Collège')->get();
    
                $classesLyceeModerne =  Classe::where('section', 'Lycée Moderne')->get();
    
                $classesLyceeTechnique =  Classe::where('section', 'Lycée Technique')->get();
    
                $infosCollegeCount = DB::table("eleves")
                ->where("classes.section", "Collège")
                ->where("annee_scolaires.status", "En Cours")
                ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                ->count();
    
                $infosLyceeModerneCount =  DB::table("eleves")
                ->where("classes.section", "Lycée Moderne")
                ->where("annee_scolaires.status", "En Cours")
                ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                ->count();
    
                $infosLyceeTechniqueCount =  DB::table("eleves")
                ->where("classes.section", "Lycée Technique")
                ->where("annee_scolaires.status", "En Cours")
                ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                ->count();
    
    
                foreach ($classesCollege as $classe) {
    
                    $infosCollege[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'capacite' => $classe->capacite,
                        'nbreEleves' =>  DB::table("eleves")->where("annee_scolaires.status", "En Cours")
                        ->where("classes.id", $classe->id)
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->count(),
                        'nbreAnciens' => DB::table("eleves")->where("annee_scolaires.status", "En Cours")
                        ->where("classes.id", $classe->id)
                        ->where("eleves.category", "Ancien")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->count(),
                        'nbreNouveaux' => DB::table("eleves")->where("annee_scolaires.status", "En Cours")
                        ->where("classes.id", $classe->id)
                        ->where("eleves.category", "Nouveaux")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->count(),
                    ];
                }
    
                foreach ($classesLyceeModerne as $classe) {
    
                    $infosLyceeModerne[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'capacite' => $classe->capacite,
                        'nbreEleves' =>  DB::table("eleves")->where("annee_scolaires.status", "En Cours")
                        ->where("classes.id", $classe->id)
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->count(),
                        'nbreAnciens' => DB::table("eleves")->where("annee_scolaires.status", "En Cours")
                        ->where("classes.id", $classe->id)
                        ->where("eleves.category", "Ancien")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->count(),
                        'nbreNouveaux' => DB::table("eleves")->where("annee_scolaires.status", "En Cours")
                        ->where("classes.id", $classe->id)
                        ->where("eleves.category", "Nouveaux")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->count(),
                    ];
                }
    
                foreach ($classesLyceeTechnique as $classe) {
    
                    $infosLyceeTechnique[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'capacite' => $classe->capacite,
                        'nbreEleves' =>  DB::table("eleves")->where("annee_scolaires.status", "En Cours")
                        ->where("classes.id", $classe->id)
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->count(),
                        'nbreAnciens' => DB::table("eleves")->where("annee_scolaires.status", "En Cours")
                        ->where("classes.id", $classe->id)
                        ->where("eleves.category", "Ancien")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->count(),
                        'nbreNouveaux' => DB::table("eleves")->where("annee_scolaires.status", "En Cours")
                        ->where("classes.id", $classe->id)
                        ->where("eleves.category", "Nouveaux")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->count(),
                    ];
                }
    
                return response()->json([
                    'infosLyceeTechnique' => $infosLyceeTechnique,
                    'infosCollege' => $infosCollege,
                    'infosLyceeModerne' => $infosLyceeModerne,
                    'infosLyceeTechniqueCount' => $infosLyceeTechniqueCount,
                    'infosCollegeCount' => $infosCollegeCount,
                    'infosLyceeModerneCount' => $infosLyceeModerneCount
                ], 200);
                
                
            }

        }
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $classe = Classe::where('id', $id)->first();

        if ($classe == null) {

            return response()->json(['message' => 'Aucune classe Trouvée'], 200);

        } else {

            $anneeScolaires = AnneeScolaire::where('status', "En Cours")->count();

            if ($anneeScolaires == 0) {

                return response()->json(['message' => 'Aucune rentrée Scolaire en cours n\'est enregistrée'], 200);

            }else{
    
                $infosNouveauCount = DB::table("eleves")
                ->where("eleves.status", "NOUVEAU")
                ->where("classes.id", $id)
                ->where("annee_scolaires.status", "En Cours")
                ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                ->count();
    
                $infosDoublantCount =  DB::table("eleves")
                ->where("eleves.status", "DOUBLANT")
                ->where("classes.id", $id)
                ->where("annee_scolaires.status", "En Cours")
                ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                ->count();
    
                $infosTriplantCount =  DB::table("eleves")
                ->where("eleves.status", "TRIPLANT")
                ->where("classes.id", $id)
                ->where("annee_scolaires.status", "En Cours")
                ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                ->count();
    
                $infosQuadruplantCount =  DB::table("eleves")
                ->where("eleves.status", "QUADRUPLANT")
                ->where("classes.id", $id)
                ->where("annee_scolaires.status", "En Cours")
                ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                ->count();

                $infosQuintuplantCount =  DB::table("eleves")
                ->where("eleves.status", "QUINTUPLANT")
                ->where("classes.id", $id)
                ->where("annee_scolaires.status", "En Cours")
                ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                ->count();

                $infosAuDeLaCount =  DB::table("eleves")
                ->where("eleves.status", "AUDELA")
                ->where("classes.id", $id)
                ->where("annee_scolaires.status", "En Cours")
                ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                ->count();
                
    
                return response()->json([
                    'infosNouveauCount' => $infosNouveauCount,
                    'infosDoublantCount' => $infosDoublantCount,
                    'infosTriplantCount' => $infosTriplantCount,
                    'infosQuadruplantCount' => $infosQuadruplantCount,
                    'infosQuintuplantCount' => $infosQuintuplantCount,
                    'infosAuDeLaCount' => $infosAuDeLaCount,
                    'classe' => $classe
                ], 200);
                
                
            }

        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showClasses($id)
    {
        $classe = Classe::where('id', $id)->first();

        if ($classe == null) {

            return response()->json(['message' => 'Aucune classe Trouvée'], 200);

        } else {

            $anneeScolaires = AnneeScolaire::where('status', "En Cours")->count();

            if ($anneeScolaires == 0) {

                return response()->json(['message' => 'Aucune rentrée Scolaire en cours n\'est enregistrée'], 200);

            }else{
    
                $infosTotalCount = DB::table("eleves")
                ->where("classes.id", $id)
                ->where("annee_scolaires.status", "En Cours")
                ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                ->count();
    
                $infosAnciensCount =  DB::table("eleves")
                ->where("eleves.category", "ANCIEN")
                ->where("classes.id", $id)
                ->where("annee_scolaires.status", "En Cours")
                ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                ->count();
    
                $infosInscritCount =  DB::table("eleves")
                ->where("eleves.category", "INSCRIT")
                ->where("classes.id", $id)
                ->where("annee_scolaires.status", "En Cours")
                ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                ->count();
                
                if ( $infosTotalCount === 0) {
                    return response()->json([
                        'infosTotalCount' => $infosTotalCount,
                        'infosAnciensCount' => $infosAnciensCount,
                        'infosInscritCount' => $infosInscritCount,
                        'message' => "Ooops il n'y a aucun élève appartenant à cette classe",
                        'classe' => $classe
                    ], 200);
                } else {
                    if ( ($infosAnciensCount === 0)  && ($infosInscritCount !== 0)) {
                        $infosInscrit =  DB::table("eleves")
                        ->where("eleves.category", "INSCRIT")
                        ->where("classes.id", $id)
                        ->where("annee_scolaires.status", "En Cours")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->get();
                        $infosTotal = DB::table("eleves")
                        ->where("classes.id", $id)
                        ->where("annee_scolaires.status", "En Cours")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->get();
                        return response()->json([
                            'infosTotalCount' => $infosTotalCount,
                            'infosAnciensCount' => $infosAnciensCount,
                            'infosInscritCount' => $infosInscritCount,
                            'infosInscrit' => $infosInscrit,
                            'infosTotal' => $infosTotal,
                            'message' => "Ooops il n' y a aucun élève inscrit dans cette classe",
                            'classe' => $classe
                        ], 200);
                    }else if (($infosAnciensCount !== 0)  && ($infosInscritCount === 0)) {
                        $infosAnciens =  DB::table("eleves")
                        ->where("eleves.category", "ANCIEN")
                        ->where("classes.id", $id)
                        ->where("annee_scolaires.status", "En Cours")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->get();
                        $infosTotal = DB::table("eleves")
                        ->where("classes.id", $id)
                        ->where("annee_scolaires.status", "En Cours")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->get();
                        return response()->json([
                            'infosTotalCount' => $infosTotalCount,
                            'infosAnciensCount' => $infosAnciensCount,
                            'infosInscritCount' => $infosInscritCount,
                            'infosAnciens' => $infosAnciens,
                            'infosTotal' => $infosTotal,
                            'message' => "Ooops il n' y a aucun ancien élève dans cette classe",
                            'classe' => $classe
                        ], 200);
                    }else{
                        $infosInscrit =  DB::table("eleves")
                        ->where("eleves.category", "INSCRIT")
                        ->where("classes.id", $id)
                        ->where("annee_scolaires.status", "En Cours")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->get();
                        $infosAnciens =  DB::table("eleves")
                        ->where("eleves.category", "ANCIEN")
                        ->where("classes.id", $id)
                        ->where("annee_scolaires.status", "En Cours")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->get();
                        $infosTotal = DB::table("eleves")
                        ->where("classes.id", $id)
                        ->where("annee_scolaires.status", "En Cours")
                        ->leftJoin("classes", "classes.id", "=", "eleves.classe_id")
                        ->leftJoin("annee_scolaires", "annee_scolaires.id", "=", "eleves.anneeScolaire_id")
                        ->get();
                        return response()->json([
                            'infosTotalCount' => $infosTotalCount,
                            'infosAnciensCount' => $infosAnciensCount,
                            'infosInscritCount' => $infosInscritCount,
                            'infosAnciens' => $infosAnciens,
                            'infosTotal' => $infosTotal,
                            'infosInscrit' => $infosInscrit,
                            'message' => "liste de tous les eleves",
                            'classe' => $classe
                        ], 200);
                    }
                }            
            }

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function stepOne($section){

        $classes = Classe::where('section', $section)->get();

        if($classes == null){

            return response()->json(['classes' => $classes, "message" => "Ooops Erreur. Veuillez choisir la section afin de trouvez les classes correspondantes"], 200);

        }else{

            return response()->json(['classes' => $classes, "message" => "Les classes"], 200);

        }

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classeCount = Classe::count();

        if ($classeCount == 0) {

            return response()->json(['message' => 'Aucune classe n\'est enregistrée'], 200);

        } else {

            $anneeScolaires = AnneeScolaire::where('status', "En Cours")->count();

            if ($anneeScolaires == 0) {

                return response()->json(['message' => 'Aucune rentrée Scolaire en cours n\'est enregistrée'], 200);

            }else{
                return response()->json(['message' => 'Inscription d\'un élève'], 200);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
