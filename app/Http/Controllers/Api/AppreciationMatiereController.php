<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppreciationMatiere;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppreciationMatiereController extends BaseController
{
    // public function __construct() {

    //     $this->middleware('auth:api');

    // }

    public function index(){

        $matieresCount  = Matiere::count();

        

        if ($matieresCount == 0) {

            return response()->json([
                'message' => 'Aucune matière n\'est enregistrée',
            ], 200);

        } else {

            $appreciationMatieres = AppreciationMatiere::all();

            if (count($appreciationMatieres) == 0) {

                return response()->json([
                    'message' => 'Aucune appréciation par matière n\'est enregistrée',
                ], 200);
    
            } else {
    
                return $this->sendResponse($appreciationMatieres, 'liste de toutes les appréciations par matière.');
    
            }
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
                'moyFaible' => '',
                'moyFort' => '',
                'appreciation' => '',
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
            'moyFaible' => 'required|integer',
            'moyFort' => 'required|integer',
            'appreciation' => 'required|string|between:2,100',
        ]);

        if($validator->fails()){
            return $this->sendError("Erreur de validation", $validator->errors());
        }

        if ($datas['moyFort'] >= 0  && $datas['moyFaible'] <= 20) {

            if ($datas['moyFort'] < $datas['moyFaible']) {

                $datas['moyFort'] = number_format((float)$datas['moyFort'], 2, ',', '');

                $datas['moyFaible'] = number_format((float)$datas['moyFaible'], 2, ',', '');

                $appreciationMatiere = AppreciationMatiere::create($datas);

                return $this->sendResponse($appreciationMatiere, 'Appréciation enregistrée avec succès.');

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
    public function edit($id)
    {

        try {

            $appreciationMatiere = AppreciationMatiere::findOrFail($id);

            return response()->json([$appreciationMatiere]);

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune appréciation trouvée.');

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

                $appreciationMatiere = AppreciationMatiere::findOrFail($id);

                $appreciationMatiere->update($datas);

                return $this->sendResponse($appreciationMatiere, 'Appreciation modifiée avec succès.');

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
        $appreciationMatiere = AppreciationMatiere::findOrFail($id);
        $appreciationMatiere->delete();
        return $this->sendResponse($appreciationMatiere, 'L\' appréciation été supprimée avec succès.');
    }
}
