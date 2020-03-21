<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vistoria;
use App\Resposta;
use App\Pergunta;
use App\SalaComercial;


class RespostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $resposta = new Resposta();
        $respostas = Resposta::where('vistoria', $id)->get();
        $vistorias = Vistoria::Find($id);
        $perguntas = Pergunta::All();
        $salacomerciais = SalaComercial::All();
		return view("resposta.index", [
            "resposta" => $resposta,
            "respostas" => $respostas,
            "vistorias" => $vistorias,
            "perguntas" => $perguntas,
            "salacomerciais" => $salacomerciais
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
