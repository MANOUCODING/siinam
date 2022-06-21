<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EnseignantController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseignants = Enseignant::count();

        if ($enseignants == 0) {

            return response()->json([
                'message' => 'Aucun enseignant n\'est enregistrée',

            ], 200);

        } else {

            return response()->json([
                'message' => 'liste de toutes les enseignants',
                'enseignants' => $enseignants,
            ], 200);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return response()->json([
            'message' => 'Formulaire d\'enregistrement',
            'enseignants' => [
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
            'nom' => 'required|string|between:2,100',
            'prenoms' => 'required|string',
            'adresse' => 'required|string',
            'sexe' => 'required|string',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|regex:/[0-9]/|unique:users',
        ]);


        if($validator->fails()){

            return  $this->sendError( 'Erreur de validation' , $validator->errors());

        }

        $datasUser = [
            'email' => $datas['email'],
            'telephone' => $datas['telephone'],
            'password' => Hash::make("password"),
            'role' => 'Enseignant'
        ];

        $lastEnseignant = Enseignant::latest();

        // if ($lastEnseignant == null) {

        //     $datas['code'] = 'ENS-01';

        // }else{

        //     $idE = $lastEnseignant->id + 1;

        //     if ($idE < 10) {

        //         $datas['code'] = 'ENS-0'.$idE;

        //         $enseignant = Enseignant::create($datas);

        //         User::create($datasUser);

        //         return $this->sendResponse($enseignant, 'Enseignant enregistrée avec succès.');

        //     }else {

        //         $datas['code'] = 'ENS-'.$idE;

        //         $enseignant = Enseignant::create($datas);

        //         User::create($datasUser);

        //         return $this->sendResponse($enseignant, 'Enseignant enregistrée avec succès.');

        //     }

        // }

        $enseignant = Enseignant::create($datas);

        User::create($datasUser);

        return $this->sendResponse($enseignant, 'Enseignant enregistrée avec succès.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
