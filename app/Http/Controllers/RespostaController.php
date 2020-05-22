<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vistoria;
use App\Resposta;
use App\Pergunta;
use App\SalaComercial;
use App\Comentario;


class RespostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $respostas = Resposta::where('vistoria', $id)->get();
        $vistorias = Vistoria::where('id', $id)->get();
        $perguntas = Pergunta::All();
        $salacomerciais = SalaComercial::All();
        $comentarios = Comentario::All();
		return view("resposta.index", compact('respostas', 'vistorias', 'perguntas', 'salacomerciais', 'comentarios'));
    }
}
