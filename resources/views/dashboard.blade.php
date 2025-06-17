<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="d-flex flex-wrap justify-content-center gap-4">
            <a href="{{ route('procedimentos.index') }}" class="btn btn-primary dashboard-btn">
                PROCEDIMENTOS
            </a>
            <a href="#" class="btn btn-primary dashboard-btn">
                OFÍCIOS<br>RECEBIDOS
            </a>
            <a href="#" class="btn btn-primary dashboard-btn">
                OFÍCIOS<br>EXPEDIDOS
            </a>
            <a href="#" class="btn btn-primary dashboard-btn">
                DENÚNCIA
            </a>
            <a href="#" class="btn btn-primary dashboard-btn">
                PÁGINAS<br>AMARELAS
            </a>
            @if (Auth::user()->is_admin)
                <a href="#" class="btn btn-primary dashboard-btn">
                    ADMIN
                </a>
            @endif
        </div>
    </div>

    <style>
        .dashboard-btn {
            width: 150px; /* Largura fixa para os botões */
            height: 150px; /* Altura fixa para os botões */
            border-radius: 15px; /* Bordas arredondadas */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-weight: bold;
            color: #fff; /* Cor do texto */
            background-color: #007bff; /* Cor de fundo Bootstrap primary */
            border-color: #007bff; /* Cor da borda */
            transition: background-color 0.3s ease;
        }

        .dashboard-btn:hover {
            background-color: #0056b3; /* Cor de fundo mais escura ao passar o mouse */
            border-color: #0056b3;
        }

        .dashboard-btn br {
            content: '';
            display: block;
            margin-bottom: 5px; /* Espaçamento entre as linhas do label */
        }
    </style>
</x-app-layout>
