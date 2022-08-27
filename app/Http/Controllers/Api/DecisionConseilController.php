<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\DecisionConseil;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DecisionConseilController extends BaseController
{
    // public function __construct() {

    //     $this->middleware('auth:api');

    // }


    public function nouveaux(){

        $classesCount = Classe::count();

        if ($classesCount == 0) {

            return response()->json([
                'message' => 'Desolé nous ne trouvons aucune classe disponible',
            ], 200);
           
        } else {

            $infosCollege = [];

            $infosLyceeModerne =  [];

            $infosLyceeTechnique = [];

            $classesCollege =  Classe::where('section', 'Collège')->get();

            $classesLyceeModerne =  Classe::where('section', 'Lycée Moderne')->get();

            $classesLyceeTechnique =  Classe::where('section', 'Lycée Technique')->get();

            $infosCollegeCount = DB::table("decision_conseils")
            ->where("classes.section", "Collège")
            ->where("decision_conseils.status", "NOUVEAU")
            ->leftJoin("classes", "classes.id", "=", "decision_conseils.classe_id")
            ->count();

            $infosLyceeModerneCount =  DB::table("decision_conseils")
            ->where("classes.section", "Lycée Moderne")
            ->where("decision_conseils.status", "NOUVEAU")
            ->leftJoin("classes", "classes.id", "=", "decision_conseils.classe_id")
            ->count();

            $infosLyceeTechniqueCount =  DB::table("decision_conseils")
            ->where("classes.section", "Lycée Technique")
            ->where("decision_conseils.status", "NOUVEAU")
            ->leftJoin("classes", "classes.id", "=", "decision_conseils.classe_id")
            ->count();


            foreach ($classesCollege as $classe) {

                $infosCollege[] = [
                    'id' => $classe->id,
                    'code' => $classe->codeClasse,
                    'niveau' => $classe->nomClasse,
                    'finDeCycle' => $classe->finDeCycle,
                    'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'NOUVEAU')->count()
                ];
            }

            foreach ($classesLyceeModerne as $classe) {

                $infosLyceeModerne[] = [
                    'id' => $classe->id,
                    'code' => $classe->codeClasse,
                    'niveau' => $classe->nomClasse,
                    'finDeCycle' => $classe->finDeCycle,
                    'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'NOUVEAU')->count()
                ];
            }

            foreach ($classesLyceeTechnique as $classe) {

                $infosLyceeTechnique[] = [
                    'id' => $classe->id,
                    'code' => $classe->codeClasse,
                    'niveau' => $classe->nomClasse,
                    'finDeCycle' => $classe->finDeCycle,
                    'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'NOUVEAU')->count()
                ];
            }

            return response()->json([
                'infosLyceeTechnique' => $infosLyceeTechnique,
                'infosCollege' => $infosCollege,
                'infosLyceeModerne' => $infosLyceeModerne,
                'infosLyceeTechniqueCount' => $infosLyceeTechniqueCount,
                'infosCollegeCount' => $infosCollegeCount,
                'infosLyceeModerneCount' => $infosLyceeModerneCount
            ], 200);
            
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showNouveaux($id)
    {

        try {

            $classeCount = Classe::select('id', 'codeClasse')->where('id',$id)->count();

            if($classeCount !== 0){

                $classe = Classe::select('id', 'codeClasse')->where('id',$id)->first();

                $decisionConseilCount = DecisionConseil::where('classe_id',$id)->where('status', 'NOUVEAU')->count();

                if ($decisionConseilCount == 0) {

                    return response()->json(['message' => "Aucune décision trouvée.", 'classe' => $classe]);
    
                } else {
    
                    $decisionConseils = DecisionConseil::where('classe_id',$id)->where('status', 'NOUVEAU')->get();
    
                    return response()->json(['decisionConseils' => $decisionConseils, 'classe' => $classe]);
                }

            }else{

                return $this->sendError('Aucune classe trouvée.');

            }

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune décision trouvée.' );

        }

    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editNouveaux($id, $decision_id)
    {

        try {

            $classeCount = Classe::select('id', 'codeClasse')->where('id',$id)->count();

            if($classeCount !== 0){

                $classe = Classe::select('id', 'codeClasse')->where('id',$id)->first();

                if ( $classe == null) {

                    return response()->json(['message' => 'Aucune Information trouvée.']);
                   
                } else {

                    $decisionConseil = DecisionConseil::where('id',$decision_id)->where('classe_id', $id)->where('status', 'NOUVEAU')->first();

                    if ( $decisionConseil == null ) {
                    
                        return response()->json(['classe' => $classe, 'message' => 'Aucune Information trouvée.']);

                    } else {
                    
                        return response()->json(['classe' => $classe, 'decisionConseil' => $decisionConseil]);

                    }

                }

            }else{

                return $this->sendError('Aucune classe trouvée.');

            }

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune classe trouvée.' );

        }

    }


    public function doublants(){

        $classesCount = Classe::count();

        if ($classesCount == 0) {

            return response()->json([
                'message' => 'Desolé nous ne trouvons aucune classe disponible',
            ], 200);
           
        } else {

            $infosCollege = [];

            $infosLyceeModerne =  [];

            $infosLyceeTechnique = [];

            $classesCollege =  Classe::where('section', 'Collège')->get();

            $classesLyceeModerne =  Classe::where('section', 'Lycée Moderne')->get();

            $classesLyceeTechnique =  Classe::where('section', 'Lycée Technique')->get();

            $infosCollegeCount = DB::table("decision_conseils")
            ->where("classes.section", "Collège")
            ->where("decision_conseils.status", "DOUBLANT")
            ->leftJoin("classes", "classes.id", "=", "decision_conseils.classe_id")
            ->count();

            $infosLyceeModerneCount =  DB::table("decision_conseils")
            ->where("classes.section", "Lycée Moderne")
            ->where("decision_conseils.status", "DOUBLANT")
            ->leftJoin("classes", "classes.id", "=", "decision_conseils.classe_id")
            ->count();

            $infosLyceeTechniqueCount =  DB::table("decision_conseils")
            ->where("classes.section", "Lycée Technique")
            ->where("decision_conseils.status", "DOUBLANT")
            ->leftJoin("classes", "classes.id", "=", "decision_conseils.classe_id")
            ->count();

            foreach ($classesCollege as $classe) {

                $infosCollege[] = [
                    'id' => $classe->id,
                    'code' => $classe->codeClasse,
                    'niveau' => $classe->nomClasse,
                    'finDeCycle' => $classe->finDeCycle,
                    'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'DOUBLANT')->count()
                ];
            }

            foreach ($classesLyceeModerne as $classe) {

                $infosLyceeModerne[] = [
                    'id' => $classe->id,
                    'code' => $classe->codeClasse,
                    'niveau' => $classe->nomClasse,
                    'finDeCycle' => $classe->finDeCycle,
                    'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'DOUBLANT')->count()
                ];
            }

            foreach ($classesLyceeTechnique as $classe) {

                $infosLyceeTechnique[] = [
                    'id' => $classe->id,
                    'code' => $classe->codeClasse,
                    'niveau' => $classe->nomClasse,
                    'finDeCycle' => $classe->finDeCycle,
                    'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'DOUBLANT')->count()
                ];
            }

            return response()->json([
                'infosLyceeTechnique' => $infosLyceeTechnique,
                'infosCollege' => $infosCollege,
                'infosLyceeModerne' => $infosLyceeModerne,
                'infosLyceeTechniqueCount' => $infosLyceeTechniqueCount,
                'infosCollegeCount' => $infosCollegeCount,
                'infosLyceeModerneCount' => $infosLyceeModerneCount
            ], 200);
            
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDoublants($id)
    {

        try {

            $classeCount = Classe::select('id', 'codeClasse')->where('id',$id)->count();

            if($classeCount !== 0){

                $classe = Classe::select('id', 'codeClasse')->where('id',$id)->first();

                $decisionConseilCount = DecisionConseil::where('classe_id',$id)->where('status', 'DOUBLANT')->count();

                if ($decisionConseilCount == 0) {

                    return response()->json(['message' => "Aucune décision trouvée.", 'classe' => $classe]);
    
                } else {
    
                    $decisionConseils = DecisionConseil::where('classe_id',$id)->where('status', 'DOUBLANT')->get();
    
                    return response()->json(['decisionConseils' => $decisionConseils, 'classe' => $classe]);
                }

            }else{

                return $this->sendError('Aucune classe trouvée.');

            }

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune décision trouvée.' );

        }

    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editDoublants($id, $decision_id)
    {

        try {

            $classeCount = Classe::select('id', 'codeClasse')->where('id',$id)->count();

            if($classeCount !== 0){

                $classe = Classe::select('id', 'codeClasse')->where('id',$id)->first();

                if ( $classe == null) {

                    return response()->json(['message' => 'Aucune Information trouvée.']);
                   
                } else {

                    $decisionConseil = DecisionConseil::where('id',$decision_id)->where('classe_id', $id)->where('status', 'DOUBLANT')->first();

                    if ( $decisionConseil == null ) {
                    
                        return response()->json(['classe' => $classe, 'message' => 'Aucune Information trouvée.']);

                    } else {
                    
                        return response()->json(['classe' => $classe, 'decisionConseil' => $decisionConseil]);

                    }

                }

            }else{

                return $this->sendError('Aucune classe trouvée.');

            }

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune classe trouvée.' );

        }

    }

    public function triplants(){

        $classesCount = Classe::count();

        if ($classesCount == 0) {

            return response()->json([
                'message' => 'Desolé nous ne trouvons aucune classe disponible',
            ], 200);
           
        } else {

            $infosCollege = [];

            $infosLyceeModerne =  [];

            $infosLyceeTechnique = [];

            $classesCollege =  Classe::where('section', 'Collège')->get();

            $classesLyceeModerne =  Classe::where('section', 'Lycée Moderne')->get();

            $classesLyceeTechnique =  Classe::where('section', 'Lycée Technique')->get();

            $infosCollegeCount = DB::table("decision_conseils")
            ->where("classes.section", "Collège")
            ->where("decision_conseils.status", "TRIPLANT")
            ->leftJoin("classes", "classes.id", "=", "decision_conseils.classe_id")
            ->count();

            $infosLyceeModerneCount =  DB::table("decision_conseils")
            ->where("classes.section", "Lycée Moderne")
            ->where("decision_conseils.status", "TRIPLANT")
            ->leftJoin("classes", "classes.id", "=", "decision_conseils.classe_id")
            ->count();

            $infosLyceeTechniqueCount =  DB::table("decision_conseils")
            ->where("classes.section", "Lycée Technique")
            ->where("decision_conseils.status", "TRIPLANT")
            ->leftJoin("classes", "classes.id", "=", "decision_conseils.classe_id")
            ->count();

            foreach ($classesCollege as $classe) {

                $infosCollege[] = [
                    'id' => $classe->id,
                    'code' => $classe->codeClasse,
                    'niveau' => $classe->nomClasse,
                    'finDeCycle' => $classe->finDeCycle,
                    'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'TRIPLANT')->count()
                ];
            }

            foreach ($classesLyceeModerne as $classe) {

                $infosLyceeModerne[] = [
                    'id' => $classe->id,
                    'code' => $classe->codeClasse,
                    'niveau' => $classe->nomClasse,
                    'finDeCycle' => $classe->finDeCycle,
                    'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'TRIPLANT')->count()
                ];
            }

            foreach ($classesLyceeTechnique as $classe) {

                $infosLyceeTechnique[] = [
                    'id' => $classe->id,
                    'code' => $classe->codeClasse,
                    'niveau' => $classe->nomClasse,
                    'finDeCycle' => $classe->finDeCycle,
                    'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'TRIPLANT')->count()
                ];
            }

            return response()->json([
                'infosLyceeTechnique' => $infosLyceeTechnique,
                'infosCollege' => $infosCollege,
                'infosLyceeModerne' => $infosLyceeModerne,
                'infosLyceeTechniqueCount' => $infosLyceeTechniqueCount,
                'infosCollegeCount' => $infosCollegeCount,
                'infosLyceeModerneCount' => $infosLyceeModerneCount
            ], 200);
            
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTriplants($id)
    {

        try {

            $classeCount = Classe::select('id', 'codeClasse')->where('id',$id)->count();

            if($classeCount !== 0){

                $classe = Classe::select('id', 'codeClasse')->where('id',$id)->first();

                $decisionConseilCount = DecisionConseil::where('classe_id',$id)->where('status', 'TRIPLANT')->count();

                if ($decisionConseilCount == 0) {

                    return response()->json(['message' => "Aucune décision trouvée.", 'classe' => $classe]);
    
                } else {
    
                    $decisionConseils = DecisionConseil::where('classe_id',$id)->where('status', 'TRIPLANT')->get();
    
                    return response()->json(['decisionConseils' => $decisionConseils, 'classe' => $classe]);
                }

            }else{

                return $this->sendError('Aucune classe trouvée.');

            }

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune décision trouvée.' );

        }

    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTriplants($id, $decision_id)
    {

        try {

            $classeCount = Classe::select('id', 'codeClasse')->where('id',$id)->count();

            if($classeCount !== 0){

                $classe = Classe::select('id', 'codeClasse')->where('id',$id)->first();

                if ( $classe == null) {

                    return response()->json(['message' => 'Aucune Information trouvée.']);
                   
                } else {

                    $decisionConseil = DecisionConseil::where('id',$decision_id)->where('classe_id', $id)->where('status', 'TRIPLANT')->first();

                    if ( $decisionConseil == null ) {
                    
                        return response()->json(['classe' => $classe, 'message' => 'Aucune Information trouvée.']);

                    } else {
                    
                        return response()->json(['classe' => $classe, 'decisionConseil' => $decisionConseil]);

                    }

                }

            }else{

                return $this->sendError('Aucune classe trouvée.');

            }

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune classe trouvée.' );

        }

    }

    public function quadruplants(){

        $classesCount = Classe::count();

        if ($classesCount == 0) {

            return response()->json([
                'message' => 'Desolé nous ne trouvons aucune classe disponible',
            ], 200);
           
        } else {

            $infosCollege = [];

            $infosLyceeModerne =  [];

            $infosLyceeTechnique = [];

            $classesCollege =  Classe::where('section', 'Collège')->get();

            $classesLyceeModerne =  Classe::where('section', 'Lycée Moderne')->get();

            $classesLyceeTechnique =  Classe::where('section', 'Lycée Technique')->get();

            $infosCollegeCount = DB::table("decision_conseils")
            ->where("classes.section", "Collège")
            ->where("decision_conseils.status", "QUADRUPLANT")
            ->leftJoin("classes", "classes.id", "=", "decision_conseils.classe_id")
            ->count();

            $infosLyceeModerneCount =  DB::table("decision_conseils")
            ->where("classes.section", "Lycée Moderne")
            ->where("decision_conseils.status", "QUADRUPLANT")
            ->leftJoin("classes", "classes.id", "=", "decision_conseils.classe_id")
            ->count();

            $infosLyceeTechniqueCount =  DB::table("decision_conseils")
            ->where("classes.section", "Lycée Technique")
            ->where("decision_conseils.status", "QUADRUPLANT")
            ->leftJoin("classes", "classes.id", "=", "decision_conseils.classe_id")
            ->count();

            foreach ($classesCollege as $classe) {

                $infosCollege[] = [
                    'id' => $classe->id,
                    'code' => $classe->codeClasse,
                    'niveau' => $classe->nomClasse,
                    'finDeCycle' => $classe->finDeCycle,
                    'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'QUADRUPLANT')->count()
                ];
            }

            foreach ($classesLyceeModerne as $classe) {

                $infosLyceeModerne[] = [
                    'id' => $classe->id,
                    'code' => $classe->codeClasse,
                    'niveau' => $classe->nomClasse,
                    'finDeCycle' => $classe->finDeCycle,
                    'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'QUADRUPLANT')->count()
                ];
            }

            foreach ($classesLyceeTechnique as $classe) {

                $infosLyceeTechnique[] = [
                    'id' => $classe->id,
                    'code' => $classe->codeClasse,
                    'niveau' => $classe->nomClasse,
                    'finDeCycle' => $classe->finDeCycle,
                    'nbreDecision' => DecisionConseil::where('classe_id', $classe->id)->where('status', 'QUADRUPLANT')->count()
                ];
            }

            return response()->json([
                'infosLyceeTechnique' => $infosLyceeTechnique,
                'infosCollege' => $infosCollege,
                'infosLyceeModerne' => $infosLyceeModerne,
                'infosLyceeTechniqueCount' => $infosLyceeTechniqueCount,
                'infosCollegeCount' => $infosCollegeCount,
                'infosLyceeModerneCount' => $infosLyceeModerneCount
            ], 200);
            
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showQuadruplants($id)
    {

        try {

            $classeCount = Classe::select('id', 'codeClasse')->where('id',$id)->count();

            if($classeCount !== 0){

                $classe = Classe::select('id', 'codeClasse')->where('id',$id)->first();

                $decisionConseilCount = DecisionConseil::where('classe_id',$id)->where('status', 'QUADRUPLANT')->count();

                if ($decisionConseilCount == 0) {

                    return response()->json(['message' => "Aucune décision trouvée.", 'classe' => $classe]);
    
                } else {
    
                    $decisionConseils = DecisionConseil::where('classe_id',$id)->where('status', 'QUADRUPLANT')->get();
    
                    return response()->json(['decisionConseils' => $decisionConseils, 'classe' => $classe]);
                }

            }else{

                return $this->sendError('Aucune classe trouvée.');

            }

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucune décision trouvée.' );

        }

    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editQuadruplants($id, $decision_id)
    {

        try {

            $classeCount = Classe::select('id', 'codeClasse')->where('id',$id)->count();

            if($classeCount !== 0){

                $classe = Classe::select('id', 'codeClasse')->where('id',$id)->first();

                if ( $classe == null) {

                    return response()->json(['message' => 'Aucune Information trouvée.']);
                   
                } else {

                    $decisionConseil = DecisionConseil::where('id',$decision_id)->where('classe_id', $id)->where('status', 'QUADRUPLANT')->first();

                    if ( $decisionConseil == null ) {
                    
                        return response()->json(['classe' => $classe, 'message' => 'Aucune Information trouvée.']);

                    } else {
                    
                        return response()->json(['classe' => $classe, 'decisionConseil' => $decisionConseil]);

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

    
    public function store(Request $request, $id) {

        $datas = $request->all();

        $validator = Validator::make($datas, [
            'decision' => 'required|string|between:2,100',
            'moyFaible' => 'required|integer',
            'moyFort' => 'required|integer',
            'detailsDecision' => 'required',
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

                $decisionConseils = DecisionConseil::create($datas);

                return $this->sendResponse($decisionConseils, 'Décision enregistrée avec succès.');

            } else {
                return $this->sendError('Ooops ! Desolé, verifiez l\'ecart de vos moyennes');
            }

        } else {
            return $this->sendError('Ooops ! Desolé, vos moyennes doivent être positive et compris entre 0 et 20');
        }


    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $decision_id)
    {
        $datas = $request->all();

        $validator = Validator::make($datas, [
            'decision' => 'required|string|between:2,100',
            'moyFaible' => 'required|integer',
            'moyFort' => 'required|integer',
            'detailsDecision' => 'required',
        ]);

        if($validator->fails()){
            
            return $this->sendError("Erreur de validation", $validator->errors());

        }

        if ($datas['moyFort'] >= 0  && $datas['moyFaible'] <= 20) {

            if ($datas['moyFort'] < $datas['moyFaible']) {

                $datas['moyFort'] = number_format((float)$datas['moyFort'], 2, ',', '');

                $datas['moyFaible'] = number_format((float)$datas['moyFaible'], 2, ',', '');

                $decisionConseil = DecisionConseil::findOrFail($decision_id);

                $decisionConseil->update($datas);

                return $this->sendResponse($decisionConseil, 'Décision modifiée avec succès.');

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
        $decionConseil = DecisionConseil::findOrFail($id);
        $decionConseil->delete();
        return $this->sendResponse($decionConseil, 'La décision été supprimée avec succès.');
    }

    public function destroyAllNouveaux($id)
    {
        $decionConseil = DecisionConseil::where('classe_id', $id)->where('status', "Nouveau")->get();
        foreach($decionConseil as $decision){
            $decision->delete();
        }
        return $this->sendResponse($decionConseil, 'Toutes les décisions de cette classe ont été supprimée avec succès.');
    }

    public function destroyAllDoublants($id)
    {
        $decionConseil = DecisionConseil::where('classe_id', $id)->where('status', "Doublant")->get();
        foreach($decionConseil as $decision){
            $decision->delete();
        }
        return $this->sendResponse($decionConseil, 'Toutes les décisions de cette classe ont été supprimée avec succès.');
    }

    public function destroyAllTriplants($id)
    {
        $decionConseil = DecisionConseil::where('classe_id', $id)->where('status', "TRIPLANT")->get();
        foreach($decionConseil as $decision){
            $decision->delete();
        }
        return $this->sendResponse($decionConseil, 'Toutes les décisions de cette classe ont été supprimée avec succès.');
    }

    public function destroyAllQuadruplants($id)
    {
        $decionConseil = DecisionConseil::where('classe_id', $id)->where('status', "QUADRUPLANT")->get();
        foreach($decionConseil as $decision){
            $decision->delete();
        }
        return $this->sendResponse($decionConseil, 'Toutes les décisions de cette classe ont été supprimée avec succès.');
    }
}
