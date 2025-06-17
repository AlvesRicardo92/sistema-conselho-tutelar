<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Procedimentos') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Pesquisar Procedimentos</h5>
        </div>
        <div class="card-body">
            @if ($error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endif

            <form action="{{ route('procedimentos.index') }}" method="GET" class="mb-4">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="numero_procedimento" class="form-label">Nº Procedimento:</label>
                        <input type="number" class="form-control" id="numero_procedimento" name="numero_procedimento" value="{{ request('numero_procedimento') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="nome_pessoa_atendida" class="form-label">Nome Pessoa Atendida:</label>
                        <input type="text" class="form-control" id="nome_pessoa_atendida" name="nome_pessoa_atendida" value="{{ request('nome_pessoa_atendida') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="nome_genitora_pessoa_atendida" class="form-label">Nome Genitora:</label>
                        <input type="text" class="form-control" id="nome_genitora_pessoa_atendida" name="nome_genitora_pessoa_atendida" value="{{ request('nome_genitora_pessoa_atendida') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="data_nascimento_pessoa_atendida" class="form-label">Data Nasc. Pessoa Atendida:</label>
                        <input type="date" class="form-control" id="data_nascimento_pessoa_atendida" name="data_nascimento_pessoa_atendida" value="{{ request('data_nascimento_pessoa_atendida') }}">
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                    <a href="{{ route('procedimentos.create') }}" class="btn btn-success">Novo Procedimento</a>
                </div>
            </form>

            @if ($searchMade && !$error)
                @if ($procedimentos->isEmpty())
                    <div class="alert alert-info" role="alert">
                        Nenhum procedimento encontrado para os critérios de pesquisa.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nº / Ano</th>
                                    <th>Pessoa Atendida</th>
                                    <th>Genitora</th>
                                    <th>Nascimento</th>
                                    <th>Sexo</th>
                                    <th>Endereço</th>
                                    <th>Origem</th>
                                    <th>Criado em</th>
                                    <th>Criado por</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($procedimentos as $procedimento)
                                    <tr>
                                        <td>{{ $procedimento->numero_procedimento }}/{{ $procedimento->ano_procedimento }}</td>
                                        <td>{{ $procedimento->nome_pessoa_atendida }}</td>
                                        <td>{{ $procedimento->nome_genitora_pessoa_atendida }}</td>
                                        <td>{{ $procedimento->data_nascimento_pessoa_atendida->format('d/m/Y') }}</td>
                                        <td>{{ $procedimento->sexo->nome }}</td>
                                        <td>{{ $procedimento->logradouro->bairro }} ({{ $procedimento->logradouro->cep }})</td>
                                        <td>{{ $procedimento->origem_criacao }}</td>
                                        <td>{{ $procedimento->data_hora_criacao->format('d/m/Y H:i') }}</td>
                                        <td>{{ $procedimento->criadoPor->name }}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info">Ver</a>
                                            <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                            <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @else
                <div class="alert alert-info" role="alert">
                    Utilize os campos acima para realizar uma pesquisa de procedimentos.
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
