<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SalaComercial;
use App\Endereco;

class VistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vistoria()
    {
        $salacomerciais = SalaComercial::All();
		$enderecos = Endereco::All();
        return compact(
            "salascomerciais",
            "enderecos"
        );
    }
    public function getVistoria ($id) {
        $salaComercial = SalaComercial::find($id);

        return $salaComercial;
    } 
    public function adicionar (Request $request) {
        try {

            $salacomercial = new SalaComercial();
            $salacomercial->nome = $request->nome_app;
            $salacomercial->nomeproprietario = $request->nomepropietario_app;
            $salacomercial->endereco = 2;
            $salacomercial->save();

            return ['insert' => 'ok'];

        } catch (Exception $erro) {

            return ['erro' => 'ok'];

        }
    }
    public function atualizar (Request $request, $id) {
        try {

            $salacomercial = SalaComercial::find($id);
            $salacomercial->nome = $request->nome_app;
            $salacomercial->nomeproprietario = $request->nomepropietario_app;
            $salacomercial->endereco = 3;
            $salacomercial->save();

            return ['update' => 'ok'];

        } catch (Exception $erro) {

            return ['erro' => 'ok'];

        }
    }
    public function delete ($id) {
        try {

            $salacomercial = SalaComercial::find($id);
            $salacomercial->delete();

            return ['delete' => 'ok'];

        } catch (Exception $erro) {

            return ['erro' => 'ok'];

        }
    }
}
