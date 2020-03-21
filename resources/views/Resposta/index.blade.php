@extends("layout.index")

@section("titulo", "Vistoria")
<main>
    @section('listagem')
    <div class="margem-vistoria">
        <div class="container">
            <div class="titulo-cadastro">
                Listagem de Vistoria
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
            <table class="table table-striped">
                <colgroup>
                    <col width="800">
                    <col width="200">
                </colgroup>
                <thead>
                    <tr>
                        <th>Comentario</th>
                        <th>Data Vistoria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vistorias as $vist)
                        <tr>
                            <td>
                                {{ $vist->comentario }}
                            </td>	
                            <td>
                                {{ $vist->datavistoria }}
                            </td>	
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</main>