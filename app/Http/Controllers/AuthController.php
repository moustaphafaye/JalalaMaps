<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function register(Request $request){
        // dd('ok');
        $validations = Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|unique:users|max:155',
            'password'=>'required|min:4',
        ]);

        if($validations->fails()){
            $errors =  $validations->errors();

            return response()->json([
                'errors'=>$errors,
                'status'=>401
            ]);
        }
        // dd('ok');
        if($validations->passes()){
            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password' => Hash::make($request->password),
                
                // 'remember_token'=>$token
                
            ]);
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'token'=>$token,
                'user'=>$user,
                'type'=>'Bearer'
            ]);
        }
       
    }
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }


    public function login()
    {
        // dd('ok');
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }













// Fonction  Connexion 
    // public function connexion(Request $request){

    //     $donnéeUtilisateur = $request->validate([
    //         'email'=>['required', 'email'],
    //         'password'=>['required', 'string','min:8','max:30']
    //     ]);
    //     $utilisateur = User::where('email',$donnéeUtilisateur['email'])->first();

    //     return $utilisateur;
    // }

}
