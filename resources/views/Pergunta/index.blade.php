@extends("layout.index")

@section("titulo", "Perguntas")
<main>
    @section("cadastro")
        <div class="margem-perguntas">
            <div class="container">
                <div class="titulo-cadastro">
                    Cadastrar Perguntas
                </div>
                <form action="/pergunta" method="POST">
                    @csrf
                    <section class="grid-perguntas">
                        <div class="form-group">
                            <label for="pergunta">Pergunta  (maximo 1000 caracteres)</label>
                            <textarea name="pergunta" rows="10" maxlength="1000" id="pergunta" value="{{$pergunta->pergunta}}" class="form-control {{ ($errors->get('pergunta') != null) ? 'is-invalid' : '' }}">{{$pergunta->pergunta}}</textarea>
                            <small class="text-danger">{{ utf8_encode($errors->first("pergunta")) }}</small>
                        </div>
                        <div class="subgrid-perguntas">
                            <div>
                                <input type="hidden" name="id" value="{{$pergunta->id}}" />
                                <button type="submit" class="btn btn-warning botaosalvar form-control">Salvar</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger botaolimpar form-control">Limpar</button>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    @endsection
</main>
@section('listagem')
    <div class="margem-listagem">
        <div class="container">
            <div class="titulo-cadastro">
                Listagem Perguntas
            </div>
            <table class="table table-striped">
                <colgroup>
                    <col width="760">
                    <col width="120">
                    <col width="120">
                </colgroup>
                <thead>
                    <tr>
                        <th>Pergunta</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perguntas as $pergunta)
                        <tr>
                            <td>{{ $pergunta->pergunta }}</td>	
                            <td>
                                <a href="/pergunta/{{ $pergunta->id }}/edit" class="btn text-dark">
                                    <i class="fa fa-magic"></i>
                                </a>
                            </td>
                            <td>
                                <a href="/pergunta/{{ $pergunta->id }}/delete" class="btn botaoexcluir">
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection