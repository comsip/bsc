<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use Illuminate\Http\Request;
use App\Models\Questionario;
use App\Models\Grupo;
use App\Models\Participante;
use App\Models\Resposta;

class RespostaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostraPergunta($grupo_id)
    {
        $perguntas = Pergunta::where('grupo_id', $grupo_id)->paginate(1);
        $qtdPerguntas = Pergunta::where('grupo_id', $grupo_id)->count();
        $paginaAtual = $perguntas->currentPage();
        $grupo =  Grupo::find($grupo_id);
        $questionario = Questionario::find($grupo->questionario_id);
        if ($qtdPerguntas >= $paginaAtual) {
            $paginaAtual = $paginaAtual + 1;
        } else {
            if ($grupo_id < 4) {
                $url = route('respostas', ['questionario_id' => $grupo_id + 1, 'page' => 1]);

                return redirect()->to($url);
            } else {
                $url = route('respostas', ['questionario_id' =>  1, 'page' => 1]);

                return redirect()->to($url);
            }
        }

        return view('welcome', [
            'perguntas' => $perguntas,
            'grupo' => $grupo,
            'questionario' => $questionario,
            'page' => $paginaAtual
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

        $request->validate([

            "_token" => "required",
            "grupo_id" => "required",
            "pergunta_id" => "required",
            "questionario_id" => "required",
            "opcao" => "required"
        ]);


        $participante = new Participante;
        $participante->questionario_id = $request->input('questionario_id');
        $participante->grupo_id = $request->input('grupo_id');
        $participante->pergunta_id = $request->input('pergunta_id');
        $participante->user_id = $request->user()->id;
        $participante->resposta = $request->input('opcao');
        $participante->token = $request->input('_token');


        $page = $request->input('page');


        $url = route('respostas', ['questionario_id' => $participante->grupo_id, 'page' => $page]);
        $participante->save();

        return redirect()->to($url);
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
