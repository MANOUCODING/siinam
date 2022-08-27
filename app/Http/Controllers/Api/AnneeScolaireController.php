<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnneeScolaire;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnneeScolaireController extends BaseController
{
    // public function __construct() {

    //     $this->middleware('auth:api');

    // }

    public function index(){

        $anneeScolaires = AnneeScolaire::all();

        if (count($anneeScolaires) == 0) {

            return response()->json([
                'message' => 'Aucune rentrée scolaire n\'est enregistrée',
            ], 200);

        } else {

            return response()->json([
                'message' => 'liste de toutes les rentrées scolaires',
                'anneeScolaires' => $anneeScolaires
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
            'Rentrée Scolaire' => [
                'dateDebut' => '',
                'dateFin' => '',
                'TypePeriode' => '',
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
            'dateDebut' => 'required',
            'dateFin' => 'required',
            'TypePeriodeCollege' => 'required|string',
            'TypePeriodeLyceeModerne' => 'required|string',
            'TypePeriodeLyceeTechnique' => 'required|string',
        ]);

        if($validator->fails()){

            return $this->sendError("Erreur de validation", $validator->errors());
            
        }

        if($datas['dateDebut'] < $datas['dateFin'] ){

            $anneeScolaireMoment = AnneeScolaire::where('status', 'Inactif')->count();
            
            if ($anneeScolaireMoment == 1) {

                return $this->sendError('Ooops Desolé. Il ne peut pas avoir deux rentrées scolaires inactives');

            } else {

                $dateDebut = date_parse($datas['dateDebut']);

                $dateFin = date_parse($datas['dateFin']);

                $anneeDebut = $dateDebut['year'];

                $anneeFin = $dateFin['year'];

                $datas['anneeScolaire'] = $anneeDebut.'-'.$anneeFin ;

                $anneeScolaire = AnneeScolaire::create($datas);

                return $this->sendResponse( $anneeScolaire, 'Une Nouvelle Rentrée Scolaire a été enregistrée avec succès.');

            }

        }else{
            return $this->sendError('Ooops Desolé. La date de fin est antérieure à la date du debut');
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

            $anneeScolaire = AnneeScolaire::findOrFail($id);

            if ($anneeScolaire == null) {

                return response()->json([ 'message' => 'Aucune Information trouvée.'  ]);

            } else {

                return response()->json([$anneeScolaire]);

            }
            

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
            'dateDebut' => 'required',
            'dateFin' => 'required',
            'TypePeriodeCollege' => 'required|string',
            'TypePeriodeLyceeModerne' => 'required|string',
            'TypePeriodeLyceeTechnique' => 'required|string',
        ]);

        if($validator->fails()){
            
            return $this->sendError("Erreur de validation", $validator->errors());
        }

        if($datas['dateDebut'] < $datas['dateFin'] ){

            $dateDebut = date_parse($datas['dateDebut']);

            $dateFin = date_parse($datas['dateFin']);

            $anneeDebut = $dateDebut['year'];

            $anneeFin = $dateFin['year'];

            $datas['anneeScolaire'] = $anneeDebut.'-'.$anneeFin ;

            
            $anneeScolaire = AnneeScolaire::findOrFail($id);

            $anneeScolaire->update($datas);

            return $this->sendResponse( $anneeScolaire, 'La rentrée a été modifiée avec succès.');

        }else{
            return $this->sendError('Ooops Desolé. La date de fin est antérieure à la date du debut');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request, $id)
    {

        $anneeScolaireMomentCount = AnneeScolaire::where('status', 'En Cours')->count();

        if ($anneeScolaireMomentCount) {

            $anneeScolaireMoment = AnneeScolaire::where('status', 'En Cours')->first();

            $anneeScolaireMoment->status = "Terminée";

            $anneeScolaireMoment->update();

            $anneeScolaire = AnneeScolaire::findOrFail($id);

            $anneeScolaire->status = "En Cours";

            $anneeScolaire->update();

        }else{

            $anneeScolaire = AnneeScolaire::findOrFail($id);

            $anneeScolaire->status = "En Cours";

            $anneeScolaire->update();

        }

        return $this->sendResponse( $anneeScolaire, 'Une Nouvelle Rentrée Scoalire a été mise en cours.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anneeScolaire = AnneeScolaire::findOrFail($id);
        $anneeScolaire->delete();
        return $this->sendResponse($anneeScolaire, 'La Rentrée scolaire  a été supprimée avec succès.');
    }
}

