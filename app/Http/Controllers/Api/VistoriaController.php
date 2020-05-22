<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SalaComercial;
use App\Vistoria;
use App\Pergunta;
use App\Resposta;
use App\Comentario;
use Illuminate\Support\Facades\DB;

class VistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listaPerguntasVistorias($id) {
        $respostas = DB::select('SELECT r.id as idRespota, r.situacao, p.pergunta, v.id as idVistoria, p.id as idPergunta FROM resposta as r, vistoria as v, pergunta as p WHERE p.id = r.pergunta AND r.vistoria = v.id AND v.id = :id',['id' => $id]);
        return compact("respostas");
    }
    public function listaScVistorias() {
        $vistorias = DB::select('SELECT sc.id as idSC, sc.nome, v.id as idVistoria, v.datavistoria, c.comentario FROM vistoria as v, salacomercial as sc, comentario as c WHERE sc.id = v.salacomercial AND c.vistoria = v.id');
        return compact("vistorias");
    }
    public function comentario() {
        $comentarios = Comentario::All();
        return compact("comentarios");
    }
    public function pergunta() {
        $perguntas = Pergunta::All();
        return compact("perguntas");
    }
    public function vistoria() {
        $vistorias = Vistoria::All();
        return compact("vistorias");
    }
    public function ultimaVistoria() {
        $vistorias = Vistoria::All()->max('id');
        return compact('vistorias');
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
    public function getResposta($id) {
        $respostas = DB::select('SELECT r.id as idResposta FROM resposta as r, vistoria as v WHERE r.vistoria = v.id AND v.id = :id',['id' => $id]);
        return compact("respostas");
    }
    public function getComentario($id) {
        $comentarios = DB::select('SELECT c.id as idComentario, c.comentario FROM comentario as c, vistoria as v WHERE c.vistoria = v.id AND v.id = :id', ['id' => $id]);
        return compact("comentarios");
    }
    public function adicionarVistoria (Request $request) {
        try {
            $vistoria = new Vistoria();
            $vistoria->datavistoria = $request->datavistoria_app;
            $vistoria->salacomercial = $request->salacomercial_app;
            $vistoria->save();
            $vistorias = Vistoria::All()->max('id');
            return compact('vistorias');
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
    public function adicionarComentario (Request $request) {
        try {
            $comentario = new Comentario();
            $comentario->comentario = $request->comentario_app;
            $comentario->vistoria = $request->vistoria_app;
            $comentario->save();
            return ['insert' => 'ok'];
        } catch (Exception $erro) {
            return ['erro' => 'ok'];
        }
    }
    public function atualizarVistoria (Request $request, $id) {
        try {
            $vistoria = Vistoria::find($id);
            $vistoria->datavistoria = $request->datavistoria_app;
            $vistoria->salacomercial = $request->salacomercial_app;
            $vistoria->save();
            return ['update' => 'ok'];
        } catch (Exception $erro) {
            return ['erro' => 'ok'];
        }
    }
    public function atualizarComentario (Request $request, $id) {
        try {
            $comentario = Comentario::find($id);
            $comentario->comentario = $request->comentario_app;
            $comentario->vistoria = $request->vistoria_app;
            $comentario->save();
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
    public function deleteVistoria($id) {
        try {
            $vistoria = DB::delete('DELETE FROM vistoria WHERE id = :id', ['id' => $id]);
            return ['vistoria delete' => 'ok'];
        } catch (Exception $erro) {
            return ['erro' => 'ok'];
        }
    }
    public function deleteResposta ($id) {
        try {
            $resposta = DB::delete('DELETE FROM resposta WHERE vistoria = :id', ['id' => $id]);
            return ['resposta delete' => 'ok'];
        } catch (Exception $erro) {
            return ['erro' => 'ok'];
        }
    }
    public function deleteComentario ($id) {
        try {
            $comentario = DB::delete('DELETE FROM comentario WHERE vistoria = :id', ['id' => $id]);
            return ['comentario delete' => 'ok'];
        } catch (Exception $erro) {
            return ['erro' => 'ok'];
        }
    }
}
