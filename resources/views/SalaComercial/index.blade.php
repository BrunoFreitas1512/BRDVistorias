@extends("layout.index")

@section("titulo", "Sala Comercial")

@section("cadastro")
    <main>
        <div class="margem-cadastro">
            <div class="container">
                <div class="titulo-cadastro">
                    Cadastrar Sala Comercial
                </div>
                <form action="/salacomercial" method="POST">
                    @csrf
                    <section class="grid-cadastro">
                        <div class="form-group">
                            <label for="identLoja">Identificação da Loja</label>
                            <input type="text" name="nome" value="{{$salacomercial->nome}}" class="form-control {{ ($errors->get('nome') != null) ? 'is-invalid' : '' }}">
                            <small class="text-danger">{{ utf8_encode($errors->first("nome")) }}</small>
                        </div>
                        <div class="form-group">
                            <label for="nomePropri">Nome Proprietario</label>
                            <input type="text" name="nomeproprietario" value="{{$salacomercial->nomeproprietario}}" class="form-control {{ ($errors->get('nomeproprietario') != null) ? 'is-invalid' : '' }}">
                            <small class="text-danger">{{ utf8_encode($errors->first("nomeproprietario")) }}</small>
                        </div>
                        <div class="form-group">
                            <label for="rua">Rua</label>
                            <input type="text" name="rua" value="{{$endereco->rua}}" class="form-control {{ ($errors->get('rua') != null) ? 'is-invalid' : '' }}">
                            <small class="text-danger">{{ utf8_encode($errors->first("rua")) }}</small>
                        </div>
                        <div class="form-group">
                            <label for="numero">Numero</label>
                            <input type="text" name="numero" value="{{$endereco->numero}}" class="form-control {{ ($errors->get('numero') != null) ? 'is-invalid' : '' }}">
                            <small class="text-danger">{{ utf8_encode($errors->first("numero")) }}</small>
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" value="{{$endereco->bairro}}" class="form-control {{ ($errors->get('bairro') != null) ? 'is-invalid' : '' }}">
                            <small class="text-danger">{{ utf8_encode($errors->first("bairro")) }}</small>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" value="{{$endereco->estado}}" class="form-control {{ ($errors->get('estado') != null) ? 'is-invalid' : '' }}">
                            <small class="text-danger">{{ utf8_encode($errors->first("estado")) }}</small>
                        </div>
                        <div class="form-group">
                            <label for="cep">Cep</label>
                            <input type="text" name="cep" value="{{$endereco->cep}}" class="form-control {{ ($errors->get('cep') != null) ? 'is-invalid' : '' }}">
                            <small class="text-danger">{{ utf8_encode($errors->first("cep")) }}</small>
                        </div>
                        <div class="form-group subgrid-cadastro">
                            <div>
                                <input type="hidden" name="id" value="{{$salacomercial->id}}" />
                                <button type="submit" class="btn btn-warning botaosalvar form-control">Salvar</button>
                            </div>
                            <div>
                                <button type="reset" class="btn btn-danger botaolimpar form-control">Limpar</button>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('listagem')
<div class="margem-listagem">
    <div class="container">
        <div class="titulo-cadastro">
            Listagem Sala Comercial
        </div>
        <table class="table table-striped">
            <colgroup>
                <col width="100">
                <col width="100">
                <col width="200">
                <col width="50">
                <col width="150">
                <col width="160">
                <col width="100">
                <col width="20">
                <col width="20">
            </colgroup>
            <thead>
                <tr>
                    <th>Identificação Loja</th>
                    <th>Nome Propietario</th>
                    <th>Rua</th>
                    <th>Numero</th>
                    <th>Bairro</th>
                    <th>Estado</th>
                    <th>Cep</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salascomerciais as $salacomercial)
                    <tr>
                        <td>{{ $salacomercial->nome }}</td>
                        <td>{{ $salacomercial->nomeproprietario }}</td>
                        <td>
                            @foreach ($enderecos as $endereco)
                                @if($endereco->id == $salacomercial->endereco)
                                    {{ $endereco->rua }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($enderecos as $endereco)
                                @if($endereco->id == $salacomercial->endereco)
                                    {{ $endereco->numero }}
                                @endif
                            @endforeach    
                        </td>	
                        <td>
                            @foreach ($enderecos as $endereco)
                                @if($endereco->id == $salacomercial->endereco)
                                    {{ $endereco->bairro }}
                                @endif
                            @endforeach
                        </td>	
                        <td>
                            @foreach ($enderecos as $endereco)
                                @if($endereco->id == $salacomercial->endereco)
                                    {{ $endereco->estado }}
                                @endif
                            @endforeach
                        </td>	
                        <td>
                            @foreach ($enderecos as $endereco)
                                @if($endereco->id == $salacomercial->endereco)
                                    {{ $endereco->cep }}
                                @endif
                            @endforeach
                        </td>	
                        <td>
                            <a  href="/salacomercial/{{ $salacomercial->id }}/edit" class="btn text-dark">
                                <i class="fa fa-magic"></i>
                            </a>
                        </td>
                        <td>
                            <a href="/salacomercial/{{ $salacomercial->id }}/delete" class="btn botaoexcluir">
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