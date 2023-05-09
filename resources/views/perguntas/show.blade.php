@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalhes da Pergunta</h1>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $pergunta->id }}</p>
            <p><strong>Descrição:</strong> {{ $pergunta->descricao }}</p>
            <a href="{{ route('perguntas.edit', $pergunta->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('perguntas.destroy', $pergunta->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir o questionário {{ $pergunta->nome }}?')">Excluir</button>
            </form>
            <a href="{{ route('perguntas.index') }}" class="btn btn-secondary">Voltar para a lista</a>
        </div>
    </div>
</div>
@endsection