<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Novo Procedimento') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Cadastrar Novo Procedimento</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('procedimentos.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nome_pessoa_atendida" class="form-label">Nome da Pessoa Atendida<span class="text-danger">*</span>:</label>
                    <input type="text" class="form-control @error('nome_pessoa_atendida') is-invalid @enderror" id="nome_pessoa_atendida" name="nome_pessoa_atendida" value="{{ old('nome_pessoa_atendida') }}" required>
                    @error('nome_pessoa_atendida')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nome_genitora_pessoa_atendida" class="form-label">Nome da Genitora da Pessoa Atendida:</label>
                    <input type="text" class="form-control @error('nome_genitora_pessoa_atendida') is-invalid @enderror" id="nome_genitora_pessoa_atendida" name="nome_genitora_pessoa_atendida" value="{{ old('nome_genitora_pessoa_atendida') }}">
                    @error('nome_genitora_pessoa_atendida')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="data_nascimento_pessoa_atendida" class="form-label">Data de Nascimento da Pessoa Atendida<span class="text-danger">*</span>:</label>
                    <input type="date" class="form-control @error('data_nascimento_pessoa_atendida') is-invalid @enderror" id="data_nascimento_pessoa_atendida" name="data_nascimento_pessoa_atendida" value="{{ old('data_nascimento_pessoa_atendida') }}" required>
                    @error('data_nascimento_pessoa_atendida')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="sexo_id" class="form-label">Sexo da Pessoa Atendida<span class="text-danger">*</span>:</label>
                    <select class="form-select @error('sexo_id') is-invalid @enderror" id="sexo_id" name="sexo_id" required>
                        <option value="">Selecione o Sexo</option>
                        @foreach ($sexos as $sexo)
                            <option value="{{ $sexo->id }}" {{ old('sexo_id') == $sexo->id ? 'selected' : '' }}>{{ $sexo->nome }}</option>
                        @endforeach
                    </select>
                    @error('sexo_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="logradouro_id" class="form-label">Bairro da Pessoa Atendida<span class="text-danger">*</span>:</label>
                    <select class="form-select @error('logradouro_id') is-invalid @enderror" id="logradouro_id" name="logradouro_id" required>
                        <option value="">Selecione o Bairro</option>
                        @foreach ($logradouros as $logradouro)
                            <option value="{{ $logradouro->id }}" {{ old('logradouro_id') == $logradouro->id ? 'selected' : '' }}>
                                {{ $logradouro->bairro }} ({{ $logradouro->cep }}) @if($logradouro->vila)- {{ $logradouro->vila }}@endif
                            </option>
                        @endforeach
                    </select>
                    @error('logradouro_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="origem_criacao" class="form-label">Origem da Criação do Procedimento<span class="text-danger">*</span>:</label>
                    <select class="form-select @error('origem_criacao') is-invalid @enderror" id="origem_criacao" name="origem_criacao" required>
                        <option value="">Selecione a Origem</option>
                        @foreach ($origens as $origem)
                            <option value="{{ $origem }}" {{ old('origem_criacao') == $origem ? 'selected' : '' }}>{{ $origem }}</option>
                        @endforeach
                    </select>
                    @error('origem_criacao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">Salvar Procedimento</button>
                    <a href="{{ route('procedimentos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
