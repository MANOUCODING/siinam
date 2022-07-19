<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $EnseignantCount = Enseignant::count();

        if ($EnseignantCount == 0) {

            return response()->json(['message' => 'Aucun enseignant n\'est enregistré'], 200);

        } else {

            $enseignants =  DB::table("enseignants") ->select(array("enseignants.id", "enseignants.code", "enseignants.nom", "enseignants.prenoms", "enseignants.status", "enseignants.adresse", "enseignants.sexe" ,"users.telephone", "users.email" ,"roles.name"))
            ->leftJoin("roles", "roles.id", "=", "enseignants.role_id")
            ->leftJoin("users", "users.id", "=", "enseignants.user_id")
            ->groupBy("enseignants.id", "enseignants.code", "enseignants.nom", "enseignants.prenoms", "enseignants.status", "enseignants.adresse", "enseignants.sexe" ,"users.telephone", "users.email" ,"roles.name")
            ->orderBy('enseignants.id', 'desc')
            ->get();

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

        if (Role::count() == 0) {
            return response()->json(['message' => 'Aucun role n\'est enregistré'], 200);
        } else {
            return response()->json(['roles' => Role::all()], 200);
        }

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

        if (isset($datas['password']) && empty($datas['password'])) {

            $datas['password'] = Hash::make($datas['password']);

        }else {

            $datas['password'] = Hash::make('password');

        }

        $datas['role_id'] = Role::where('name', 'Enseignant')->pluck('id')->first();

        $datasUser = [
            'email' => $datas['email'],
            'telephone' => $datas['telephone'],
            'password' =>  $datas['password'],
            'role_id' => $datas['role_id'],
        ];

        $lastEnseignant = Enseignant::orderby('id', 'desc')->take(1)->pluck('id')->first();

        if ($lastEnseignant == null) {

            $datas['code'] = 'ENS-01';

        }else{

            $idE = $lastEnseignant + 1;

            if ($idE < 10) {

                $datas['code'] = 'ENS-0'.$idE;
               

            }else {

                $datas['code'] = 'ENS-'.$idE;

            }

        }
       

        User::create($datasUser);

        $datas['user_id'] = User::orderby('id', 'desc')->take(1)->pluck('id')->first();

        $datasEnseignant = [
            'nom' => $datas['nom'],
            'prenoms' => $datas['prenoms'],
            'adresse' =>  $datas['adresse'],
            'code' =>  $datas['code'],
            'sexe' =>  $datas['sexe'],
            'user_id' =>  $datas['user_id'],
            'role_id' => $datas['role_id'],
        ];

        $enseignant = Enseignant::create($datasEnseignant);

        return $this->sendResponse($enseignant, 'Enseignant enregistré avec succès.');



    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        if (Role::count() == 0) {
            return response()->json(['message' => 'Aucun role n\'est enregistré'], 200);
        } else {

            $enseignant =  DB::table("enseignants") ->select(array("enseignants.id", "enseignants.sexe", "enseignants.nom", "enseignants.prenoms", "enseignants.role_id" ,"enseignants.adresse", "users.telephone",  "users.email", "roles.name", "roles.id"))
            ->where("enseignants.id", $id)
            ->leftJoin("roles", "roles.id", "=", "enseignants.role_id")
            ->leftJoin("users", "users.id", "=", "enseignants.user_id")
            ->first();

            if ( $enseignant == null) {
                return response()->json(['message' => 'Aucune Information trouvée.'], 200);
            } else {
                return response()->json(['roles' => Role::all(), 'enseignant' => $enseignant ], 200);
            }
        }
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
        $datas = $request->all();

        $validator = Validator::make($datas, [
            'nom' => 'required|string|between:2,100',
            'prenoms' => 'required|string',
            'adresse' => 'required|string',
            'sexe' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|regex:/[0-9]/',
        ]);


        if($validator->fails()){

            return  $this->sendError( 'Erreur de validation' , $validator->errors());

        }

        $enseignant = Enseignant::findOrFail($id);

        $user = User::findOrFail($enseignant->user_id);

        $datasUser = [
            'email' => $datas['email'],
            'telephone' => $datas['telephone'],
        ];
       

        $user->update($datasUser);
       

        $datasEnseignant = [
            'nom' => $datas['nom'],
            'prenoms' => $datas['prenoms'],
            'adresse' =>  $datas['adresse'],
            'sexe' =>  $datas['sexe'],
        ];
      

        $enseignant->update($datasEnseignant);

        return $this->sendResponse($enseignant, 'Enseignant modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enseignant = Enseignant::findOrFail($id);

        $user = User::findOrFail($enseignant->user_id);

        $enseignant->delete();

        $user->delete();
      

        return $this->sendResponse($enseignant, "L' enseignant  a été supprimée avec succès.");
    }
}
