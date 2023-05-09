<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionario;
use App\Models\Grupo;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = grupo::all();
        return view('grupos.index', compact('grupos'));
    }
    public function create(Grupo $grupos)
    {
        $questionarios = Questionario::all();

        return view('grupos.create', compact('questionarios'));
    }

    public function store(Request $request, Questionario $questionario)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'questionario_id' =>  'required|string|max:255',
        ], [
            'nome.required' => 'O nome do grupo é obrigatório.',
            'nome.max' => 'O nome do grupo não pode ter mais de :max caracteres.',
        ], [
            'questionario_id.required' => 'O nome do questionario é obrigatório.',
        ]);

        $grupo = new Grupo($validatedData);

        //$grupo->questionario()->associate($questionario);
        $grupo->save();

        return redirect()->route('grupos.index')->with('success', 'O grupo foi criado com sucesso!');
    }

    public function edit(Questionario $questionarios, Grupo $grupo)
    {
        $questionarios = Questionario::all();
        return view('grupos.edit', compact('questionarios', 'grupo'));
    }
    public function show(Grupo $grupo)
    {
        return view('grupos.show', compact('grupo'));
    }

    public function update(Request $request, Questionario $questionario, Grupo $grupo)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'questionario_id' =>  'required|string|max:255',
        ], [
            'nome.required' => 'O nome do grupo é obrigatório.',
            'nome.max' => 'O nome do grupo não pode ter mais de :max caracteres.',
        ], [
            'questionario_id.required' => 'O nome do questionario é obrigatório.',
        ]);

        $grupo->fill($validatedData);
        $grupo->save();

        return redirect()->route('grupos.index', compact('grupo'))->with('success', 'O grupo foi atualizado com sucesso!');
    }

    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()->route('grupos.index', compact('grupo'))->with('success', 'O grupo foi excluído com sucesso!');
    }
}
