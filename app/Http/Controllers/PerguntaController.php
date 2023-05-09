<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Pergunta;

class PerguntaController extends Controller
{
    public function index()
    {
        $perguntas = pergunta::all();
        return view('perguntas.index', compact('perguntas'));
    }
    public function create(Pergunta $perguntas)
    {
        $grupos = Grupo::all();
        return view('perguntas.create', compact('grupos'));
    }

    public function store(Request $request, Grupo $grupo)
    {
        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'grupo_id' =>  'required|string|max:255',
            'op1' =>  'required|string|max:255',
            'op2' =>  'required|string|max:255',
            'op3' =>  'required|string|max:255',
            'op4' =>  'required|string|max:255',
            'op5' =>  'nullable',
        ], [
            'descricao.required' => 'A descrição do pergunta é obrigatória.',
            'descricao.max' => 'A descrição da pergunta não pode ter mais de :max caracteres.',
        ], [
            'grupo_id.required' => 'O nome do grupo é obrigatório.',
        ]);

        $pergunta = new Pergunta($validatedData);

        //$pergunta->grupo()->associate($grupo);
        $pergunta->save();

        return redirect()->route('perguntas.index')->with('success', 'O pergunta foi criado com sucesso!');
    }

    public function edit(Grupo $grupos, Pergunta $pergunta)
    {
        $grupos = Grupo::all();
        return view('perguntas.edit', compact('grupos', 'pergunta'));
    }
    public function show(Pergunta $pergunta)
    {
        return view('perguntas.show', compact('pergunta'));
    }

    public function update(Request $request, Grupo $grupo, Pergunta $pergunta)
    {
        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'grupo_id' =>  'required|string|max:255',
            'op1' =>  'required|string|max:255',
            'op2' =>  'required|string|max:255',
            'op3' =>  'required|string|max:255',
            'op4' =>  'required|string|max:255',
            'op5' =>  'nullable',
        ], [
            'descricao.required' => 'A descrição do pergunta é obrigatória.',
            'descricao.max' => 'A descrição da pergunta não pode ter mais de :max caracteres.',
        ], [
            'grupo_id.required' => 'O nome do grupo é obrigatório.',
        ]);

        $pergunta->fill($validatedData);
        $pergunta->save();

        return redirect()->route('perguntas.index', compact('pergunta'))->with('success', 'A pergunta foi atualizada com sucesso!');
    }

    public function destroy(Pergunta $pergunta)
    {
        $pergunta->delete();

        return redirect()->route('perguntas.index', compact('pergunta'))->with('success', 'A pergunta foi excluída com sucesso!');
    }
}
