<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\SousClasse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClasseController extends BaseController
{
    // public function __construct() {

    //     $this->middleware('auth:api');

    // }

    public function index(){

       $classes = Classe::count();

       $classesCollege = Classe::where('section', 'Collège')->get();

       $classesLyceeModerne = Classe::where('section', 'Lycée Moderne')->get();

       $classesLyceeTechnique = Classe::where('section', 'Lycée Technique')->get();

       $classesCollegeCount = Classe::where('section', 'Collège')->count();

       $classesLyceeModerneCount = Classe::where('section', 'Lycée Moderne')->count();

       $classesLyceeTechniqueCount = Classe::where('section', 'Lycée Technique')->count();

        if ($classes == 0) {

            return response()->json([
                'message' => 'Aucune classe n\'est enregistrée',
                'classesCollegeCount' => $classesCollegeCount,
                'classesLyceeModerneCount' => $classesLyceeModerneCount,
                'classesLyceeTechniqueCount' => $classesLyceeTechniqueCount,
            ], 200);

        } else {

            return response()->json([
                'message' => 'liste de toutes les classes',
                'classesCollege' => $classesCollege,
                'classesLyceeModerne' => $classesLyceeModerne,
                'classesLyceeTechnique' => $classesLyceeTechnique,
                'classesCollegeCount' => $classesCollegeCount,
                'classesLyceeModerneCount' => $classesLyceeModerneCount,
                'classesLyceeTechniqueCount' => $classesLyceeTechniqueCount,

            ], 200);

        }
    }

    public function college(){
       

       $classesCollege = Classe::where('section', 'Collège')->get();

       $classesCollegeCount = Classe::where('section', 'Collège')->count();

       $classesLyceeModerneCount = Classe::where('section', 'Lycée Moderne')->count();

       $classesLyceeTechniqueCount = Classe::where('section', 'Lycée Technique')->count();

        if ( $classesCollegeCount == 0) {

            return response()->json([
                'message' => 'Aucune classe du collège n\'est enregistrée',
                'classesCollegeCount' => $classesCollegeCount,
                'classesLyceeModerneCount' => $classesLyceeModerneCount,
                'classesLyceeTechniqueCount' => $classesLyceeTechniqueCount,
            ], 200);

        } else {

            return response()->json([
                'message' => 'liste de toutes les classes',
                'classesCollege' => $classesCollege,
                'classesCollegeCount' => $classesCollegeCount,
                'classesLyceeModerneCount' => $classesLyceeModerneCount,
                'classesLyceeTechniqueCount' => $classesLyceeTechniqueCount,

            ], 200);

        }

    }

    public function lyceemoderne(){
       

        $classesLyceeModerne = Classe::where('section', 'Lycée Moderne')->get();
 
        $classesCollegeCount = Classe::where('section', 'Collège')->count();
 
        $classesLyceeModerneCount = Classe::where('section', 'Lycée Moderne')->count();
 
        $classesLyceeTechniqueCount = Classe::where('section', 'Lycée Technique')->count();
 
         if ( $classesLyceeModerneCount == 0) {
 
             return response()->json([
                 'message' => 'Aucune classe du lycée moderne n\'est enregistrée',
                 'classesCollegeCount' => $classesCollegeCount,
                 'classesLyceeModerneCount' => $classesLyceeModerneCount,
                 'classesLyceeTechniqueCount' => $classesLyceeTechniqueCount,
             ], 200);
 
         } else {
 
             return response()->json([
                 'message' => 'liste de toutes les classes',
                 'classesLyceeModerne' => $classesLyceeModerne,
                 'classesCollegeCount' => $classesCollegeCount,
                 'classesLyceeModerneCount' => $classesLyceeModerneCount,
                 'classesLyceeTechniqueCount' => $classesLyceeTechniqueCount,
 
             ], 200);
 
         }
 
     }

     public function lyceetechnique(){
       

        $classesLyceeTechnique = Classe::where('section', 'Lycée Technique')->get();
 
        $classesCollegeCount = Classe::where('section', 'Collège')->count();
 
        $classesLyceeModerneCount = Classe::where('section', 'Lycée Moderne')->count();
 
        $classesLyceeTechniqueCount = Classe::where('section', 'Lycée Technique')->count();
 
         if ($classesLyceeTechniqueCount == 0) {
 
             return response()->json([
                 'message' => 'Aucune classe du lycée technique n\'est enregistrée',
                 'classesCollegeCount' => $classesCollegeCount,
                 'classesLyceeModerneCount' => $classesLyceeModerneCount,
                 'classesLyceeTechniqueCount' => $classesLyceeTechniqueCount,
             ], 200);
 
         } else {
 
             return response()->json([
                 'message' => 'liste de toutes les classes',
                 'classesLyceeTechnique' => $classesLyceeTechnique,
                 'classesCollegeCount' => $classesCollegeCount,
                 'classesLyceeModerneCount' => $classesLyceeModerneCount,
                 'classesLyceeTechniqueCount' => $classesLyceeTechniqueCount,
 
             ], 200);
 
         }
 
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return response()->json([
            'message' => 'Formulaire d\'enregistrement',
            'classes' => [
                'nomClasse' => '',
                'codeClasse' => '',
                'cycle' => ['Premier', 'Deuxième'],
                'section' => ['Lycée', 'Collège'],
                'finDeCycle' => 0,
                'classeSuperieure' => Classe::all(),
                'capacite' => 0
            ],

        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {

        $datas = $request->all();
        $validator = Validator::make($datas, [
            'nomClasse' => 'required|string|between:2,100',
            'codeClasse' => 'required|string',
            'cycle' => 'required|string',
            'section' => 'required|string|between:2,100',
            'finDeCycle' => 'required|integer',
            'classeSuperieure' => 'required|string',
            'capacite' => 'required|integer',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
       $classe = Classe::create($datas);

        return $this->sendResponse($classe, 'La classe a été enregistrée avec succès.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        try {
           $classe = Classe::findOrFail($id);



            return response()->json([$classe]);

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune Information trouvée.');

        }

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
        $datas = $request->all();
        $validator = Validator::make($datas, [
            'nomClasse' => 'required|string|between:2,100',
            'codeClasse' => 'required|string',
            'cycle' => 'required|string',
            'section' => 'required|string|between:2,100',
            'finDeCycle' => 'required|integer',
            'classeSuperieure' => 'required|string',
            'capacite' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $classe = Classe::findOrFail($id);

        $classe->update($datas);

        return $this->sendResponse($classe, 'Informations de l\'ecole modifiées avec succès.');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activerSousClasse(Request $request, $id)
    {

        $classeM = Classe::where('id', $id)->first();

        if (!$classeM->sousClasses) {

            $classe = Classe::findOrFail($id);

            $classe->sousClasses = 1;

            $classe->update();

        }

        return $this->sendResponse( $classe, 'Les sous classes ont ete autorisé avec succès ');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GenererSousClasse(Request $request, $id)
    {

        $datas = $request->all();

        $validator = Validator::make($datas, [

            'nbreSousClasses' => 'required|integer',

        ]);

        if($validator->fails()){

            return response()->json($validator->errors()->toJson(), 400);

        }

        $classe = Classe::findOrFail($id);

        $items = ['0' => "A", '1' => "B", '2' => "C", '3' => "D", '4' => "E", '5' => "F" ];

        if (($classe->section == "Collège") || ($classe->section == "Lycée Technique")) {

            for ($i=0; $i < $datas['nbreSousClasses'] ; $i++) {

               $sousClasse = [

                'codeClasse' => $classe->codeClasse.'-'.$items[$i],

                'nomClasse' => $classe->nomClasse.'-'.$items[$i],

                'classe_id' => $classe->id

               ];

               SousClasse::create($sousClasse);

            }

        }else {

            for ($i=0; $i < $datas['nbreSousClasses'] ; $i++) {

                $sousClasse = [

                 'codeClasse' => $classe->codeClasse.'-'.$i,

                 'nomClasse' => $classe->nomClasse.'-'.$i,

                 'classe_id' => $classe->id

                ];

                SousClasse::create($sousClasse);

             }

        }


        return $this->sendResponse( $classe, 'Les sous classes ont ete créées avec succès ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroySousClasse($id)
    {
        $sousClasse = SousClasse::findOrFail($id);
        $sousClasse->delete();
        return $this->sendResponse($sousClasse, 'Les informations ont été supprimées avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $classe = Classe::findOrFail($id);
       $classe->delete();
        return $this->sendResponse($classe, 'la classe a été supprimée avec succès.');
    }
}
