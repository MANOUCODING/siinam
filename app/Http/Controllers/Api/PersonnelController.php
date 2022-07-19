<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class PersonnelController extends BaseController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PersonnelCount = Personnel::count();

        if ($PersonnelCount == 0) {

            return response()->json(['message' => 'Aucun personnel n\'est enregistré'], 200);

        } else {

            $personnels =  DB::table("personnels") ->select(array("personnels.id", "personnels.code", "personnels.nom", "personnels.prenoms", "personnels.status", "users.telephone", "roles.name"))
            ->leftJoin("roles", "roles.id", "=", "personnels.role_id")
            ->leftJoin("users", "users.id", "=", "personnels.user_id")
            ->groupBy("personnels.id", "personnels.code", "personnels.nom", "personnels.prenoms", "personnels.status", "users.telephone", "roles.name")
            ->orderBy('personnels.id', 'desc')
            ->get();

            return response()->json([
                'message' => 'liste de toutes les personnels',
                'personnels' => $personnels,
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
    public function edit($id)
    {

        if (Role::count() == 0) {
            return response()->json(['message' => 'Aucun role n\'est enregistré'], 200);
        } else {

            $personnel =  DB::table("personnels") ->select(array("personnels.id", "personnels.sexe", "personnels.nom", "personnels.prenoms", "personnels.role_id" ,"personnels.adresse", "users.telephone",  "users.email", "roles.name", "roles.id"))
            ->where("personnels.id", $id)
            ->leftJoin("roles", "roles.id", "=", "personnels.role_id")
            ->leftJoin("users", "users.id", "=", "personnels.user_id")
            ->first();

            if ( $personnel == null) {
                return response()->json(['message' => 'Aucune Information trouvée.'], 200);
            } else {
                return response()->json(['roles' => Role::all(), 'personnel' => $personnel ], 200);
            }
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
            'role_id' => 'required|integer',
        ]);


        if($validator->fails()){

            return  $this->sendError( 'Erreur de validation' , $validator->errors());

        }

        if (isset($datas['password']) && empty($datas['password'])) {

            $datas['password'] = Hash::make($datas['password']);

        }else {

            $datas['password'] = Hash::make('password');

        }

        $datasUser = [
            'email' => $datas['email'],
            'telephone' => $datas['telephone'],
            'password' =>  $datas['password'],
            'role_id' => $datas['role_id'],
        ];

        $lastpersonnel = Personnel::orderby('id', 'desc')->take(1)->pluck('id')->first();

        if ($lastpersonnel == null) {

            $datas['code'] = 'USER-01';

        }else{

            $idE = $lastpersonnel + 1;

            if ($idE < 10) {

                $datas['code'] = 'USER-0'.$idE;
               

            }else {

                $datas['code'] = 'USER-'.$idE;

            }

        }
       

        User::create($datasUser);

        $datas['user_id'] = User::orderby('id', 'desc')->take(1)->pluck('id')->first();

        $datasPersonnel = [
            'nom' => $datas['nom'],
            'prenoms' => $datas['prenoms'],
            'adresse' =>  $datas['adresse'],
            'code' =>  $datas['code'],
            'sexe' =>  $datas['sexe'],
            'user_id' =>  $datas['user_id'],
            'role_id' => $datas['role_id'],
        ];

        $personnel = Personnel::create($datasPersonnel);

        return $this->sendResponse($personnel, 'Personnel enregistrée avec succès.');


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

        $personnel = Personnel::findOrFail($id);

        $user = User::findOrFail($personnel->user_id);

        $datasUser = [
            'email' => $datas['email'],
            'telephone' => $datas['telephone'],
        ];
       

        $user->update($datasUser);
       

        $datasPersonnel = [
            'nom' => $datas['nom'],
            'prenoms' => $datas['prenoms'],
            'adresse' =>  $datas['adresse'],
            'sexe' =>  $datas['sexe'],
        ];
      

        $personnel->update($datasPersonnel);

        return $this->sendResponse($personnel, 'Personnel modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personnel = Personnel::findOrFail($id);

        $user = User::findOrFail($personnel->user_id);

        $personnel->delete();

        $user->delete();

        return $this->sendResponse($personnel, "Le Personnel  a été supprimée avec succès.");
    }
}