<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use Illuminate\Http\Request;

class DepotController extends Controller
{
   public function liste(){
        
        $totalDepots= Depot::all();
        // dd($totalDepots);
        return response()->json([
            'films'=>$totalDepots,
            'status'=>200
        ]);
        
    }

    public function ajouter(Request $request, Depot $depot){
        $libelle = $request->libelle;
        $image = $request->image;
        $description = $request->description;
        $lieu = $request->lieu;
        $telephone = $request->telephone;
        $etat = $request->etat;
        // dd('ok');
        
        
        if(!empty($libelle)  && !empty($description) && !empty($lieu) && !empty($etat) ){

        $depot->libelle = $libelle;
        $depot->image = $image;
        $depot->description = $description;
        $depot->lieu = $lieu;
        $depot->telephone = $telephone;
        $depot->etat = $etat;
        $depot->save();
        return response()->json([
            'depot'=> $depot,
            'status'=>200,
            'message'=>'film inserer avec cussés'
        ]);
       

        }else{
            return response()->json([
                'message'=>'Veuiller remplir ce champ',
                'status'=> 400
            ]);
        }

    }

}
