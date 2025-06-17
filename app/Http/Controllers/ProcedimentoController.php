<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procedimento;
use App\Models\Sexo;
use App\Models\Logradouro;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProcedimentoController extends Controller
{
    public function index(Request $request)
    {
        $procedimentos = collect();
        $searchMade = false;
        $error = null;

        if ($request->hasAny(['numero_procedimento', 'nome_pessoa_atendida', 'nome_genitora_pessoa_atendida', 'data_nascimento_pessoa_atendida'])) {
            $searchMade = true;

            $searchFields = array_filter([
                'numero_procedimento' => $request->numero_procedimento,
                'nome_pessoa_atendida' => $request->nome_pessoa_atendida,
                'nome_genitora_pessoa_atendida' => $request->nome_genitora_pessoa_atendida,
                'data_nascimento_pessoa_atendida' => $request->data_nascimento_pessoa_atendida,
            ]);

            if (count($searchFields) > 1) {
                $error = 'Por favor, preencha apenas um campo para pesquisa por vez.';
            } elseif (count($searchFields) == 1) {
                $query = Procedimento::query();

                if ($request->filled('numero_procedimento')) {
                    $query->where('numero_procedimento', $request->numero_procedimento);
                } elseif ($request->filled('nome_pessoa_atendida')) {
                    $query->where('nome_pessoa_atendida', 'like', '%' . $request->nome_pessoa_atendida . '%');
                } elseif ($request->filled('nome_genitora_pessoa_atendida')) {
                    $query->where('nome_genitora_pessoa_atendida', 'like', '%' . $request->nome_genitora_pessoa_atendida . '%');
                } elseif ($request->filled('data_nascimento_pessoa_atendida')) {
                    $query->where('data_nascimento_pessoa_atendida', $request->data_nascimento_pessoa_atendida);
                }

                // --- Lógica de Ordenação ---
                // Ordena por ano da 'data' (descendente para os mais recentes primeiro)
                // e depois por 'numero' (ascendente para os menores números primeiro)
                $query->orderByRaw('ano_procedimento DESC')
                    ->orderBy('numero_procedimento', 'DESC');

                $procedimentos = $query->get(); // Obtém os resultados ordenados
            }
        }

        return view('procedimentos.index', compact('procedimentos', 'searchMade', 'error'));
    }

    public function create()
    {
        $sexos = Sexo::all();
        $logradouros = Logradouro::where('ativo', true)->get();
        $origens = [
            'Familiar',
            'Unidade de Saúde',
            'Unidade Escolar',
            'Outros Órgãos',
            'Denúncia Anônima',
            'Próprio Conselho Tutelar',
        ];
        return view('procedimentos.create', compact('sexos', 'logradouros', 'origens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_pessoa_atendida' => 'required|string|max:255',
            'nome_genitora_pessoa_atendida' => 'nullable|string|max:255',
            'data_nascimento_pessoa_atendida' => 'required|date',
            'sexo_id' => 'required|exists:sexos,id',
            'logradouro_id' => 'required|exists:logradouros,id',
            'origem_criacao' => 'required|string|max:255',
        ]);

        $currentYear = Carbon::now()->year;
        $lastProcedimento = Procedimento::where('ano_procedimento', $currentYear)
                                    ->orderByDesc('numero_procedimento')
                                    ->first();

        $numeroProcedimento = 1;
        if ($lastProcedimento) {
            $numeroProcedimento = $lastProcedimento->numero_procedimento + 1;
        }

        Procedimento::create([
            'numero_procedimento' => $numeroProcedimento,
            'ano_procedimento' => $currentYear,
            'nome_pessoa_atendida' => $request->nome_pessoa_atendida,
            'nome_genitora_pessoa_atendida' => $request->nome_genitora_pessoa_atendida,
            'data_nascimento_pessoa_atendida' => $request->data_nascimento_pessoa_atendida,
            'sexo_id' => $request->sexo_id,
            'logradouro_id' => $request->logradouro_id,
            'origem_criacao' => $request->origem_criacao,
            'criado_por_user_id' => Auth::id(),
            'data_hora_criacao' => Carbon::now(),
        ]);

        return redirect()->route('procedimentos.index')->with('success', 'Procedimento criado com sucesso!');
    }
}
