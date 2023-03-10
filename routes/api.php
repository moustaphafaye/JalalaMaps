<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepotController;
use App\Http\Controllers\SignalisationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('liste_depot',[DepotController::class,'liste']);
Route::post('ajout_depot',[DepotController::class,'ajouter']);

// Authentification


// Route::post('register',[AuthController::class,'register']);
// Route::post('connexion',[AuthController::class,'connexion']);

Route::group(['middleware' => 'api',
            'prefix' => 'auth'

], function ($router) {

    Route::post('login',[AuthController::class,'login']);
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::get('liste_signalisation',[SignalisationController::class,'liste']);
Route::get('detail/{id}',[SignalisationController::class,'detail']); 
Route::post('ajout_signalisation',[SignalisationController::class,'ajouter']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
