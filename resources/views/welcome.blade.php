@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($perguntas))
            <h1>
                @if (isset($questionario))
                    {{ $questionario->nome }}
                @else
                    {{ 'Não selecionado' }}
                @endif
            </h1>
            <form method="POST" action="{{ route('respostas.store') }}">
                @csrf
                @foreach ($perguntas as $pergunta)
                    <h2>Grupo {{ $grupo->nome }} </h2>
                    <strong>Pergunta {{ $perguntas->currentPage() }} </strong>
                    <p>{{ $pergunta->descricao }}</p>
                    <input type="hidden" name="grupo_id" value="{{ $grupo->id }}">
                    <input type="hidden" name="pergunta_id" value="{{ $pergunta->id }}">
                    <input type="hidden" name="questionario_id" value="{{ $questionario->id }}">
                    <input type="hidden" name="page" value="{{ $page }}">

                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opcao" value="A" id="opcao1">
                                <label class="form-check-label" for="opcao1">
                                    {{ ucfirst($pergunta->op1) }}
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opcao" value="B" id="opcao2">
                                <label class="form-check-label" for="opcao2">
                                    {{ ucfirst($pergunta->op2) }}
                                </label>
                            </div>
                        </li>
                        @if ($pergunta->op3 != '')
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="opcao" value="C"
                                        id="opcao3" checked>
                                    <label class="form-check-label" for="opcao3">
                                        {{ ucfirst($pergunta->op3) }}
                                    </label>
                                </div>
                            </li>
                        @endif
                        @if ($pergunta->op4 != '')
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="opcao" value="D"
                                        id="opcao4">
                                    <label class="form-check-label" for="opcao4">
                                        {{ ucfirst($pergunta->op4) }}
                                    </label>
                                </div>
                            </li>
                        @endif
                        @if ($pergunta->op5 != '')
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="opcao" value="4"
                                        id="opcao5">
                                    <label class="form-check-label" for="opcao5">
                                        {{ ucfirst($pergunta->op5) }}
                                    </label>
                                </div>
                            </li>
                        @endif

                    </ul>

                    <button type="submit" class="btn btn-info mt-1">Proximo</button>
                    <div class="col-12 m-1">
                        <a href="{{ url('respostas/1') }}" class="btn btn-primary">Grupo 1</a>
                        <a href="{{ url('respostas/2') }}" class="btn btn-primary">Grupo 2</a>
                        <a href="{{ url('respostas/3') }}" class="btn btn-primary">Grupo 3</a>
                        <a href="{{ url('respostas/4') }}" class="btn btn-primary">Grupo 4</a>
                    </div>
                @endforeach
            </form>
            {{ $perguntas->links() }}
        @endif

    </div>
@endsection
