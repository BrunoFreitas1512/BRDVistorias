<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/status', function() {
    return ['status' => 'ok'];
});
Route::namespace('Api')->group(function() {
    Route::get('/listaPerguntas/{id}', 'VistoriaController@listaPerguntasVistorias');
    Route::get('/listaVistorias', 'VistoriaController@listaScVistorias');
    Route::get('ultimaVistorias', 'VistoriaController@ultimaVistoria');
    Route::get('vistorias', 'VistoriaController@vistoria');
    Route::get('salasComerciais', 'VistoriaController@salaComercial');
    Route::get('perguntas', 'VistoriaController@pergunta');
    Route::get('vistorias/{id}', 'VistoriaController@getVistoria');
    Route::get('comentarios/{id}', 'VistoriaController@getComentario');
    Route::get('respostas/{id}', 'VistoriaController@getResposta');
    Route::get('respostas', 'VistoriaController@resposta');
    Route::get('comentarios', 'VistoriaController@comentario');

    Route::post('vistorias', 'VistoriaController@adicionarVistoria');
    Route::post('respostas', 'VistoriaController@adicionarResposta');
    Route::post('comentarios', 'VistoriaController@adicionarComentario');

    Route::put('vistorias/{id}', 'VistoriaController@atualizarVistoria');
    Route::put('respostas/{id}', 'VistoriaController@atualizarResposta');
    Route::put('comentarios/{id}', 'VistoriaController@atualizarComentario');

    Route::delete('vistorias/{id}', 'VistoriaController@deleteVistoria');
    Route::delete('respostas/{id}', 'VistoriaController@deleteResposta');
    Route::delete('comentarios/{id}', 'VistoriaController@deleteComentario');
});
    
