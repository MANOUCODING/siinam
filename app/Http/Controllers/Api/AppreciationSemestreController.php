<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppreciationSemestre;
use App\Models\Classe;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AppreciationSemestreController extends  BaseController
{
    // public function __construct() {

    //     $this->middleware('auth:api');

    // }

    public function college(){

        $classesCollegeCount = Classe::where('section', 'Collège')->count();

        if ( $classesCollegeCount == 0) {

            return $this->sendError('Aucune  Classe du collège n\'est enregistrée', $classesCollegeCount);

        } else {

            $appreciationSemestresCollegeCount = DB::table("appreciation_semestres")
            ->where("classes.section", "Collège")
            ->leftJoin("classes", "classes.id", "=", "appreciation_semestres.classe_id")
            ->count();

            $appreciationSemestresLyceeModerneCount = DB::table("appreciation_semestres")
            ->where("classes.section", "Lycée Moderne")
            ->leftJoin("classes", "classes.id", "=", "appreciation_semestres.classe_id")
            ->count();

            $appreciationSemestresLyceeTechniqueCount = DB::table("appreciation_semestres")
            ->where("classes.section", "Lycée Technique")
            ->leftJoin("classes", "classes.id", "=", "appreciation_semestres.classe_id")
            ->count();
           
            $appreciationSemestres =  DB::table("classes") ->select(array("classes.id", "classes.codeClasse", "classes.nomClasse", "classes.section" ,DB::raw('COUNT(appreciation_semestres.id) as nbre_appreciation_semestres')))
            ->where( "classes.section", "=", "Collège")
            ->leftJoin("appreciation_semestres", "appreciation_semestres.classe_id", "=", "classes.id")
            ->groupBy("classes.id", "classes.codeClasse", "classes.nomClasse", "classes.section")
            ->orderBy('nbre_appreciation_semestres', 'desc')
            ->get();
        }
            return $this->sendResponse([
              "appreciationSemestres" =>  $appreciationSemestres, 
              "appreciationSemestresLyceeTechniqueCount" => $appreciationSemestresLyceeTechniqueCount,       "appreciationSemestresLyceeModerneCount" => $appreciationSemestresLyceeModerneCount,  "appreciationSemestresCollegeCount" => $appreciationSemestresCollegeCount 
            ], 'liste de toutes les appréciations par semestre du collège.');
        
    }

    public function lyceeModerne(){

        $classesCollegeCount = Classe::where('section', 'Lycée Moderne')->count();

        if ( $classesCollegeCount == 0) {

            return $this->sendError('Aucune  Classe du lycée moderne n\'est enregistrée', $classesCollegeCount);

        } else {

            $appreciationSemestresCollegeCount = DB::table("appreciation_semestres")
            ->where("classes.section", "Collège")
            ->leftJoin("classes", "classes.id", "=", "appreciation_semestres.classe_id")
            ->count();

            $appreciationSemestresLyceeModerneCount = DB::table("appreciation_semestres")
            ->where("classes.section", "Lycée Moderne")
            ->leftJoin("classes", "classes.id", "=", "appreciation_semestres.classe_id")
            ->count();

            $appreciationSemestresLyceeTechniqueCount = DB::table("appreciation_semestres")
            ->where("classes.section", "Lycée Technique")
            ->leftJoin("classes", "classes.id", "=", "appreciation_semestres.classe_id")
            ->count();
           
            $appreciationSemestres =  DB::table("classes") ->select(array("classes.id", "classes.codeClasse", "classes.nomClasse", "classes.section" ,DB::raw('COUNT(appreciation_semestres.id) as nbre_appreciation_semestres')))
            ->where( "classes.section", "=", "Lycée Moderne")
            ->leftJoin("appreciation_semestres", "appreciation_semestres.classe_id", "=", "classes.id")
            ->groupBy("classes.id", "classes.codeClasse", "classes.nomClasse", "classes.section")
            ->orderBy('nbre_appreciation_semestres', 'desc')
            ->get();
        }
            return $this->sendResponse([
              "appreciationSemestres" =>  $appreciationSemestres, 
              "appreciationSemestresLyceeTechniqueCount" => $appreciationSemestresLyceeTechniqueCount,       "appreciationSemestresLyceeModerneCount" => $appreciationSemestresLyceeModerneCount,  "appreciationSemestresCollegeCount" => $appreciationSemestresCollegeCount 
            ], 'liste de toutes les appréciations par semestre du Lycée Moderne.');
        
    }

    public function lyceeTechnique(){

        $classesCollegeCount = Classe::where('section', 'Lycée Technique')->count();

        if ( $classesCollegeCount == 0) {

            return $this->sendError('Aucune  Classe du lycée technique n\'est enregistrée', $classesCollegeCount);

        } else {

            $appreciationSemestresCollegeCount = DB::table("appreciation_semestres")
            ->where("classes.section", "Collège")
            ->leftJoin("classes", "classes.id", "=", "appreciation_semestres.classe_id")
            ->count();

            $appreciationSemestresLyceeModerneCount = DB::table("appreciation_semestres")
            ->where("classes.section", "Lycée Moderne")
            ->leftJoin("classes", "classes.id", "=", "appreciation_semestres.classe_id")
            ->count();

            $appreciationSemestresLyceeTechniqueCount = DB::table("appreciation_semestres")
            ->where("classes.section", "Lycée Technique")
            ->leftJoin("classes", "classes.id", "=", "appreciation_semestres.classe_id")
            ->count();
           
            $appreciationSemestres =  DB::table("classes") ->select(array("classes.id", "classes.codeClasse", "classes.nomClasse", "classes.section" ,DB::raw('COUNT(appreciation_semestres.id) as nbre_appreciation_semestres')))
            ->where( "classes.section", "=", "Lycée Technique")
            ->leftJoin("appreciation_semestres", "appreciation_semestres.classe_id", "=", "classes.id")
            ->groupBy("classes.id", "classes.codeClasse", "classes.nomClasse", "classes.section")
            ->orderBy('nbre_appreciation_semestres', 'desc')
            ->get();
        }
            return $this->sendResponse([
              "appreciationSemestres" =>  $appreciationSemestres, 
              "appreciationSemestresLyceeTechniqueCount" => $appreciationSemestresLyceeTechniqueCount,       "appreciationSemestresLyceeModerneCount" => $appreciationSemestresLyceeModerneCount,  "appreciationSemestresCollegeCount" => $appreciationSemestresCollegeCount 
            ], 'liste de toutes les appréciations par semestre du Lycée Technique.');
        
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        try {

            $classeCount = Classe::select('id', 'codeClasse')->where('id',$id)->count();

            if($classeCount !== 0){

                $classe = Classe::select('id', 'codeClasse')->where('id',$id)->first();

                return response()->json(['classe' => $classe]);

            }else{

                return $this->sendError('Aucune classe trouvée.');

            }

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune classe trouvée.' );

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $id) {

        $datas = $request->all();

        $validator = Validator::make($datas, [
            'appreciation' => 'required|string|between:2,100',
            'moyFaible' => 'required|integer',
            'moyFort' => 'required|integer',
        ]);

        if($validator->fails()){

            return $this->sendError("Erreur de validation", $validator->errors());

        }

        if ($datas['moyFort'] >= 0  && $datas['moyFaible'] <= 20) {

            if ($datas['moyFort'] < $datas['moyFaible']) {

                $datas['moyFort'] = number_format((float)$datas['moyFort'], 2, ',', '');

                $datas['moyFaible'] = number_format((float)$datas['moyFaible'], 2, ',', '');

                $classe = Classe::select('id', 'codeClasse')->where('id',$id)->first();

                $datas['classe_id'] = $classe->id;

                $appreciationSemestre = AppreciationSemestre::create($datas);

                return $this->sendResponse($appreciationSemestre, 'Appréciation enregistrée avec succès.');

            } else {
                return $this->sendError('Ooops ! Desolé, verifiez l\'ecart de vos moyennes');
            }

        } else {
            return $this->sendError('Ooops ! Desolé, vos moyennes doivent être positive et compris entre 0 et 20');
        }


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $appreciation_id)
    {

        try {

            $classeCount = Classe::select('id', 'codeClasse')->where('id',$id)->count();

            if($classeCount !== 0){

                $classe = Classe::select('id', 'codeClasse')->where('id',$id)->first();

                if ( $classe == null) {

                    return response()->json(['message' => 'Aucune Information trouvée.']);
                   
                } else {

                    $appreciationSemestre = AppreciationSemestre::where('id',$appreciation_id)->where('classe_id', $id)->first();

                    if ( $appreciationSemestre == null ) {
                    
                        return response()->json(['classe' => $classe, 'message' => 'Aucune Information trouvée.']);

                    } else {
                    
                        return response()->json(['classe' => $classe, 'appreciationSemestre' => $appreciationSemestre]);

                    }

                }

            }else{

                return $this->sendError('Aucune classe trouvée.');

            }

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune classe trouvée.' );

        }

    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {

            $classeCount = Classe::select('id', 'codeClasse')->where('id',$id)->count();

            if($classeCount !== 0){

                $classe = Classe::select('id', 'codeClasse')->where('id',$id)->first();

                $appreciationSemestreCount = AppreciationSemestre::where('classe_id',$id)->count();

                if ($appreciationSemestreCount == 0) {

                    return $this->sendResponse(["classe" =>  $classe ], 'Aucune appréciation trouvée.');
    
                } else {
    
                    $appreciationSemestre = AppreciationSemestre::where('classe_id',$id)->get();
    
                    return response()->json(['appreciationSemestre' => $appreciationSemestre, 'classe' => $classe]);
                }

            }else{

                return $this->sendError('Aucune classe trouvée.');

            }

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune appréciation trouvée.' );

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $appreciation_id)
    {
        $datas = $request->all();

        $validator = Validator::make($datas, [
            'appreciation' => 'required|string|between:2,100',
            'moyFaible' => 'required|integer',
            'moyFort' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        if ($datas['moyFort'] >= 0  && $datas['moyFaible'] <= 20) {

            if ($datas['moyFort'] < $datas['moyFaible']) {

                $datas['moyFort'] = number_format((float)$datas['moyFort'], 2, ',', '');

                $datas['moyFaible'] = number_format((float)$datas['moyFaible'], 2, ',', '');

                $appreciationSemestre = AppreciationSemestre::findOrFail($appreciation_id);

                $appreciationSemestre->update($datas);

                return $this->sendResponse($appreciationSemestre, 'Appreciation modifiée avec succès.');

            } else {
                return $this->sendError('Ooops ! Desolé, verifiez l\'ecart de vos moyennes');
            }

        } else {
            return $this->sendError('Ooops ! Desolé, vos moyennes doivent être positive et compris entre 0 et 20');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appreciationSemestre = AppreciationSemestre::findOrFail($id);
        $appreciationSemestre->delete();
        return $this->sendResponse($appreciationSemestre, 'L\' appréciation été supprimée avec succès.');
    }

    public function destroyAll($id)
    {
        $appreciationSemestre = AppreciationSemestre::where('classe_id', $id)->get();
        foreach($appreciationSemestre as $appreciation){
            $appreciation->delete();
        }
        return $this->sendResponse($appreciationSemestre, 'Toutes les appréciations de cette classe ont été supprimée avec succès.');
    }
}
