<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pergunta;

class PerguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pergunta = new Pergunta();
        $perguntas = Pergunta::All();
        return view("pergunta.index", [
			"pergunta" => $pergunta,
            "perguntas" => $perguntas
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
        if ($request->get("id") != null) {
            $pergunta= Pergunta::Find($request->get("id"));
        }
		else {
            $pergunta = new Pergunta();	
        }
		
       $request->validate([
            "pergunta" => "required"
		], [
			"pergunta.required" => "Pergunta e obrigatoria"
		]);
		
        $id = $request->get("id");
        $pergunta->pergunta = $request->get("pergunta");
        $pergunta->save();
		$request->session()->flash("mensagem", "Salvo com sucesso!");
		return redirect("/pergunta");
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
        $pergunta = Pergunta::Find($id);
		$perguntas = Pergunta::All();
		return view("pergunta.index", [
			"pergunta" => $pergunta,
			"perguntas" => $perguntas
		]);
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
    public function destroy(Request $request, $id)
    {
        Pergunta::Destroy($id);
		$request->session()->flash("status", "Pergunta excluida com sucesso!");
		return redirect("/pergunta");
    }
}
