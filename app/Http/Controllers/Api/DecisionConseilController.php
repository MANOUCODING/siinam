<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\DecisionConseil;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DecisionConseilController extends BaseController
{
    // public function __construct() {

    //     $this->middleware('auth:api');

    // }

    public function index(){

        $classes = Classe::all();

        $decisionConseils = DecisionConseil::all();

        if (count($classes) == 0) {

            return response()->json([
                'message' => 'Desolé nous ne trouvons aucune classe disponible',
            ], 200);
           
        } else {
            if (count($decisionConseils) == 0) {

                return response()->json([
                    'message' => 'Aucune décision n\'est enregistrée',
                ], 200);
    
            } else {
    
                return $this->sendResponse($decisionConseils, 'liste de toutes les decisions du conseil.');
    
            }
        }
    }


    public function nouveaux(){

        $classesCount = Classe::count();

        if ($classesCount == 0) {

            return response()->json([
                'message' => 'Desolé nous ne trouvons aucune classe disponible',
            ], 200);
           
        } else {

            $decisionConseilsCount = DecisionConseil::where('status', 'Nouveau')->count();

            if ($decisionConseilsCount == 0) {

                return response()->json([
                    'message' => 'Aucune décision n\'est enregistrée',
                ], 200);
    
            } else {

                $infosCollege = [];

                $infosLyceeModerne =  [];

                $infosLyceeTechnique = [];

                $classesCollege =  Classe::where('section', 'Collège')->get();

                $classesLyceeModerne =  Classe::where('section', 'Lycée Moderne')->get();

                $classesLyceeTechnique =  Classe::where('section', 'Lycée Technique')->get();

                foreach ($classesCollege as $classe) {

                    $infosCollege[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'Nouveau')->count()
                    ];
                }

                foreach ($classesLyceeModerne as $classe) {

                    $infosLyceeModerne[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'Nouveau')->count()
                    ];
                }

                foreach ($classesLyceeTechnique as $classe) {

                    $infosLyceeTechnique[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'Nouveau')->count()
                    ];
                }
    
                return response()->json([
                    'infosLyceeTechnique' => $infosLyceeTechnique,
                    'infosCollege' => $infosCollege,
                    'infosLyceeModerne' => $infosLyceeModerne
                ], 200);
    
            }
        }
    }


    public function doublants(){

        $classesCount = Classe::count();

        if ($classesCount == 0) {

            return response()->json([
                'message' => 'Desolé nous ne trouvons aucune classe disponible',
            ], 200);
           
        } else {

            $decisionConseilsCount = DecisionConseil::where('status', 'Doublant')->count();

            if ($decisionConseilsCount == 0) {

                return response()->json([
                    'message' => 'Aucune décision n\'est enregistrée',
                ], 200);
    
            } else {

                $infosCollege = [];

                $infosLyceeModerne =  [];

                $infosLyceeTechnique = [];

                $classesCollege =  Classe::where('section', 'Collège')->get();

                $classesLyceeModerne =  Classe::where('section', 'Lycée Moderne')->get();

                $classesLyceeTechnique =  Classe::where('section', 'Lycée Technique')->get();

                foreach ($classesCollege as $classe) {

                    $infosCollege[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'Doublant')->count()

                    ];
                }

                foreach ($classesLyceeModerne as $classe) {

                    $infosLyceeModerne[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'Doublant')->count()

                    ];
                }

                foreach ($classesLyceeTechnique as $classe) {

                    $infosLyceeTechnique[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'Doublant')->count()

                    ];
                }
    
                return response()->json([
                    'infosLyceeTechnique' => $infosLyceeTechnique,
                    'infosCollege' => $infosCollege,
                    'infosLyceeModerne' => $infosLyceeModerne
                ], 200);
    
            }
        }
    }

    public function triplants(){

        $classesCount = Classe::count();

        if ($classesCount == 0) {

            return response()->json([
                'message' => 'Desolé nous ne trouvons aucune classe disponible',
            ], 200);
           
        } else {

            $decisionConseilsCount = DecisionConseil::where('status', 'Triplant')->count();

            if ($decisionConseilsCount == 0) {

                return response()->json([
                    'message' => 'Aucune décision n\'est enregistrée',
                ], 200);
    
            } else {

                $infosCollege = [];

                $infosLyceeModerne =  [];

                $infosLyceeTechnique = [];

                $classesCollege =  Classe::where('section', 'Collège')->get();

                $classesLyceeModerne =  Classe::where('section', 'Lycée Moderne')->get();

                $classesLyceeTechnique =  Classe::where('section', 'Lycée Technique')->get();

                foreach ($classesCollege as $classe) {

                    $infosCollege[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'Triplant')->count()

                    ];
                }

                foreach ($classesLyceeModerne as $classe) {

                    $infosLyceeModerne[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'Triplant')->count()

                    ];
                }

                foreach ($classesLyceeTechnique as $classe) {

                    $infosLyceeTechnique[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'Triplant')->count()

                    ];
                }
    
                return response()->json([
                    'infosLyceeTechnique' => $infosLyceeTechnique,
                    'infosCollege' => $infosCollege,
                    'infosLyceeModerne' => $infosLyceeModerne
                ], 200);
    
            }
        }
    }

    public function quadruplants(){

        $classesCount = Classe::count();

        if ($classesCount == 0) {

            return response()->json([
                'message' => 'Desolé nous ne trouvons aucune classe disponible',
            ], 200);
           
        } else {

            $decisionConseilsCount = DecisionConseil::where('status', 'Quadruplant')->count();

            if ($decisionConseilsCount == 0) {

                return response()->json([
                    'message' => 'Aucune décision n\'est enregistrée',
                ], 200);
    
            } else {

                $infosCollege = [];

                $infosLyceeModerne =  [];

                $infosLyceeTechnique = [];

                $classesCollege =  Classe::where('section', 'Collège')->get();

                $classesLyceeModerne =  Classe::where('section', 'Lycée Moderne')->get();

                $classesLyceeTechnique =  Classe::where('section', 'Lycée Technique')->get();

                foreach ($classesCollege as $classe) {

                    $infosCollege[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'Quadruplant')->count()

                    ];
                }

                foreach ($classesLyceeModerne as $classe) {

                    $infosLyceeModerne[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'Quadruplant')->count()

                    ];
                }

                foreach ($classesLyceeTechnique as $classe) {

                    $infosLyceeTechnique[] = [
                        'id' => $classe->id,
                        'code' => $classe->codeClasse,
                        'niveau' => $classe->nomClasse,
                        'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'Quadruplant')->count()

                    ];
                }
    
                return response()->json([
                    'infosLyceeTechnique' => $infosLyceeTechnique,
                    'infosCollege' => $infosCollege,
                    'infosLyceeModerne' => $infosLyceeModerne
                ], 200);
    
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
            'decisionConseils' => [
                'moyFaible' => 0,
                'moyFort' => 0,
                'decision' => '',
                'findeCycle' => 1,
                'dejaRedoublerDansCycle' => 1,
                'detailsDecision' => '',
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
            'nomCycle' => 'required|string|between:2,100',
            'decision' => 'required|string|between:2,100',
            'moyFaible' => 'required|integer',
            'moyFort' => 'required|integer',
            'findeCycle' => 'required|integer',
            'dejaRedoublerDansCycle' => 'required|integer',
            'detailsDecision' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        if ($datas['moyFaible'] >= 0  && $datas['moyFort'] <= 20) {

            if ($datas['moyFaible'] < $datas['moyFort']) {

                $datas['moyFaible'] = number_format((float)$datas['moyFaible'], 2, ',', '');

                $datas['moyFort'] = number_format((float)$datas['moyFort'], 2, ',', '');

                $decisionConseil = DecisionConseil::create($datas);

                return $this->sendResponse($decisionConseil, 'La décision enregistrée avec succès.');

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

            $decisionConseil = DecisionConseil::findOrFail($id);

            return response()->json([$decisionConseil]);

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune décision trouvée.');

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
            'decision' => 'required|string|between:2,100',
            'moyFaible' => 'required|integer',
            'moyFort' => 'required|integer',
            'findeCycle' => 'required|integer',
            'dejaRedoublerDansCycle' => 'required|integer',
            'detailsDecision' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        if ($datas['moyFaible'] >= 0  && $datas['moyFort'] <= 20) {

            if ($datas['moyFaible'] < $datas['moyFort']) {

                $datas['moyFaible'] = number_format((float)$datas['moyFaible'], 2, ',', '');

                $datas['moyFort'] = number_format((float)$datas['moyFort'], 2, ',', '');

                $decisionConseil = DecisionConseil::findOrFail($id);

                $decisionConseil->update($datas);

                return $this->sendResponse($decisionConseil, 'La décision modifiée avec succès.');

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
        $decisionConseil = DecisionConseil::findOrFail($id);
        $decisionConseil->delete();
        return $this->sendResponse($decisionConseil, 'La décision a été supprimée avec succès.');
    }
}
