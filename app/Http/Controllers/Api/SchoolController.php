<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolController extends BaseController
{
    // public function __construct() {

    //     $this->middleware('auth:api');

    // }

    public function index(){

        $school = School::all();

        if (count($school) == 0) {

            return response()->json([
                'message' => 'Aucune information n\'est enregistrée',
            ], 200);

        } else {

            return response()->json([
                'message' => 'liste de toutes les informations',
                'school' => $school
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
            'school' => [
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

            return  $this->sendError( 'Erreur de validation' , $validator->errors());

        }
        
        $school = School::create($datas);

        return $this->sendResponse($school, 'Informations de l\'ecole enregistrées avec succès.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        try {
            $school = School::findOrFail(1);



            return $this->sendResponse(['school' => $school], 'Informations de l\'ecole sélectionnée.');

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
    public function update(Request $request)
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
            return  $this->sendError( 'Erreur de validation' , $validator->errors());
        }
        $school = School::findOrFail(1);

        $school->update($datas);

        return $this->sendResponse($school, 'Informations de l\'ecole modifiées avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $school->delete();
        return $this->sendResponse($school, 'Les informations ont été supprimées avec succès.');
    }
}
