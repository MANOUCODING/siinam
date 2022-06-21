<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatiereController extends BaseController
{
    // public function __construct() {

    //     $this->middleware('auth:api');

    // }

    public function index(){

        $matieres = Matiere::count();

        $MatieresScientifiques = Matiere::where('Categorie', 'Matières Scientifiques')->get();

        $MatieresLitteraires = Matiere::where('Categorie', 'Matières Littéraires')->get();

        $MatieresFacultatives = Matiere::where('Categorie', 'Matières Facultatives')->get();

        $MatieresScientifiquesCount = Matiere::where('Categorie', 'Matières Scientifiques')->count();

        $MatieresLitterairesCount = Matiere::where('Categorie', 'Matières Littéraires')->count();

        $MatieresFacultativesCount = Matiere::where('Categorie', 'Matières Facultatives')->count();

        if ($matieres == 0) {

            return response()->json([
                'message' => 'Aucune matière n\'est enregistrée',
                'MatieresScientifiquesCount' =>  $MatieresScientifiquesCount,
                'MatieresLitterairesCount' => $MatieresLitterairesCount,
                'MatieresFacultativesCount' => $MatieresFacultativesCount,
            ], 200);

        } else {

            return response()->json([
                'message' => 'liste de toutes les matières',
                'MatieresScientifiquesCount' =>  $MatieresScientifiquesCount,
                'MatieresLitterairesCount' => $MatieresLitterairesCount,
                'MatieresFacultativesCount' => $MatieresFacultativesCount,
                'MatieresScientifiques' =>  $MatieresScientifiques,
                'MatièresLitteraires' => $MatieresLitteraires,
                'MatièresFacultatives' => $MatieresFacultatives,
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
            'matières' => [
                'codeMatiere' => '',
                'nomMatiere' => '',
                'Categorie' => ['Matières Scientifiques', 'Matières Littéraires', 'Matières Facultatives'],
                'OrdreBulletin' => '',
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
            'codeMatiere' => 'required|string|between:2,100',
            'nomMatiere' => 'required|string',
            'Categorie' => 'required|string',
            'OrdreBulletin' => 'required|integer|unique:matieres',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $matiere = Matiere::create($datas);

        return $this->sendResponse($matiere, 'La matière a été enregistrée avec succès.');
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
            $matiere = Matiere::findOrFail($id);

            return response()->json([$matiere]);

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
            'codeMatiere' => 'required|string|between:2,100',
            'nomMatiere' => 'required|string',
            'Categorie' => 'required|string',
            'OrdreBulletin' => 'required|integer|unique:matieres',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

       $matiere = Matiere::findOrFail($id);

       $matiere->update($datas);

        return $this->sendResponse($matiere, 'La matière a été modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matiere = Matiere::findOrFail($id);
        $matiere->delete();
        return $this->sendResponse($matiere, 'La matière été supprimée avec succès.');
    }

}
