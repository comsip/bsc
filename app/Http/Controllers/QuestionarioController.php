<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionario;
use App\Models\Pergunta;

class QuestionarioController extends Controller
{
    public function proximo($questionario_id, $grupo_id, $pergunta_id)
    {
        $pergunta_atual = Pergunta::findOrFail($pergunta_id);

        $proxima_pergunta = $pergunta_atual->proximaPergunta;

        if ($proxima_pergunta) {
            return redirect()->route('questionario.pergunta', [
                'questionario_id' => $questionario_id,
                'grupo_id' => $grupo_id,
                'pergunta_id' => $proxima_pergunta->id
            ]);
        } else {
            return redirect()->route('questionario.resultado', [
                'questionario_id' => $questionario_id
            ]);
        }
    }
    public function index()
    {
        $questionarios = Questionario::all();
        return view('questionarios.index', compact('questionarios'));
    }

    public function create()
    {
        return view('questionarios.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|max:255'
        ], [
            'nome.required' => 'O nome do questionário é obrigatório.',
            'nome.max' => 'O nome do questionário não pode ter mais que 255 caracteres.'
        ]);

        $questionario = new Questionario;
        $questionario->nome = $request->input('nome');
        $questionario->save();

        return redirect()->route('questionarios.index')
            ->with('success', 'Questionário criado com sucesso!');
    }

    public function show(Questionario $questionario)
    {
        $grupos = $questionario->grupos;
        return view('questionarios.show', compact('questionario', 'grupos'));
    }

    public function edit(Questionario $questionario)
    {
        return view('questionarios.edit', compact('questionario'));
    }

    public function update(Request $request, Questionario $questionario)
    {
        $request->validate([
            'nome' => 'required|max:255'
        ], [
            'nome.required' => 'O nome do questionário é obrigatório.',
            'nome.max' => 'O nome do questionário não pode ter mais que 255 caracteres.'
        ]);

        $questionario->nome = $request->input('nome');
        $questionario->save();

        return redirect()->route('questionarios.index')->with('success', 'Questionário atualizado com sucesso!');
    }

    public function destroy(Questionario $questionario)
    {
        $questionario->delete();

        return redirect()->route('questionarios.index')->with('success', 'Questionário excluído com sucesso!');
    }
}
