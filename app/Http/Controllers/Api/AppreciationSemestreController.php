<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppreciationSemestre;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppreciationSemestreController extends  BaseController
{
    // public function __construct() {

    //     $this->middleware('auth:api');

    // }

    public function index(){

        $appreciationSemestres = AppreciationSemestre::all();

        if (count($appreciationSemestres) == 0) {

            return response()->json([
                'message' => 'Aucune appréciation par semestre n\'est enregistrée',
            ], 201);

        } else {

            return $this->sendResponse($appreciationSemestres, 'liste de toutes les appréciations par semestre.');

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
            'appreciationSemestre' => [
                'nomCycle' => '',
                'moyFaible' => '',
                'moyFort' => '',
                'appreciation' => '',
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
            'nomCycle' => 'required|string|between:2,100',
            'appreciation' => 'required|string|between:2,100',
            'moyFaible' => 'required|integer',
            'moyFort' => 'required|integer',
        ]);
        
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        if ($datas['moyFaible'] >= 0  && $datas['moyFort'] <= 20) {

            if ($datas['moyFaible'] < $datas['moyFort']) {

                $datas['moyFaible'] = number_format((float)$datas['moyFaible'], 2, ',', '');

                $datas['moyFort'] = number_format((float)$datas['moyFort'], 2, ',', '');

                $appreciationSemestre = AppreciationSemestre::create($datas);

                return $this->sendResponse($appreciationSemestre, 'Appréciation enregistrée avec succès.');

            } else {
                return $this->sendError('Ooops ! Desolé, verifiez l"ecart de vos moyennes');
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

            $appreciationSemestre = AppreciationSemestre::findOrFail($id);

            return response()->json([$appreciationSemestre]);

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
            'nomCycle' => 'required|string|between:2,100',
            'appreciation' => 'required|string|between:2,100',
            'moyFaible' => 'required|integer',
            'moyFort' => 'required|integer',
        ]);
        
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        if ($datas['moyFaible'] >= 0  && $datas['moyFort'] <= 20) {

            if ($datas['moyFaible'] < $datas['moyFort']) {

                $datas['moyFaible'] = number_format((float)$datas['moyFaible'], 2, ',', '');

                $datas['moyFort'] = number_format((float)$datas['moyFort'], 2, ',', '');

                $appreciationSemestre = AppreciationSemestre::findOrFail($id);

                $appreciationSemestre->update($datas);

                return $this->sendResponse($appreciationSemestre, 'Appreciation modifiée avec succès.');

            } else {
                return $this->sendError('Ooops ! Desolé, vos moyennes doivent être positive et compris entre 0 et 20');
            }

        } else {
            return $this->sendError('Ooops ! Desolé, verifiez l"ecart de vos moyennes');
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
}
