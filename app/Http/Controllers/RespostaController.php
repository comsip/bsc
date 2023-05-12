<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use Illuminate\Http\Request;
use App\Models\Questionario;
use App\Models\Grupo;
use App\Models\Resposta;

class RespostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostraPergunta($grupo_id)
    {
        $perguntas = Pergunta::where('grupo_id', $grupo_id)->paginate(1);
        $grupo =  Grupo::find($grupo_id);
        $questionario = Questionario::find($grupo->questionario_id);

        return view('welcome', [
            'perguntas' => $perguntas,
            'grupo' => $grupo,
            'questionario' => $questionario
        ]);
    }

    public function exibirRespostas($questionario_id)
    {

        $questionario = Questionario::findOrFail($questionario_id);
        $grupos = $questionario->grupos()->with(['perguntas'])->get();

        return view('welcome', compact('questionario', 'grupos'));
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
