<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::Resources([
	"/" => "SalaComercialController",
	"salacomercial" => "SalaComercialController",
	"pergunta" => "PerguntaController",
	"vistoria" => "VistoriaController"
]);

Route::get("/resposta/{id}", "RespostaController@index");

Route::get("/salacomercial/{id}/delete", "SalaComercialController@destroy");
Route::get("/pergunta/{id}/delete", "PerguntaController@destroy");