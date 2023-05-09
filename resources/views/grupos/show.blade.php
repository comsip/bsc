@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detalhes do questionário</h1>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $grupo->id }}</p>
            <p><strong>Nome:</strong> {{ $grupo->nome }}</p>
            <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir o questionário {{ $grupo->nome }}?')">Excluir</button>
            </form>
            <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Voltar para a lista</a>
        </div>
    </div>
</div>
@endsection