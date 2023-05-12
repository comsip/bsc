@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $questionario->nome }}</h1>
        <form method="POST" action="{{ route('respostas.store') }}">
            @csrf
            @foreach ($perguntas as $pergunta)
                <h2>Grupo {{ $grupo->nome }} </h2>
                <strong>Pergunta {{ $perguntas->currentPage() }} </strong>
                <p>{{ $pergunta->descricao }}</p>
                <input type="hidden" name="grupo_id" value="{{ $grupo->id }}">
                <input type="hidden" name="pergunta_id" value="{{ $pergunta->id }}">
                <input type="hidden" name="questionario_id" value="{{ $questionario->id }}">

                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="opcao" value="op1" id="opcao1">
                            <label class="form-check-label" for="opcao1">
                                {{ ucfirst($pergunta->op1) }}
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="opcao" value="op2" id="opcao2">
                            <label class="form-check-label" for="opcao2">
                                {{ ucfirst($pergunta->op2) }}
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="opcao" value="op3" id="opcao3"
                                checked>
                            <label class="form-check-label" for="opcao3">
                                {{ ucfirst($pergunta->op3) }}
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="opcao" value="op4" id="opcao4">
                            <label class="form-check-label" for="opcao4">
                                {{ ucfirst($pergunta->op4) }}
                            </label>
                        </div>
                    </li>
                    @if (isset($pergunta->op5))
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opcao" value="op5" id="opcao5">
                                <label class="form-check-label" for="opcao5">
                                    {{ ucfirst($pergunta->op5) }}
                                </label>
                            </div>
                        </li>
                    @endif
                    <button type="submit" class="btn btn-info">Proximo</button>
                </ul>


                <div class="col-12 m-1">
                    <a href="{{ url('respostas/1') }}" class="btn btn-primary">Grupo 1</a>
                    <a href="{{ url('respostas/2') }}" class="btn btn-primary">Grupo 2</a>
                    <a href="{{ url('respostas/3') }}" class="btn btn-primary">Grupo 3</a>
                    <a href="{{ url('respostas/4') }}" class="btn btn-primary">Grupo 4</a>
                </div>
            @endforeach
        </form>
        {{ $perguntas->links() }}
    </div>
@endsection
