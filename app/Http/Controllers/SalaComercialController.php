<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaComercial;
use App\Endereco;
use Illuminate\Support\Facades\DB;

class SalaComercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listaIdEndereco() {
		return DB::table('endereco')->max('id');
    }
    public function index()
    {
        $salacomercial = new SalaComercial();
        $salacomerciais = SalaComercial::All();
        $endereco = new Endereco();
		$enderecos = Endereco::All();
        return view("salacomercial.index", [
			"salacomercial" => $salacomercial,
            "salascomerciais" => $salacomerciais,
            "endereco" => $endereco,
            "enderecos" => $enderecos
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
            $salacomercial = SalaComercial::Find($request->get("id"));
			$endereco = Endereco::Find($request->get("id"));
        }
		else {
            $salacomercial = new SalaComercial();	
            $endereco = new Endereco();
        }
		
       $request->validate([
			"nome" => "required",
			"nomeproprietario" => "required",
            "rua" => "required",
            "numero" => "required",
            "bairro" => "required",
            "estado" => "required",
            "cidade" => "required",
            "cep" => "required"
		], [
			"nome.required" => "Identificacao da empresa e obrigatoria",
            "nomeproprietario.required" => "Nome Proprietario e obrigatorio",
            "rua.required" => "Rua e obrigatoria",
            "numero.required" => "Numero e obrigatorio",
            "bairro.required" => "Bairro e obrigatorio",
            "estado.required" => "Estado e obrigatorio",
            "cidade.required" => "Cidade e obrigatoria",
			"cep.required" => "CEP e obrigatorio"
		]);
		
        $id = $request->get("id");
        $id2 = 0;
        if ($id == null) {
            $salacomercial = new SalaComercial();
            $endereco = new Endereco();
		} else {
            $salacomercial = SalaComercial::Find($id);
            $enderecos = Endereco::All();
            $salacomerciais = SalaComercial::All();
            foreach ($salacomerciais as $sala) {
                if($sala->id == $id) {
                    $endereco = Endereco::Find($sala->endereco);
                }
            }
            
        }
        $endereco->rua = $request->get("rua");
        $endereco->bairro = $request->get("bairro");
        $endereco->numero = $request->get("numero");
        $endereco->estado = $request->get("estado");
        $endereco->cidade = $request->get("cidade");
        $endereco->cep = $request->get("cep");
        $endereco->save();
        $idEndereco = $this->listaIdEndereco();
        $id3 = 0;
        if ($id == null) {
            $id3 = $idEndereco;
		} else {
            $enderecos = Endereco::All();
            $salacomerciais = SalaComercial::All();
            foreach ($salacomerciais as $sala) {
                if($sala->id == $request->get("id")) {
                    $id3 = $sala->endereco;
                }
            }
        }
		$salacomercial->nome = $request->get("nome");
        $salacomercial->nomeproprietario = $request->get("nomeproprietario");
        $salacomercial->endereco = $id3;
		$salacomercial->save();
		$request->session()->flash("mensagem", "Salvo com sucesso!");
		return redirect("/salacomercial");
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
        $enderecos = Endereco::All();
        $salacomerciais = SalaComercial::All();
        foreach ($salacomerciais as $sala) {
			if($sala->id == $id) {
                $id2 = $sala->endereco;
			}
		}
        $salacomercial = SalaComercial::Find($id);
        $endereco = Endereco::Find($id2);
		
        return view("salacomercial.index", [
			"salacomercial" => $salacomercial,
            "salascomerciais" => $salacomerciais,
            "endereco" => $endereco,
            "enderecos" => $enderecos
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
        $enderecos = Endereco::All();
        $salacomerciais = SalaComercial::All();
        $id2 = 0;
        foreach ($salacomerciais as $sala) {
			if($sala->id == $id) {
                $id2 = $sala->endereco;
			}
		}
        SalaComercial::Destroy($id);
        Endereco::Destroy($id2);
		$request->session()->flash("status", "Aluno excluido com sucesso!");
		return redirect("/salacomercial");
    }
}
