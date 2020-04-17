<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SalaComercial;

class VistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vistoria()
    {
        return SalaComercial::all();
    }
    public function getVistoria ($id) {
        $salaComercial = SalaComercial::find($id);

        return $salaComercial;
    } 
    public function adicionar (Request $request) {
        try {

            $salaComercial = new SalaComercial;
            $salacomercial->nome = $request->get("nome");
            $salacomercial->nomeproprietario = $request->get("nomeproprietario");
            $salacomercial->endereco = 2;
            $salacomercial->save();

            return ['insert' => 'ok'];

        } catch (Exception $erro) {

            return ['erro' => 'ok'];

        }
    }
}
