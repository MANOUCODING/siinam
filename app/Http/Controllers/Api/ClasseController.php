<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classe;
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
                'nomEtablissement' => '',
                'addressLine1' => '',
                'addressLine2' => '',
                'nomResponsable' => '',
                'posteResponsable' => '',
                'nomDRE' => '',
                'nomIESEG' => ''

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
            'nomEtablissement' => 'required|string|between:2,100',
            'addressLine1' => 'required|string',
            'addressLine2' => 'required|string',
            'nomResponsable' => 'required|string|between:2,100',
            'posteResponsable' => 'required|string',
            'nomDRE' => 'required|string',
            'nomIESEG' => 'required|string',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
       $classe = Classe::create($datas);

        return $this->sendResponse($classe, 'Informations de l\'ecole enregistrées avec succès.');
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
            'nomEtablissement' => 'required|string|between:2,100',
            'addressLine1' => 'required|string',
            'addressLine2' => 'required|string',
            'nomResponsable' => 'required|string|between:2,100',
            'posteResponsable' => 'required|string',
            'nomDRE' => 'required|string',
            'nomIESEG' => 'required|string',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
       $classe = Classe::findOrFail($id);

       $classe->update($datas);

        return $this->sendResponse($classe, 'Informations de l\'ecole modifiées avec succès.');
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
