<?php

namespace App\Http\Controllers;

use App\Models\Signalisation;
use Illuminate\Http\Request;

class SignalisationController extends Controller
{
    function liste(){
        // return 'Signalisation';
        $totalSignalisation = Signalisation::all();
        // dd( $totalSignalisation);
        return response()->json([
            'signalisation'=>$totalSignalisation,
            'status'=>200
        ]);
    }
    public function ajouter(Request $request,Signalisation $signalisation ){
        $numeroSignalisation = $request->numeroSignalisation;
        $date = $request->date;
        $commentaire = $request->commentaire;
        $typeSignalisation = $request->typeSignalisation;
        $image = $request->image;
        $niveauSignalisation = $request->niveauSignalisation;

        if(!empty($numeroSignalisation) && !empty($commentaire)&& !empty($typeSignalisation)&& !empty($image)&& !empty($niveauSignalisation)){

            $signalisation->numeroSignalisation = $numeroSignalisation;
            $signalisation->date = $date;
            $signalisation->commentaire = $commentaire;
            $signalisation->typeSignalisation = $typeSignalisation;
            $signalisation->image = $image;
            $signalisation->niveauSignalisation = $niveauSignalisation;
            // dd('ok');
            $signalisation->save();
            return response()->json([
                'signalisation'=>$signalisation,
                'status'=>200
            ]);
           


        }elseif(empty($typeSignalisation) ){
            return response()->json([
                'erreur'=>'Saisir le type de signalisation',
                'status'=>500
            ]);
        }elseif(empty($image)){
            return response()->json([
                'erreur'=>'Ajouter une image svp',
                'status'=>500
            ]);
        }else{
            return response()->json([
                'erreur'=>'information incorrect',
                'status'=>500
            ]);
        }
    }

    public function detail($id){
        return response()->json([
            'signalisation'=> Signalisation::find($id),
            'status'=>200,
            'msg'=>'signalisation recuper'
        ]);
    }
}
