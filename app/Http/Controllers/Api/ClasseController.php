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

       $classes = Classe::all();

        if (count($classes) == 0) {

            return response()->json([
                'message' => 'Aucune classe n\'est enregistrée',
            ], 201);

        } else {

            return response()->json([
                'message' => 'liste de toutes les classes',
                'classes' =>$classes
            ], 201);

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
           
        ], 201);
        
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
        return $this->sendResponse($classe, 'Les informations ont été supprimées avec succès.');
    }
}
