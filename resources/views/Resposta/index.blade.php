@extends("layout.index")

@section("titulo", "Vistoria")
<main>
    @section('listagem')
    <div class="margem-vistoria">
        <div class="container">
            <div class="titulo-cadastro">
                Listagem de Vistoria
            </div>
            <div class="titulo-respostas">
                @foreach ($salacomerciais as $sala)
                    @foreach ($vistorias as $visto)
                        @if ($sala->id == $visto->salacomercial)
                            <h1>
                                <span>Sala Comercial: </span>
                                {{ $sala->nome }}
                            </h1>
                            <h2>
                                <span>Data: </span>
                                {{ $visto->datavistoria }}
                            </h2>
                            <p>
                                <span>Comentario: </span>
                                {{ $visto->comentario }}
                            </p>
                        @endif
                    @endforeach
                @endforeach
            </div>
            <table class="table table-striped">
                <colgroup>
                    <col width="800">
                    <col width="200">
                </colgroup>
                <thead>
                    <tr>
                        <th>Pergunta</th>
                        <th>Situação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respostas as $resp)
                        <tr>
                            <td>
                                @foreach ($perguntas as $perg)
                                    @if ($resp->pergunta == $perg->id)
                                        {{ $perg->pergunta }}
                                    @endif
                                @endforeach
                            </td>	
                            <td>
                                @if ($resp->situacao == true)
                                    OK
                                @else
                                    N OK
                                @endif
                            </td>	
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="div-botao-voltar">
                <a href="/vistoria" class="btn btn-danger botaolimpar">Voltar</a>
            </div>
        </div>
    </div>
    @endsection
</main>