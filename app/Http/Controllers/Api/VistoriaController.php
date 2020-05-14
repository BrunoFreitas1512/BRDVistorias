<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SalaComercial;
use App\Vistoria;
use App\Pergunta;
use App\Resposta;

class VistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pergunta() {
        $perguntas = Pergunta::All();
        return compact("perguntas");
    }
    public function vistoria() {
        $vistorias = Vistoria::All();
        return compact("vistorias");
    }
    public function salaComercial() {
        $salascomercias = SalaComercial::All();
        return compact("salascomercias");
    }
    public function resposta() {
        $respostas = Resposta::All();
        return compact("respostas");
    } 
    public function getVistoria ($id) {
        $vistorias = Vistoria::find($id);
        return compact("vistorias");
    }
    public function getResposta ($id) {
        $respostas = Resposta::find($id);
        return compact("respostas");
    }
    public function adicionarVistoria (Request $request) {
        try {
            $vistoria = new Vistoria();
            $vistoria->comentario = $request->comentario_app;
            $vistoria->datavistoria = $request->datavistoria_app;
            $vistoria->salacomercial = $request->salacomercial_app;
            $vistoria->save();
            return ['insert' => 'ok'];
        } catch (Exception $erro) {
            return ['erro' => 'ok'];
        }
    }
    public function adicionarResposta (Request $request) {
        try {
            $resposta = new Resposta();
            $resposta->situacao = $request->situacao_app;
            $resposta->vistoria = $request->vistoria_app;
            $resposta->pergunta = $request->pergunta_app;
            $resposta->save();
            return ['insert' => 'ok'];
        } catch (Exception $erro) {
            return ['erro' => 'ok'];
        }
    }
    public function atualizarVistoria (Request $request, $id) {
        try {
            $vistoria = Vistoria::find($id);
            $vistoria->comentario = $request->comentario_app;
            $vistoria->datavistoria = $request->datavistoria_app;
            $vistoria->salacomercial = $request->salacomercial_app;
            $vistoria->save();
            return ['update' => 'ok'];
        } catch (Exception $erro) {
            return ['erro' => 'ok'];
        }
    }
    public function atualizarResposta (Request $request, $id) {
        try {
            $resposta = Resposta::find($id);
            $resposta->situacao = $request->situacao_app;
            $resposta->vistoria = $request->vistoria_app;
            $resposta->pergunta = $request->pergunta_app;
            $resposta->save();
            return ['update' => 'ok'];
        } catch (Exception $erro) {
            return ['erro' => 'ok'];
        }
    }
    public function deleteVistoria ($id) {
        try {
            $vistoria = Vistoria::find($id);
            $vistoria->delete();
            return ['delete' => 'ok'];
        } catch (Exception $erro) {
            return ['erro' => 'ok'];
        }
    }
    public function deleteResposta ($id) {
        try {
            $resposta = Resposta::find($id);
            $resposta->delete();
            return ['delete' => 'ok'];
        } catch (Exception $erro) {
            return ['erro' => 'ok'];
        }
    }
}
