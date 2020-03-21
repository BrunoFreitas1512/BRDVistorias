@extends("layout.index")

@section("titulo", "Vistorias")
<main>
    @section('listagem')
    <div class="margem-vistoria">
        <div class="container">
            <div class="titulo-cadastro">
                Listagem de Vistorias
            </div>
            <table class="table table-striped">
                <colgroup>
                    <col width="300">
                    <col width="300">
                    <col width="300">
                    <col width="100">
                </colgroup>
                <thead>
                    <tr>
                        <th>Sala Comercial</th>
                        <th>Comentario</th>
                        <th>Data Vistoria</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vistorias as $vistoria)
                        <tr>
                            <td>
                                @foreach ($salascomerciais as $sala)
                                    @if ($vistoria->salacomercial == $sala->id)
                                        {{ $sala->nome }}
                                    @endif
                                @endforeach
                            </td>	
                            <td>{{ $vistoria->comentario }}</td>	
                            <td>{{ $vistoria->datavistoria }}</td>	
                            <td>
                                <a href="/resposta/{{ $vistoria->id }}" class="btn btn-dark form-control">
                                    Visualizar
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</main>